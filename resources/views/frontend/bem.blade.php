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
                    <li class="current">BEM</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <h2>Starter Section</h2> --}}
            <p><span>Badan Eksekutif Mahasiswa (BEM)</span> </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            {{-- CONTENT DISINI --}}
            @if ($bem)
                <img src="{{ Storage::url($bem->structure) }}" class="img-fluid w-100" alt="{{ $bem->name }}">
                <p>{!! $bem->description !!}</p>
            @else
                <p class="alert alert-danger">Data tidak ditemukan.</p>
            @endif
        </div>


    </section><!-- /Starter Section Section -->
@endsection
