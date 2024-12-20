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
                                        <h5>Kegiatan Mahasiswa</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover display table-borderless" id="myTable"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="w-5">No</th>
                                                        <th class="w-5">Thumbnail</th>
                                                        <th class="col-md-8">Kegiatan Mahasiswa</th>
                                                        <th class="justify-content-center align-items-center"><a
                                                                href="{{ route('kegiatan-mahasiswa.create') }}"
                                                                class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Tambah
                                                                Keg.Mahasiswa</a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($activities as $item)
                                                        <tr>
                                                            <th class="align-middle">{{ $loop->iteration }}</th>
                                                            <td class="align-middle"><img src="{{ Storage::url($item->thumbnail) }}"
                                                                    class="img-fluid img-thumbnail"></td>
                                                            <td>
                                                                {{ $item->title }} <br>
                                                                <b>Publisher :</b> <i>{{ $item->user->name }}</i> <br>
                                                                <b>Tgl Dibuat :</b>
                                                                <i>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}</i><br>
                                                                <b>Status :</b> {!! $item->isPublish === 1 ? '<i class="text-success">Publish</i>' : '<i class="text-danger">Draft</i>' !!}</> <br>

                                                            </td>
                                                            <td class="d-flex justify-content-center align-items-center ">
                                                                <a href="#" target="_blank"
                                                                    class="btn btn-sm btn-mat waves-effect waves-light btn-info mx-1 ">Lihat
                                                                </a>
                                                                <a href="{{ route('kegiatan-mahasiswa.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-mat waves-effect waves-light btn-warning text-dark">Edit</a>
                                                                <form method="post"
                                                                    action="{{ route('kegiatan-mahasiswa.destroy', $item->id) }}"
                                                                    onsubmit="return confirm('Apakah anda yakin menghapus data ini ?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class=" btn btn-sm btn-mat waves-effect waves-light btn-danger mx-1 ">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
