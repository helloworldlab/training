<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        // SELECT * FROM pengguna ORDER BY nama DESC
        // SELECT * FROM pengguna WHERE nama LIKE ? OR emel LIKE ? ORDER BY nama DESC
        $senaraiPengguna = Pengguna::query()
            ->when(request()->filled('carian'), function ($query) {
                $termaCarian = request()->query('carian');
                $query
                    ->where('nama', 'LIKE', "%{$termaCarian}%")
                    ->orWhere('emel', 'LIKE', "%{$termaCarian}%");
            })
            ->orderBy('nama', 'desc')
            ->paginate();
    
        return view('pengguna.index', [
            'senaraiPengguna' => $senaraiPengguna
        ]);
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        // 0. Debugging
        // $request->dd();

        // 1. Validation
        $request->validate([
            'nama' => [
                'required',
                'max:100'
            ],
            'emel' => [
                'required',
                'email',
                'max:100'
            ],
            'kata_laluan' => [
                'required',
                Password::min(8)
            ],
            'pengesahan_kata_laluan' => [
                'required',
                'same:kata_laluan'
            ]
        ]);

        // 2. Masukkan data ke dalam database
        Pengguna::create([
            'nama'          => $request->input('nama'),
            'emel'          => $request->input('emel'),
            'kata_laluan'   => bcrypt($request->input('kata_laluan'))
        ]);

        // 3. Flash mesej sistem
        session()->flash('notifikasi_sistem', 'Maklumat pengguna berjaya disimpan.');

        // 4. Redirect ke halaman yang dikehendaki
        return redirect()->route('pengguna.index');
    }

    public function show($id)
    {
        // SELECT * FROM pengguna WHERE id = ?
        $pengguna = Pengguna::find($id);

        return view('pengguna.show', [
            'pengguna' => $pengguna
        ]);
    }

    public function edit($id)
    {
        // SELECT * FROM pengguna WHERE id = ?
        $pengguna = Pengguna::find($id);

        return view('pengguna.edit', [
            'pengguna' => $pengguna
        ]);
    }
}
