<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $senaraiPengguna = [
            'Ali',
            'Abu',
            null
        ];
    
        return view('pengguna.index', [
            'senaraiPengguna' => $senaraiPengguna
        ]);
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store()
    {
        
    }
}
