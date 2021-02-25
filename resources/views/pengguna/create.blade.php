@extends('layouts.portal')

@section('css')
<style>

</style>
@endsection

@section('isi_kandungan')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom mb-5">
            <h3 class="mt-3">Pengguna Baru</h3>
        </div>

        <form action="" method="post">
            @csrf

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="{{ old('nama') }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">No. Kad Pengenalan&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="no_kad_pengenalan" value="{{ old('no_kad_pengenalan') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Jantina&nbsp;<span class="text-danger">*</span></label>
                        <select name="jantina" class="form-control">
                            <option disabled selected>SILA PILIH</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Agensi&nbsp;<span class="text-danger">*</span></label>
                        <select name="agensi" class="form-control">
                            <option disabled selected>SILA PILIH</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Emel&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="emel" value="{{ old('emel') }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">No. Telefon&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="no_telefon" value="{{ old('no_telefon') }}">
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('pengguna.index') }}" class="btn btn-outline-secondary">Kembali</a>
                <div>
                    <button class="btn btn-outline-primary" type="reset">Bersih</button>
                    <button class="btn btn-primary" type="submit">Hantar & Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection