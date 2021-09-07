@extends('layout.penuh')

@section('isi_kandungan')
    <div class="container">
        <h3>Pengguna Baru</h3>

        <form action="{{ url('pengguna') }}" method="post">

            @csrf

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-nama">Nama</label>
                        <input class="form-control" id="input-nama" type="text" name="nama">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-emel">Emel</label>
                        <input class="form-control" id="input-emel" type="email" name="emel">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-kata-laluan">Kata Laluan</label>
                        <input class="form-control" id="input-kata-laluan" type="password" name="kata_laluan">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-pengesahan-kata-laluan">Pengesahan Kata Laluan</label>
                        <input class="form-control" id="input-pengesahan-kata-laluan" type="password" name="pengesahan_kata_laluan">
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>

        </form>
    </div>
@endsection