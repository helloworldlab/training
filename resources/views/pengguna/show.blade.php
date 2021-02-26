@extends('layouts.portal')

@section('css')
<style>

</style>
@endsection

@section('isi_kandungan')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom py-3 mb-3" style="height: 5.5rem;">
            <h3 class="my-0 font-weight-bold">Butiran Pengguna</h3>
            <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-primary flex-shrink-0">Kemaskini Butiran</a>
        </div>

        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card card-body mb-3">
                    <div>
                        <strong class="d-block">Nama</strong>
                        <span>{{ $pengguna->nama }}</span>
                    </div>
                    <hr>
                    <div>
                        <strong class="d-block">No. Kad Pengenalan</strong>
                        <span>{{ $pengguna->no_kp }}</span>
                    </div>
                    <hr>
                    <div>
                        <strong class="d-block">Jantina</strong>
                        <span>{{ $pengguna->nama_jantina }}</span>
                    </div>
                    <hr>
                    <div>
                        <strong class="d-block">Agensi</strong>
                        <span>{{ $pengguna->nama_agensi }}</span>
                    </div>
                    <hr>
                    <div>
                        <strong class="d-block">Emel</strong>
                        <span>{{ $pengguna->emel }}</span>
                    </div>
                    <hr>
                    <div>
                        <strong class="d-block">No. Telefon</strong>
                        <span>{{ $pengguna->no_telefon }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-body mb-3">
                    <div>
                        <strong class="d-block">Tarikh Cipta</strong>
                        <span>{{ $pengguna->tarikh_cipta->format('d/m/Y H:i A') }}</span>
                    </div>
                    <hr>
                    <div>
                        <strong class="d-block">Tarikh Kemaskini</strong>
                        <span>{{ $pengguna->tarikh_kemaskini->format('d/m/Y H:i A') }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection