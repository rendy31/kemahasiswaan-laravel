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
                                    <div class="card-header">
                                        <h5>Permissions</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover display table-borderless"
                                                id="myTable" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="w-5">No</th>
                                                        <th class="col-md-8">Permission Name</th>
                                                        <th class="justify-content-center align-items-center">
                                                            <a href="{{ route('permissions.create') }}"
                                                                class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Tambah
                                                                Permission</a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permissions as $item)
                                                        <tr>
                                                            <th class="align-middle">{{ $loop->iteration }}</th>
                                                            <td>{{ $item->name }}</td>
                                                            <td class="d-flex justify-content-center align-items-center ">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-mat waves-effect waves-light btn-warning mx-1"
                                                                    data-toggle="modal"
                                                                    data-target="#editPermissionModal{{ $item->id }}">
                                                                    Edit
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('permissions.destroy', $item->id) }}"
                                                                    onsubmit="return confirm('Apakah anda yakin menghapus Permission ini ?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class=" btn btn-sm btn-mat waves-effect waves-light btn-danger mx-1 ">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{-- MODAL EDIT PERMISSION NAME --}}
                                            @foreach ($permissions as $permission)
                                                <!-- Modal Edit Permission -->
                                                <div class="modal fade" id="editPermissionModal{{ $permission->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="editPermissionModalLabel{{ $permission->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="{{ route('permissions.update', $permission->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editPermissionModalLabel{{ $permission->id }}">
                                                                        Edit Permission Name</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="permissionName{{ $permission->id }}">Permission
                                                                            Name</label>
                                                                        <input type="text" name="name"
                                                                            id="permissionName{{ $permission->id }}"
                                                                            class="form-control"
                                                                            value="{{ $permission->name }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-mat waves-effect waves-light btn-secondary mx-1"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-sm btn-mat waves-effect waves-light btn-primary mx-1">Save
                                                                        Changes</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach

                                            {{-- END MODAL EDIT PERMISSION NAME --}}
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
