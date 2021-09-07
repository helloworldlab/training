@extends('layout.penuh')

@section('isi_kandungan')
    <div class="container">
        
        <h3>Senarai Pengguna</h3>

        <table class="table">
            @foreach ($senaraiNamaPengguna as $namaPengguna)
                <tr>
                    <td>{{ $namaPengguna }}</td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection