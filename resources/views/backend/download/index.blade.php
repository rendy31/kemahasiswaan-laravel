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
                                        <h5>Download</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover display" id="myTable"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="w-1">No</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Attachment</th>
                                                        <th class="col d-flex justify-content-center"><a
                                                                href="{{ route('downloads.create') }}"
                                                                class="btn btn-sm btn-mat waves-effect waves-light btn-primary ">Upload
                                                                File</a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($downloads as $item)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $item->title }}</td>
                                                            <td>{{ $item->description }}</td>
                                                            <td>
                                                                @if ($item->attachment)
                                                                    <a href="{{ asset('storage/' . $item->attachment) }}"
                                                                        target="_blank" class="btn btn-sm btn-mat waves-effect waves-light btn-outline-info">Download</a>
                                                                @else
                                                                    None
                                                                @endif
                                                                
                                                            </td>
                                                            <td class="d-flex">
                                                                <a href="{{ route('downloads.edit', $item->id) }}"
                                                                    class="text-dark btn btn-sm btn-mat waves-effect waves-light btn-warning mx-1">Edit</a>

                                                                <form method="post"
                                                                    action="{{ route('downloads.destroy', $item->id) }}"
                                                                    onsubmit="return confirm('Apakah anda yakin menghapus data ini ?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-mat waves-effect waves-light btn-danger">Hapus</button>
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
