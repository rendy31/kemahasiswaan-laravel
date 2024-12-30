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
                                        <h5>Edit Struktur {{ $organization->name }}</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ route('organizations.update', $organization->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group @error('structure') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Struktur</label>
                                                <div class="col-sm-10">
                                                    <input type="file"
                                                        class="form-control form-control-sm @error('structure') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="structure">
                                                    @error('structure')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <img src="{{ Storage::url($organization->structure) }}"
                                                        class="img-fluid img-thumbnail w-25 mt-1">
                                                </div>
                                            </div>

                                            <div class="form-group @error('description') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea id="summernote" class="form-control @error('description') form-control-danger @enderror" name="description">{{ old('description', $organization->description) }}</textarea>

                                                    @error('description')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="btn btn-sm btn-mat waves-effect waves-light btn-primary text-dark">update</button>
                                            <a href="{{ route('organizations.index') }}"
                                                class="btn btn-sm btn-mat waves-effect waves-light btn-default text-dark"
                                                type="reset">Batal & Kembali</a>
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
