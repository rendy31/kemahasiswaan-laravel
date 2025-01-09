@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <h1 class="display-1 text-danger fw-bold">403</h1>
            <h3 class="text-dark mb-3">Access Denied</h3>
            <p class="text-muted mb-4">
                Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.
                <br> Silakan kembali ke halaman utama atau hubungi admin jika Anda merasa ini adalah kesalahan.
            </p>
            <a href="{{ route('home') }}" class="btn btn-mat waves-effect waves-light btn-primary btn-lg px-4">
                Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection
