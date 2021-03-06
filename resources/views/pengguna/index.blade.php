@extends('layouts.portal')

@section('css')
<style>

</style>
@endsection

@section('isi_kandungan')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom py-3 mb-3" style="height: 5.5rem;">
            <h3 class="my-0 font-weight-bold">Senarai Pengguna</h3>
            <a href="{{ route('pengguna.create') }}" class="btn btn-primary flex-shrink-0">Pengguna Baru</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped text-nowrap">
                <thead>
                    <tr>
                        <th class="border-0">Bil.</th>
                        <th class="border-0">Nama</th>
                        <th class="border-0">No. Kad Pengenalan</th>
                        <th class="border-0">Emel</th>
                        <th class="border-0"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($senaraiPengguna as $pengguna)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $pengguna->nama ?? '-' }}</td>
                            <td class="align-middle">{{ $pengguna->no_kp ?? '-' }}</td>
                            <td class="align-middle">{{ $pengguna->emel ?? '-' }}</td>
                            <td class="align-middle text-right">
                                <div class="btn-group">
                                    <a href="{{ route('pengguna.show', $pengguna->id) }}" class="btn btn-outline-primary btn-sm">Butiran</a>
                                    <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-outline-primary btn-sm">Kemaskini</a>
                                    <a href="{{ route('pengguna.destroy', $pengguna->id) }}" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-hapus-rekod">Hapus</a>
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

        {{ $senaraiPengguna->links() }}
    </div>
@endsection

@section('komponen')
    @include('komponen.modal-hapus-rekod')
@endsection

@section('js')
    <script>
        // Apabila dokumen HTML dimuat pada pelayar web
        $(document).ready(function () {
            $('#modal-hapus-rekod').on('show.bs.modal', function (event) {
                // Dapatkan button yang ditekan
                var button = $(event.relatedTarget);
                // Dapatkan pautan pada button
                var action = button.prop('href');
                // Modal yang dipaparkan
                var modal = $(this);
                // Cari form-hapus-rekod pada modal dan setkan property dengan pautan
                modal.find('#form-hapus-rekod').prop('action', action);
            });
        });
    </script>
@endsection