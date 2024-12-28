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
                                        <h5>Edit Download</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ route('downloads.update',$download->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group @error('title') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('title') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="title" value="{{ old('title') ?? $download->title }}">
                                                    @error('title')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('description') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Description</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('description') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="description" value="{{ old('description') ?? $download->description }}">
                                                    @error('description')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('attachment') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Attachment</label>
                                                    <div class="mb-2">
                                                        @if ($download->attachment)
                                                            <a href="{{ asset('storage/' . $download->attachment) }}" target="_blank" class="btn btn-sm btn-info">Lihat Lampiran</a>
                                                        @else
                                                            <p class="text-muted">Tidak ada lampiran</p>
                                                        @endif
                                                    </div>
                                                <div class="col-sm-10">
                                                    <input type="file"
                                                        class="form-control form-control-sm @error('attachment') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="attachment">
                                                        <small class="text-muted">Leave blank to keep the current attachment.</small>
                                                    @error('attachment')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-grd-info">update</button>
                                            <a href="{{route('downloads.index')}}" class="btn btn-sm btn-grd-secondary" type="reset" class="btn btn-sm btn-grd-secondary">Batal & Kembali</a>
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
