@extends('layouts.app')
@section('content')
    <div class="pcoded-content">

        <!-- Page-header end -->
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
                                        <h5>Struktur Organisasi</h5>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover display table-borderless" id="myTable"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="w-5">Thumbnail</th>
                                                        <th class="col-md-8">Organisasi</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($organizations as $item)
                                                        <tr>
                                                            <td class="align-middle"><img src="{{ Storage::url($item->structure) }}"
                                                                    class="img-fluid img-thumbnail"></td>
                                                            <td>
                                                                {{ $item->name }} 
                                                            </td>
                                                            <td class="d-flex justify-content-center align-items-center ">
                                                                <a href="{{ route('organizations.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-mat waves-effect waves-light btn-warning text-dark">update</a>
                                                                
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
