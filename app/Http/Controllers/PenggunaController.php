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
        $senaraiPengguna = Pengguna::query()
            ->select('pengguna.*', 'agensi.nama as nama_agensi')
            ->leftJoin('agensi', 'pengguna.id_agensi', 'agensi.id')
            ->paginate(10);

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

        Pengguna::create([
            'nama'          => $request->input('nama'),
            'no_kp'         => $request->input('no_kad_pengenalan'),
            'id_jantina'    => $request->input('jantina'),
            'id_agensi'     => $request->input('agensi'),
            'emel'          => $request->input('emel'),
            'kata_laluan'   => bcrypt('P@ssw0rd'),
            'no_telefon'    => $request->input('no_telefon'),
        ]);

        return redirect()->route('pengguna.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // SELECT * FROM pengguna WHERE id = $id
        // $pengguna = Pengguna::where('id', $id)->first();
        $pengguna = Pengguna::query()
            ->select('pengguna.*', 'jantina.nama as nama_jantina', 'agensi.nama as nama_agensi')
            ->leftJoin('jantina', 'pengguna.id_jantina', 'jantina.id')
            ->leftJoin('agensi', 'pengguna.id_agensi', 'agensi.id')
            ->where('pengguna.id', $id)
            ->first();

        return view('pengguna.show', [
            'pengguna' => $pengguna
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = Pengguna::find($id);

        $senaraiJantina = Jantina::get();

        $senaraiAgensi = Agensi::orderBy('nama')->get();

        return view('pengguna.edit', [
            'pengguna' => $pengguna,
            'senaraiJantina' => $senaraiJantina,
            'senaraiAgensi' => $senaraiAgensi
        ]);
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

        $pengguna = Pengguna::find($id);

        $pengguna->update([
            'nama'          => $request->input('nama'),
            'no_kp'         => $request->input('no_kad_pengenalan'),
            'id_jantina'    => $request->input('jantina'),
            'id_agensi'     => $request->input('agensi'),
            'emel'          => $request->input('emel'),
            'no_telefon'    => $request->input('no_telefon'),
        ]);

        return redirect()->route('pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengguna::destroy($id);

        return back();
    }
}
