@extends('layout.penuh')

@section('isi_kandungan')
    <div class="container">
        
        <section class="d-flex justify-content-between align-items-center mb-4 pb-4 border-bottom">
            <h3 class="mb-0">Senarai Pengguna</h3>
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('pengguna.create') }}">Pengguna Baru</a>
                <a class="btn btn-outline-primary" href="#" data-bs-toggle="collapse" data-bs-target="#seksyen-carian">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
                    </svg>
                </a>
            </div>
        </section>

        <section class="collapse mb-4 {{ request()->filled('carian') ? 'show' : null }}" id="seksyen-carian">
            <form action="{{ route('pengguna.index') }}" method="get">
                <div class="hstack gap-3">
                    <div class="input-group">
                        <input class="form-control" type="text" name="carian" value="{{ request()->query('carian') }}">
                        <button class="btn btn-primary" type="submit">
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                                Cari
                            </div>
                        </button>
                    </div>
                    <div class="vr"></div>
                    <a class="btn btn-danger" href="{{ route('pengguna.index') }}">Bersih</a>
                </div>
            </form>
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
                @forelse ($senaraiPengguna as $pengguna)
                    <tr class="align-middle">
                        <td>{{ ($senaraiPengguna->currentpage() - 1) * $senaraiPengguna->perPage() + $loop->iteration }}</td>
                        <td>{{ $pengguna->nama }}</td>
                        <td>{{ $pengguna->emel }}</td>
                        <td class="text-end">
                            <a class="btn btn-outline-secondary btn-sm" href="{{ route('pengguna.show', ['pengguna' => Hashids::encode($pengguna->id)]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </a>
                            <a class="btn btn-outline-secondary btn-sm" href="{{ route('pengguna.edit', ['pengguna' => Hashids::encode($pengguna->id)]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>
                            <a class="btn btn-outline-secondary btn-sm" href="{{ route('pengguna.destroy', ['pengguna' => Hashids::encode($pengguna->id)]) }}" data-bs-toggle="modal" data-bs-target="#modal-hapus-rekod-pengguna">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tiada maklumat untuk dipaparkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $senaraiPengguna->withQueryString()->links() }}

    </div>
@endsection

@section('komponen')
    @include('pengguna.komponen.modal-hapus-rekod-pengguna')
@endsection

@section('js')
    <script>
        var modalHapusRekodPengguna = document.getElementById('modal-hapus-rekod-pengguna');
        var formHapusRekodPengguna = document.getElementById('form-hapus-rekod-pengguna');

        modalHapusRekodPengguna.addEventListener('shown.bs.modal', function (event) {
            // Dapatkan butang pautan yang trigger modal
            var pautan = event.relatedTarget;
            // Dapatkan URL daripada butang pautan
            var url = pautan.getAttribute('href');
            // Tetapkan URL pada form
            formHapusRekodPengguna.setAttribute('action', url);
        });
    </script>
@endsection