@extends('layouts.app')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Tambah Monev</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ route('monevs.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group @error('title') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('title') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="title" value="{{ old('title') }}">
                                                    @error('title')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group @error('attachment') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Lampiran</label>
                                                <div class="col-sm-10">
                                                    <input type="file"
                                                        class="form-control form-control-sm @error('attachment') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="attachment">
                                                    @error('attachment')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('content') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Konten</label>
                                                <div class="col-sm-10">
                                                    <textarea id="summernote" class="form-control @error('content') form-control-danger @enderror" name="content">{{ old('content') }}</textarea>
                                                    @error('content')
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
