<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Jantina;
use App\Models\Agensi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT * FROM pengguna
        $senaraiPengguna = Pengguna::get();

        return view('pengguna.index', [
            'senaraiPengguna' => $senaraiPengguna
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // SELECT * FROM jantina
        $senaraiJantina = Jantina::get();

        // SELECT * FROM agensi ORDER BY nama ASC
        $senaraiAgensi = Agensi::orderBy('nama')->get();
        // SELECT * FROM agensi WHERE status = true
        // $senaraiAgensi = Agensi::where('status', true)->orderBy('nama')->get();
        // SELECT * FROM agensi WHERE status = true AND id_kementerian = 1
        // $senaraiAgensi = Agensi::where('status', true)->where('id_kementerian', 1)->orderBy('nama')->get();
        // $senaraiAgensi = Agensi::where(['status' => true, 'id_kementerian' => 1])->orderBy('nama')->get();
        // first(), firstOrFail(), firstOr(), get(), paginate(), simplePaginate(), sole()

        return view('pengguna.create', [
            'senaraiJantina' => $senaraiJantina,
            'senaraiAgensi' => $senaraiAgensi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => [
                'required',
                'string',
                'min:3',
                'max:100'
            ],
            'no_kad_pengenalan' => [
                'required',
                'string',
                'size:12'
            ],
            'jantina' => [
                'required',
                Rule::in(Jantina::pluck('id'))
            ],
            'agensi' => [
                'required',
                Rule::in(Agensi::pluck('id'))
            ],
            'emel' => [
                'required',
                'email',
                'max:100'
            ],
            'no_telefon' => [
                'required',
                'string',
                'max:14'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
