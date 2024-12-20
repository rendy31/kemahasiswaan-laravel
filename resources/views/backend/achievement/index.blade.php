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
                                        <div class="row">
                                            <div class="col">
                                                <h5>Achievement</h5>
                                                {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                            </div>
                                            <div class="col d-flex justify-content-end">
                                                <a href="{{route('achievement.create')}}" class="btn btn-sm btn-mat waves-effect waves-light btn-primary ">Tambah Data</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card-block">
                                        {{-- <div class="table-responsive"> --}}
                                            <table class="display row-border nowrap compact hover table-sm" id="myTable"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        {{-- <th class="w-1">No</th> --}}
                                                        <th >NIM</th>
                                                        <th >Nama</th>
                                                        <th >Prodi</th>
                                                        <th >Event</th>
                                                        <th >Nama Penghargaan</th>
                                                        <th >Peringkat</th>
                                                        <th >Level</th>
                                                        <th >Penyelenggara</th>
                                                        <th >Tempat</th>
                                                        <th >Tgl Penyelenggaraan</th>
                                                        <th >File</th>
                                                        <th></th>
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
                                                            <td>{{ $item->namaPenghargaan }}</td>
                                                            <td>{{ $item->peringkat }}</td>
                                                            <td>{{ $item->level }}</td>
                                                            <td>{{ $item->penyelenggara }}</td>
                                                            <td>{{ $item->tempat }}</td>
                                                            <td>{{ $item->tglMulai }} s.d {{ $item->tglAkhir }}</td>
                                                            <td>
                                                                @if ($item->file)
                                                                <a href="{{ route('achievement.download', ['achievement' => $item->file]) }}" class="btn btn-sm btn-mat waves-effect waves-light btn-outline-info">Download</a>
                                                                @endif
                                                            </td>
                                                            <td class="d-flex">
                                                                <a href="{{ route('achievement.edit', $item->id) }}"
                                                                    class="text-dark btn btn-sm btn-mat waves-effect waves-light btn-warning mx-1">Edit</a>

                                                                <form method="post"
                                                                    action="{{ route('achievement.destroy', $item->id) }}"
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
