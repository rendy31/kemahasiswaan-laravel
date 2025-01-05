@extends('layouts.app')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @if (session('status'))
                                    <div class="card">
                                        <div class="card-block success-breadcrumb">
                                            <h5><i class="ti-check-box"></i> {{ session('status') }}</h5>
                                            <span>{{ session('pesan') }}</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5>List Users</h5>
                                        <a href="{{ route('users.create') }}" 
                                           class="btn btn-sm btn-mat waves-effect waves-light btn-primary">
                                            Tambah Data
                                        </a>
                                    </div>
                                    
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover display table-borderless"
                                                   id="userTable" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="w-5">No</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Roles</th>
                                                        <th>Permissions</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <th class="align-middle">{{ $loop->iteration }}</th>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>
                                                                @foreach ($user->roles as $role)
                                                                    <span class="label label-md label-inverse-primary">{{ $role->name }}</span>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach ($user->permissions as $permission)
                                                                    <span class="label label-primary">{{ $permission->name }}</span>
                                                                @endforeach
                                                            </td>
                                                            <td class="d-flex justify-content-center align-items-center">
                                                                <a href="{{ route('users.edit', $user->id) }}"
                                                                   class="btn btn-sm btn-mat waves-effect waves-light btn-warning mx-1">
                                                                    Edit
                                                                </a>
                                                                <form method="POST"
                                                                      action="{{ route('users.destroy', $user->id) }}"
                                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-mat waves-effect waves-light btn-danger mx-1">
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
