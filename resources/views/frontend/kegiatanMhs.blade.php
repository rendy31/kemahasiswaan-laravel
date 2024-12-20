@extends('layouts.frontend')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/frontend/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Kegiatan Mahasiswa</h1>
            {{-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                molestias.</p> --}}
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{route('beranda')}}">Home</a></li>
                    <li class="current">Kegiatan Mahasiswa</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

        <div class="container">
            <div class="row gy-4">
                @foreach ($activities as $item)
                    
                <div class="col-lg-4">
                    <article>

                        <div class="post-img">
                            <img src="{{ Storage::url($item->thumbnail) }}" class="img-fluid">
                        </div>

                        {{-- <p class="post-category">{{$item->category->name}}</p> --}}

                        <h2 class="title">
                            <a href="blog-details.html">{{$item->title}}</a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <img src="{{url('assets/frontend/img/blog/blog-author.jpg')}}" alt=""
                            class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author">{{$item->user->name}}</p>
                                <p class="post-date">
                                    <time datetime="{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}</time>
                                </p>
                            </div>
                        </div>
                        
                    </article>
                </div><!-- End post list item -->
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{ $activities->links() }}
            </div>
        </div>

    </section><!-- /Blog Posts Section -->


@endsection
