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
                                        <h5>Edit Monev</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ route('monevs.update', $monev->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group @error('title') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('title') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="title"
                                                        value="{{ old('title') ?? $monev->title }}">
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
                                                    @if ($monev->attachment)
                                                        <p>Current Attachment: <a
                                                                href="{{ asset('storage/' . $monev->attachment) }}"
                                                                target="_blank" class="btn btn-primary mt-1">View</a></p>
                                                    @endif
                                                    

                                                </div>
                                            </div>
                                            <div class="form-group @error('content') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Konten</label>
                                                <div class="col-sm-10">
                                                    <textarea id="summernote" class="form-control @error('content') form-control-danger @enderror" name="content">{{ old('content') ?? $monev->content }}</textarea>
                                                    @error('content')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-grd-info">update</button>
                                            <a href="{{ route('monevs.index') }}" class="btn btn-sm btn-grd-secondary"
                                                type="reset" class="btn btn-sm btn-grd-secondary">Batal & Kembali</a>
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
