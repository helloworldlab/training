<form action="{{ route('pengguna.update', ['pengguna' => $pengguna->id, 'halaman' => 'profil']) }}" method="post">
            @csrf
            {{-- Form Method Spoofing --}}
            @method('put')

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ old('nama', $pengguna->nama) }}" autofocus>
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
                        <input class="form-control @error('no_kad_pengenalan') is-invalid @enderror" type="text" name="no_kad_pengenalan" value="{{ old('no_kad_pengenalan', $pengguna->no_kp) }}">
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
                                <option value="{{ $jantina->id }}" {{ $jantina->id == old('jantina', $pengguna->id_jantina) ? 'selected' : null }}>{{ $jantina->nama }}</option>
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
                                <option value="{{ $agensi->id }}" {{ $agensi->id == old('agensi', $pengguna->id_agensi) ? 'selected' : null }}>{{ $agensi->nama }}</option>
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
                        <input class="form-control @error('emel') is-invalid @enderror" type="email" name="emel" value="{{ old('emel', $pengguna->emel) }}">
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
                        <input class="form-control @error('no_telefon') is-invalid @enderror" type="text" name="no_telefon" value="{{ old('no_telefon', $pengguna->no_telefon) }}">
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