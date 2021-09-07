@extends('layout.penuh')

@section('isi_kandungan')
    <div class="container">
        
        <section class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Senarai Pengguna</h3>
            <a class="btn btn-primary" href="{{ route('pengguna.create') }}">Pengguna Baru</a>
        </section>

        <table class="table">
            <thead>
                <tr>
                    <th>Bil.</th>
                    <th>Nama</th>
                    <th>Emel</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($senaraiNamaPengguna as $namaPengguna)
                    <tr>
                        <td>{{ $namaPengguna }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection