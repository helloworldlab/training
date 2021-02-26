@extends('layouts.portal')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" />
@endsection

@section('isi_kandungan')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom py-3 mb-3" style="height: 5.5rem;">
            <h3 class="my-0 font-weight-bold">Kemaskini Butiran</h3>
        </div>

        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->query('halaman') == 'profil' || empty(request()->query('halaman')) ? 'active' : null }}" href="{{ route('pengguna.edit', ['pengguna' => $pengguna->id, 'halaman' => 'profil']) }}">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->query('halaman') == 'kata-laluan' ? 'active' : null }}" href="{{ route('pengguna.edit', ['pengguna' => $pengguna->id, 'halaman' => 'kata-laluan']) }}">Kata Laluan</a>
            </li>
        </ul>

        @if ($errors->any())
            <div class="alert alert-danger mb-5">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (request()->query('halaman') == 'profil' || empty(request()->query('halaman')))
            @include('pengguna.subkomponen.form-kemaskini-profil')
        @endif

        @if (request()->query('halaman') == 'kata-laluan')
            @include('pengguna.subkomponen.form-kemaskini-kata-laluan')
        @endif

    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous"></script>
    <script>
        // Apabila halaman dimuat pada pelayar web
        $(document).ready(function () {
            var selectJantina = $('select[name=jantina]');
            var selectAgensi = $('select[name=agensi]');

            selectJantina.selectpicker({
                liveSearch: true,
                styleBase: 'form-control border bg-white @error('jantina') border-danger @enderror'
            });

            selectAgensi.selectpicker({
                liveSearch: true,
                styleBase: 'form-control border bg-white @error('agensi') border-danger @enderror'
            });
        });
    </script>
@endsection