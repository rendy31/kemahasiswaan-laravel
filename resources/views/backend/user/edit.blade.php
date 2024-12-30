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
                                        <h5>Edit User</h5>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ route('users.update', $user->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('name') form-control-danger @enderror"
                                                        name="name" value="{{ old('name', $user->name) }}" required>
                                                    @error('name')
                                                        <span class="col-form-label"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email"
                                                        class="form-control form-control-sm @error('email') form-control-danger @enderror"
                                                        name="email" value="{{ old('email', $user->email) }}" required>
                                                    @error('email')
                                                        <span class="col-form-label"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label col-form-label-sm">Role</label>
                                                <div class="col-sm-10">
                                                    <select name="role" class="form-control form-control-sm" required>
                                                        <option value="" disabled>.: Pilih Role :.</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>
                                                                {{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
                                                        <span class="col-form-label"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label col-form-label-sm">Permissions</label>
                                                <div class="col-sm-10">
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                                class="form-check-input" id="permission_{{ $permission->id }}"
                                                                {{ $user->permissions->contains($permission) ? 'checked' : '' }}>
                                                            <label for="permission_{{ $permission->id }}"
                                                                class="form-check-label">{{ $permission->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Simpan</button>
                                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-mat waves-effect waves-light btn-secondary">Batal & Kembali</a>
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
