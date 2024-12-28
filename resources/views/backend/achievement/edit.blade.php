@extends('layouts.app')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header end -->
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Tambah Achievement</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">

                                        <form action="{{ route('achievements.update', $achievement->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group @error('nim') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">NIM</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('nim') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="nim"
                                                        value="{{ old('nim') ?? $achievement->nim }}" required>
                                                    @error('nim')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('nama') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('nama') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="nama"
                                                        value="{{ old('nama') ?? $achievement->nama }}" required>
                                                    @error('nama')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('prodi') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">prodi</label>
                                                <div class="col-sm-4">
                                                    <select name="prodi" class="form-control">
                                                        <option value="">:. Pilih Prodi .:</option>
                                                        @foreach (['PSIK', 'Fisioterapi', 'Admistrasi Kesehatan'] as $prodi)
                                                            <option value="{{ $prodi }}"
                                                                {{ old('prodi', $achievement->prodi) == $prodi ? 'selected' : '' }}>
                                                                {{ $prodi }}</option>
                                                        @endforeach

                                                    </select>

                                                    @error('prodi')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('penyelenggara') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Penyelenggara</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('penyelenggara') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="penyelenggara"
                                                        value="{{ old('penyelenggara') ?? $achievement->penyelenggara }}"
                                                        required>
                                                    @error('penyelenggara')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('event') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Nama Event</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control @error('event') form-control-danger @enderror" name="event" rows="3" required>{{ old('event') ?? $achievement->event }}</textarea>
                                                    @error('event')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group @error('tempat') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Tempat</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control @error('tempat') form-control-danger @enderror" name="tempat" rows="3" required>{{ old('tempat') ?? $achievement->tempat }}</textarea>
                                                    @error('tempat')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                                <div class="form-group col-sm-4">
                                                    {{-- TANGGAL MULAI --}}
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <input type="date" class="form-control" name="tglMulai"
                                                                value="{{ old('tglMulai') ?? $achievement->tglMulai }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 ">
                                                    sampai
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    {{-- TANGGAL SELESAI --}}
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <input type="date" class="form-control" name="tglAkhir"
                                                                value="{{ old('tglAkhir') ?? $achievement->tglAkhir }}">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group @error('kategoriPenghargaan') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Kategori
                                                    Penghargaan</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('kategoriPenghargaan') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="kategoriPenghargaan"
                                                        value="{{ old('kategoriPenghargaan') ?? $achievement->kategoriPenghargaan }}"
                                                        required>
                                                    @error('kategoriPenghargaan')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('peringkat') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Peringkat</label>
                                                <div class="col-sm-4">
                                                    <select name="peringkat" class="form-control">
                                                        {{-- <option value="">:. Pilih Peringkat .:</option> --}}
                                                        <option value="">:. Pilih Peringkat .:</option>
                                                        @foreach (['Juara 1', 'Juara 2', 'Juara 3', 'Juara Harapan'] as $peringkat)
                                                            <option value="{{ $peringkat }}"
                                                                {{ old('peringkat', $achievement->peringkat) == $peringkat ? 'selected' : '' }}>
                                                                {{ $peringkat }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('peringkat')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('level') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Level</label>
                                                <div class="col-sm-4">
                                                    <select name="level" class="form-control">
                                                        <option value="">:. Pilih Level .:</option>
                                                        @foreach (['Regional', 'Provinsi', 'Nasional', 'Internasional'] as $level)
                                                            <option value="{{ $level }}"
                                                                {{ old('level', $achievement->level) == $level ? 'selected' : '' }}>
                                                                {{ $level }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('level')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('file') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">File</label>
                                                <div class="col-sm-10">
                                                    <input type="file"
                                                        class="form-control form-control-sm @error('file') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="file">
                                                    {{-- <span class="font-italic">File ini WAJIB format pdf, jika ada
                                                        sertifikat dan beberapa dokumentasi kegiatan bisa dijadikan satu
                                                        file pdf baru di upload</span> --}}
                                                    @error('file')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-sm btn-mat waves-effect waves-light btn-info">simpan</button>
                                            <a href="{{ route('achievements.index') }}"
                                                class="btn btn-sm btn-mat waves-effect waves-light btn-secondary">Batal &
                                                Kembali</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
