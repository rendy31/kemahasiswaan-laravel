@extends('layouts.frontend')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/frontend/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Download</h1>
            {{-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                molestias.</p> --}}
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Download</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <h2>Starter Section</h2> --}}
            <p><span>Download</span> </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <ul class="list-group list-group-flush">
                @foreach ($downloadfiles as $item)
                    <li class="list-group-item mb-1">
                       
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    {{ $item->title }} <br>
                                    <i>{{ $item->description }}</i>            
                                </div>
                                <div class="col ">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ route('file.download', ['filename' => $item->file]) }}" class="btn btn-sm btn-primary" target="blank" type="button">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $downloadfiles->links() }}
        </div>

    </section><!-- /Starter Section Section -->
@endsection
