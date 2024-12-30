@extends('layouts.app')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @if (session('status'))
                                    <div class="card">
                                        <div class="card-block success-breadcrumb">
                                            <h5><i class="ti-check-box"></i> {{ session('status') }}</h5>
                                            <span>{{ session('pesan') }}</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Tulisan Achievement di sebelah kiri -->
                                            <h5 class="mb-0">ACHIEVEMENT</h5>

                                            <!-- Form Filter di sebelah kanan -->
                                            <form action="{{ route('achievements.export') }}" method="GET"
                                                class="d-flex align-items-center">
                                                {{-- <label for="prodi">.: Pilih Prodi .:</label>v c  --}}
                                                <select name="prodi" class="form-control form-control-sm me-2"
                                                    id="prodi" required>
                                                    <option value="PSIK & Ners">PSIK & Ners</option>
                                                    <option value="Fisioterapi">Fisioterapi</option>
                                                    <option value="AdminKes">AdminKes</option>
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-success">Export</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        {{-- <div class="table-responsive"> --}}
                                        <table class="display row-border nowrap compact hover table-sm" id="myTable"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    {{-- <th class="w-1">No</th> --}}
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th>Prodi</th>
                                                    <th>Event</th>
                                                    <th>Nama Penghargaan</th>
                                                    <th>Peringkat</th>
                                                    <th>Level</th>
                                                    <th>Penyelenggara</th>
                                                    <th>Tempat</th>
                                                    <th>Tgl Penyelenggaraan</th>
                                                    <th>File</th>
                                                    <th><a href="{{ route('achievements.create') }}"
                                                            class="btn btn-sm btn-mat waves-effect waves-light btn-primary ">Tambah
                                                            Data</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($achievements as $item)
                                                    <tr>
                                                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                                        <td>{{ $item->nim }}</td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ $item->prodi }}</td>
                                                        <td>{{ $item->event }}</td>
                                                        <td>{{ $item->kategoriPenghargaan }}</td>
                                                        <td>{{ $item->peringkat }}</td>
                                                        <td>{{ $item->level }}</td>
                                                        <td>{{ $item->penyelenggara }}</td>
                                                        <td>{{ $item->tempat }}</td>
                                                        <td>{{ $item->tglMulai }} s.d {{ $item->tglAkhir }}</td>
                                                        <td>
                                                            @if ($item->attachment)
                                                                <a href="{{ asset('storage/' . $item->attachment) }}"
                                                                    target="_blank"
                                                                    class="btn btn-sm btn-mat waves-effect waves-light btn-outline-info">Lampiran</a>
                                                            @else
                                                                <p class="text-danger">Tidak ada Lampiran</p>
                                                            @endif
                                                        </td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('achievements.edit', $item->id) }}"
                                                                class="text-dark btn btn-sm btn-mat waves-effect waves-light btn-warning mx-1">Edit</a>

                                                            <form method="post"
                                                                action="{{ route('achievements.destroy', $item->id) }}"
                                                                onsubmit="return confirm('Apakah anda yakin menghapus data ini ?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-mat waves-effect waves-light btn-danger">Hapus</button>
                                                            </form>
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- </div> --}}
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
