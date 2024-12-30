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
                                        <h5>Tambah Permission</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ route('permissions.store') }}" method="post">
                                            @csrf
                                            <div class="form-group @error('name') has-danger @enderror row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-2 col-form-label col-form-label-sm">Nama Permission</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('name') form-control-danger @enderror"
                                                        id="colFormLabelSm" name="name" value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="col-form-label">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Simpan</button>
                                            <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-grd-secondary">Batal dan Kembali</a>
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
