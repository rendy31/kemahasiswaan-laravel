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
                                        <h5>Edit Beasiswa</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ route('scholarships.update',$scholarship->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group @error('title') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('title') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="title" value="{{ old('title') ?? $scholarship->title }}">
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
                                                    <div class="mb-2">
                                                        @if ($scholarship->attachment)
                                                            <a href="{{ asset('storage/' . $scholarship->attachment) }}" target="_blank" class="btn btn-sm btn-info">Lihat Lampiran</a>
                                                        @else
                                                            <p class="text-muted">No attachment available.</p>
                                                        @endif
                                                    </div>
                                                    {{-- <a href="{{ Storage::url('scholarships/' . $scholarship->attachment) }}" target="_blank" class="btn btn-primary mt-1">
                                                        Lihat Lampiran
                                                    </a> --}}
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group @error('content') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Konten</label>
                                                <div class="col-sm-10">
                                                    <textarea id="summernote" class="form-control @error('content') form-control-danger @enderror" name="content">{{ old('content') ?? $scholarship->content }}</textarea>
                                                    @error('content')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="col-sm-10 form-check form-switch mt-2">
                                                        <input name="isPublish" class="form-check-input" type="checkbox"
                                                            role="switch" id="flexSwitchCheckChecked" {{$scholarship->isPublish == 1 ? 'checked':''}}>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Publish
                                                            ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-grd-info">update</button>
                                            <a href="{{route('scholarships.index')}}" class="btn btn-sm btn-grd-secondary" type="reset" class="btn btn-sm btn-grd-secondary">Batal & Kembali</a>
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
