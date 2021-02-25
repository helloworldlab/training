@extends('layouts.portal')

@section('css')
<style>

</style>
@endsection

@section('isi_kandungan')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom mb-5">
            <h3 class="mt-3">Senarai Pengguna</h3>
            <a href="{{ route('pengguna.create') }}" class="btn btn-primary">Pengguna Baru</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Bil.</td>
                        <td>Nama</td>
                        <td>No. Kad Pengenalan</td>
                        <td>Emel</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($senaraiPengguna as $pengguna)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengguna->nama ?? '-' }}</td>
                            <td>{{ $pengguna->no_kp ?? '-' }}</td>
                            <td>{{ $pengguna->emel ?? '-' }}</td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <a href="{{ route('pengguna.show', $pengguna->id) }}" class="btn btn-outline-primary btn-sm">Butiran</a>
                                    <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-outline-primary btn-sm">Kemaskini</a>
                                    <a href="{{ route('pengguna.destroy', $pengguna->id) }}" class="btn btn-outline-primary btn-sm">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Tiada maklumat untuk dipaparkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection