<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\Pengguna;
use Illuminate\Validation\Rule;
use Vinkla\Hashids\Facades\Hashids;

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
                'max:100',
                'unique:pengguna,emel'
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

    public function show($encodedId)
    {
        // Decode encoded id
        $id = Hashids::decode($encodedId)[0];

        // SELECT * FROM pengguna WHERE id = ?
        $pengguna = Pengguna::find($id);

        return view('pengguna.show', [
            'pengguna' => $pengguna
        ]);
    }

    public function edit($encodedId)
    {
        // Decode encoded id
        $id = Hashids::decode($encodedId)[0];

        // SELECT * FROM pengguna WHERE id = ?
        $pengguna = Pengguna::find($id);

        return view('pengguna.edit', [
            'pengguna' => $pengguna
        ]);
    }

    public function update(Request $request, $encodedId)
    {
        // 0.  Decode encoded id
        $id = Hashids::decode($encodedId)[0];

        // 1. Validation
        $request->validate([
            'nama' => [
                'required',
                'max:100'
            ],
            'emel' => [
                'required',
                'email',
                'max:100',
                Rule::unique('pengguna', 'emel')->ignore($id)
            ],
            'kata_laluan' => [
                'nullable',
                Password::min(8)
            ],
            'pengesahan_kata_laluan' => [
                'nullable',
                'same:kata_laluan'
            ]
        ]);

        // 2. Dapatkan data yang ingin dikemaskini
        $pengguna = Pengguna::find($id);

        // 3. Kemaskini rekod pengguna
        $data = [
            'nama'          => $request->input('nama'),
            'emel'          => $request->input('emel'),
        ];

        if ($request->filled('kata_laluan')) {
            $data = $data + [
                'kata_laluan'   =>  bcrypt($request->input('kata_laluan'))
            ];
        }

        $pengguna->update($data);

        // 4. Flash mesej pada pengguna
        session()->flash('notifikasi_sistem', 'Butiran pengguna berjaya dikemaskini.');

        // 5. Redirect pengguna kepada halaman senarai pengguna
        return redirect()->route('pengguna.index');
    }

    public function destroy($encodedId)
    {
        $id = Hashids::decode($encodedId)[0];

        Pengguna::destroy($id);

        session()->flash('notifikasi_sistem', 'Butiran pengguna berjaya dihapuskan.');

        return back();
    }
}
