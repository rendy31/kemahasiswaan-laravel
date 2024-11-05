@extends('layouts.app')
@section('content')
    <div class="pcoded-content">
        <!-- Page-header start -->
        {{-- <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Sample Page</h5>
                        <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Pages</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Sample Page</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
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
                                        <h5>Kategory</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover display" id="myTable"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="w-5">No</th>
                                                        <th class="col">Nama Kategory</th>
                                                        <th class="col"><a href="{{ route('category.create') }}"
                                                                class="btn btn-sm btn-grd-inverse">Tambah Kategory</a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $item)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $item->name }}</td>
                                                            <td>
                                                                <a href="{{ route('category.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-grd-warning mx-1">Edit</a>
                                                                <button type="button" class="btn btn-sm btn-grd-danger"
                                                                    data-toggle="modal" data-target="#deleteModal"
                                                                    data-id="{{ $item->id }}">
                                                                    Hapus
                                                                </button>



                                                                {{-- <form action="{{route('category.destroy',$item->id)}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-grd-danger">Hapus</button>
                                                                </form> --}}
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
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-grd-secondary" data-dismiss="modal">Batal</button>
                    
                    <!-- Form Hapus Data -->
                    <form id="deleteForm" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-grd-danger">Ya, Hapus Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
