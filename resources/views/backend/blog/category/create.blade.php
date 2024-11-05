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
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Tambah Kategory</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ route('category.store') }}" method="post">
                                            @csrf
                                            <div class="form-group @error('name') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Nama Kategori</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('name') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="name" value="{{ old('name') }}" required>
                                                        @error('name')
                                                            <span class="col-form-label">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-grd-info">simpan</button>
                                            <button type="reset" class="btn btn-sm btn-grd-secondary">batal</button>
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
