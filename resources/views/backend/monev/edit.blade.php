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
                                        <form action="{{ route('monev.update',['monev'=>$monev->id]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group @error('title') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('title') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="title" value="{{ old('title') ?? $monev->title }}">
                                                    @error('title')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group @error('thumbnail') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">thumbnail</label>
                                                <div class="col-sm-10">
                                                    <input type="file"
                                                        class="form-control form-control-sm @error('thumbnail') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="thumbnail">
                                                    @error('thumbnail')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <img src="{{ Storage::url($monev->thumbnail) }}" class="img-fluid img-thumbnail w-25 mt-1" >
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
                                                    <div class="col-sm-10 form-check form-switch mt-2">
                                                        <input name="isPublish" class="form-check-input" type="checkbox"
                                                            role="switch" id="flexSwitchCheckChecked" {{$monev->isPublish == 1 ? 'checked':''}}>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Publish
                                                            ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-grd-info">update</button>
                                            <a href="{{route('kegiatan-mahasiswa.index')}}" class="btn btn-sm btn-grd-secondary" type="reset" class="btn btn-sm btn-grd-secondary">Batal & Kembali</a>
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
