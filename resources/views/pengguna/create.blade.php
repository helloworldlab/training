@extends('layouts.portal')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" />
@endsection

@section('isi_kandungan')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom py-3 mb-3" style="height: 5.5rem;">
            <h3 class="my-0 font-weight-bold">Pengguna Baru</h3>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mb-5">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengguna.store') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ old('nama') }}" autofocus>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">No. Kad Pengenalan&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control @error('no_kad_pengenalan') is-invalid @enderror" type="text" name="no_kad_pengenalan" value="{{ old('no_kad_pengenalan') }}">
                        @error('no_kad_pengenalan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Jantina&nbsp;<span class="text-danger">*</span></label>
                        <select name="jantina" class="form-control @error('jantina') is-invalid @enderror">
                            <option disabled selected>Sila Pilih</option>
                            @foreach ($senaraiJantina as $jantina)
                                <option value="{{ $jantina->id }}">{{ $jantina->nama }}</option>
                            @endforeach
                        </select>
                        @error('jantina')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Agensi&nbsp;<span class="text-danger">*</span></label>
                        <select name="agensi" class="form-control @error('agensi') is-invalid @enderror">
                            <option disabled selected>Sila Pilih</option>
                            @foreach ($senaraiAgensi as $agensi)
                                <option value="{{ $agensi->id }}">{{ $agensi->nama }}</option>
                            @endforeach
                        </select>
                        @error('agensi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Emel&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control @error('emel') is-invalid @enderror" type="email" name="emel" value="{{ old('emel') }}">
                        @error('emel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">No. Telefon&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control @error('no_telefon') is-invalid @enderror" type="text" name="no_telefon" value="{{ old('no_telefon') }}">
                        @error('no_telefon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('pengguna.index') }}" class="btn btn-outline-primary">Kembali</a>
                <div>
                    <button class="btn btn-outline-primary" type="reset">Bersih</button>
                    <button class="btn btn-primary" type="submit">Simpan Butiran</button>
                </div>
            </div>
        </form>
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