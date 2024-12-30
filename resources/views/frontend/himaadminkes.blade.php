@extends('layouts.frontend')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/frontend/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Organisasi</h1>
            {{-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                molestias.</p> --}}
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="#">Kemahasiswaan</a></li>
                    <li class="current">Organisasi</li>
                    <li class="current">HIMA Administrasi Kesehatan</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <h2>Starter Section</h2> --}}
            <p><span>Himpunan Mahasiswa (HIMA) Administrasi Kesehatan</span> </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            {{-- CONTENT DISINI --}}
            @if ($himaadminkes)
                <img src="{{ Storage::url($himaadminkes->structure) }}" class="img-fluid w-100" alt="{{ $himaadminkes->name }}">
                <p>{!! $himaadminkes->description !!}</p>
            @else
                <p class="alert alert-danger">Data tidak ditemukan.</p>
            @endif
        </div>


    </section><!-- /Starter Section Section -->
@endsection
