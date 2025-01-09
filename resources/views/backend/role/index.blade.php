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
                                        <h5>Roles</h5>
                                        <a href="{{ route('roles.create') }}"
                                            class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Tambah
                                            Role</a>
                                    </div>

                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover display table-borderless"
                                                id="myTable" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-1">No</th>
                                                        <th class="col-md-2">Roles Name</th>
                                                        <th class="col-md-8">Permissions</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($roles as $item)
                                                        <tr>
                                                            <th class="align-middle">{{ $loop->iteration }}</th>
                                                            <td>{{ $item->name }}</td>
                                                            <td>
                                                                @foreach ($item->permissions as $permission)
                                                                    {{-- <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item">{{ $permission->name }}</li>
                                                                    </ul> --}}
                                                                    <span
                                                                        class="label label-md label-inverse-primary">{{ $permission->name }}</span>
                                                                @endforeach
                                                            </td>
                                                            <td class="d-flex justify-content-center align-items-center">
                                                                <a href="{{ route('roles.permissions.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-mat waves-effect waves-light btn-info mx-1">
                                                                    Kelola Permissions
                                                                </a>
                                                                <button type="button"
                                                                    class="btn btn-sm btn-mat waves-effect waves-light btn-warning mx-1"
                                                                    data-toggle="modal"
                                                                    data-target="#editRoleModal{{ $item->id }}">
                                                                    Edit
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('roles.destroy', $item->id) }}"
                                                                    onsubmit="return confirm('Apakah anda yakin menghapus Role ini ?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-mat waves-effect waves-light btn-danger mx-1">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            {{-- MODAL EDIT ROLE NAME --}}
                                            @foreach ($roles as $item)
                                                <!-- Modal Edit Role Name -->
                                                <div class="modal fade" id="editRoleModal{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="editRoleModalLabel{{ $item->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="{{ route('roles.update', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editRoleModalLabel{{ $item->id }}">Edit
                                                                        Role Name</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="roleName{{ $item->id }}">Role
                                                                            Name</label>
                                                                        <input type="text" name="name"
                                                                            id="roleName{{ $item->id }}"
                                                                            class="form-control"
                                                                            value="{{ $item->name }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-mat waves-effect waves-light btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Save
                                                                        Changes</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach


                                            {{-- END MODAL EDIT ROLE NAME --}}
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
