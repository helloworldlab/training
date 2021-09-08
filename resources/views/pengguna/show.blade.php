@extends('layout.penuh')

@section('isi_kandungan')
    <div class="container">
        <section class="d-flex justify-content-between align-items-center mb-4 pb-4 border-bottom">
            <h3 class="mb-3">Butiran Pengguna</h3>
            <a class="btn btn-primary" href="{{ route('pengguna.edit', ['pengguna' => Hashids::encode($pengguna->id)]) }}">Kemaskini</a>
        </section>

        <div class="row">
            <div class="col-12 col-md-9">
                <div>
                    <strong>Nama</strong> <br>
                    {{ $pengguna->nama ?? 'Tiada maklumat' }}
                </div>
                <hr>
                <div>
                    <strong>Emel</strong> <br>
                    {{ $pengguna->emel ?? 'Tiada maklumat' }}
                </div>
                <hr>
            </div>
            <div class="col-12 col-md-3">
                <div>
                    <strong>Tarikh Direkod</strong> <br>
                    {{ $pengguna->tarikh_direkod ?? 'Tiada maklumat' }}
                </div>
                <hr>
                <div>
                    <strong>Tarikh Dikemaskini</strong> <br>
                    {{ $pengguna->tarikh_dikemaskini ?? 'Tiada maklumat' }}
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection