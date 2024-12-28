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
                                        <h5>Beasiswa</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover display table-borderless"
                                                id="myTable" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="w-5">No</th>
                                                        <th class="col-md-8">Beasiswa</th>
                                                        <th class="col-md-8">Lampiran</th>
                                                        <th class="justify-content-center align-items-center"><a
                                                                href="{{ route('scholarships.create') }}"
                                                                class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Tambah
                                                                Beasiswa</a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($scholarships as $item)
                                                        <tr>
                                                            <th class="align-middle">{{ $loop->iteration }}</th>

                                                            <td>
                                                                {{ $item->title }} <br>
                                                                {{-- <b>Tgl Dibuat :</b>
                                                                <i>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}</i><br> --}}
                                                               
                                                            </td>
                                                            <td>
                                                                @if ($item->attachment)
                                                                    <a href="{{ asset('storage/' . $item->attachment) }}"
                                                                        target="_blank"
                                                                        class="btn btn-sm btn-mat waves-effect waves-light btn-outline-info">Lihat</a>
                                                                @else
                                                                    Tidak ada lampiran
                                                                @endif

                                                            </td>
                                                            <td class="d-flex justify-content-center align-items-center ">
                                                                
                                                                <a href="{{ route('scholarships.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-mat waves-effect waves-light btn-warning text-dark">Edit</a>
                                                                <form method="post"
                                                                    action="{{ route('scholarships.destroy', $item->id) }}"
                                                                    onsubmit="return confirm('Apakah anda yakin menghapus data ini ?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class=" btn btn-sm btn-mat waves-effect waves-light btn-danger mx-1 " >Hapus</button>
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
