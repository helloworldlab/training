<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Session;

class PenggunaController extends Controller
{
    public function index()
    {
        $senaraiNamaPengguna = [
            'Ali',
            'Abu'
        ];
    
        return view('pengguna.index', [
            'senaraiNamaPengguna' => $senaraiNamaPengguna
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
                Password::min(8)->mixedCase()->symbols()->uncompromised()
            ],
            'pengesahan_kata_laluan' => [
                'required',
                'same:kata_laluan'
            ]
        ]);

        // 2. Masukkan data ke dalam database
        // Cara 1 - Placeholder
        $sql = 'INSERT INTO pengguna (nama, emel, kata_laluan) VALUES (?, ?, ?)';
        
        DB::insert($sql, [
            $request->input('nama'),
            $request->input('emel'),
            bcrypt($request->input('kata_laluan'))
        ]);

        // Cara 2 - Named placeholder
        $sql = 'INSERT INTO pengguna (nama, emel, kata_laluan) VALUES (:nama, :emel, :kata_laluan)';

        DB::insert($sql, [
            'nama'          => $request->input('nama'),
            'emel'          => $request->input('emel'),
            'kata_laluan'   => bcrypt($request->input('kata_laluan'))
        ]);

        // Cara 3 - Model
        Pengguna::create([
            'nama'          => $request->input('nama'),
            'emel'          => $request->input('emel'),
            'kata_laluan'   => bcrypt($request->input('kata_laluan'))
        ]);

        // Cara 4
        $pdo = DB::getPdo();
        $sql = 'INSERT INTO pengguna (nama, emel, kata_laluan) VALUES (:nama, :emel, :kata_laluan)';
        $pdo->prepare($sql);
        $pdo->bindColumn(':nama', $request->input('nama'));
        $pdo->bindColumn(':emel', $request->input('emel'));
        $pdo->bindColumn(':kata_laluan', bcrypt($request->input('kata_laluan')));
        $pdo->execute();

        // 3. Flash mesej sistem

        // Cara 1 - Menggunakan Facade
        Session::flash('notifikasi_sistem', 'Maklumat pengguna berjaya disimpan.');

        // Cara 2 - Menggunakan Helper Function
        session()->flash('notifikasi_sistem', 'Maklumat pengguna berjaya disimpan.');

        // 4. Redirect ke halaman yang dikehendaki
        // http://localhost:8000/pengguna
        return redirect()->url('pengguna');
    }
}
