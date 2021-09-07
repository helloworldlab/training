@extends('layout.penuh')

@section('isi_kandungan')
    <div class="container">

        <section class="d-flex justify-content-between align-items-center">
            <h3 class="mb-3">Pengguna Baru</h3>
        </section>

        {{-- @dump($errors) --}}

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <p>Terdapat masalah yang berlaku pada borang yang ingin disimpan. Sila semak semula.</p>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('pengguna') }}" method="post">

            @csrf

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-nama">Nama</label>
                        <input class="form-control @error('nama') is-invalid @enderror" id="input-nama" type="text" name="nama" autofocus>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-emel">Emel</label>
                        <input class="form-control @error('emel') is-invalid @enderror" id="input-emel" type="email" name="emel">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-kata-laluan">Kata Laluan</label>
                        <input class="form-control @error('kata_laluan') is-invalid @enderror" id="input-kata-laluan" type="password" name="kata_laluan">
                        @error('kata_laluan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-pengesahan-kata-laluan">Pengesahan Kata Laluan</label>
                        <input class="form-control @error('pengesahan_kata_laluan') is-invalid @enderror" id="input-pengesahan-kata-laluan" type="password" name="pengesahan_kata_laluan">
                        @error('pengesahan_kata_laluan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="{{ route('pengguna.index') }}">Kembali</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>

        </form>
    </div>
@endsection