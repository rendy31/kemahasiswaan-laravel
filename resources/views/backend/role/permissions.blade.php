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
                                        <h5>Menetapkan Permissions ke Role - {{ $role->name }}</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ route('roles.permissions.update', $role->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="permissions" class="col-sm-2 col-form-label">Permissions</label>
                                                <div class="col-sm-10">
                                                    <div class="checkbox-list">
                                                        @foreach ($permissions as $permission)
                                                            <input  type="checkbox" name="permissions[]"
                                                                value="{{ $permission->name }}"
                                                                @if ($role->hasPermissionTo($permission)) checked @endif>
                                                            {{ $permission->name }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Simpan</button>
                                            <a href="{{ route('roles.index') }}"
                                                class="btn btn-sm btn-grd-secondary">Kembali</a>
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
