@extends('layouts.frontend')
@section('content')

<!-- Page Title -->
<div class="page-title dark-background" style="background-image: url('{{ url('assets/frontend/img/page-title-bg.webp') }}')"
>
    <div class="container position-relative">
      <h1>Blog Details</h1>
      {{-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p> --}}
      <nav class="breadcrumbs">
        <ol>
          <li><a href="#">Blog</a></li>
          <li class="current">Blog Details</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <div class="container">
    <div class="row">

      <div class="col-lg-8">

        <!-- Blog Details Section -->
        <section id="blog-details" class="blog-details section">
          <div class="container">

            <article class="article">

              <div class="post-img">
                <img src="{{ Storage::url($post->thumbnail) }}" class="flex-shrink-0">
              </div>

              <h2 class="title">{{$post->title}}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{$post->user->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, d F Y') }}">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, d F Y') }}</time></a></li>
                  {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li> --}}
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                {!! $post->content !!}
              </div><!-- End post content -->

              <div class="meta-bottom">
                {{-- <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul> --}}

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">{{$post->category->name}}</a></li>
                  {{-- <li><a href="#">Tips</a></li> --}}
                  {{-- <li><a href="#">Marketing</a></li> --}}
                </ul>
              </div><!-- End meta bottom -->

            </article>

          </div>
        </section><!-- /Blog Details Section -->

       
      </div>

      <div class="col-lg-4 sidebar">

        <div class="widgets-container">

          <!-- Blog Author Widget -->
          {{-- <div class="blog-author-widget widget-item">

            <div class="d-flex flex-column align-items-center">
              <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
              <h4>Jane Smith</h4>
              <div class="social-links">
                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                <a href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
              </div>

              <p>
                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
              </p>

            </div>
          </div> --}}
          <!--/Blog Author Widget -->

          <!-- Search Widget -->
          <div class="search-widget widget-item">

            <h3 class="widget-title">Search</h3>
            <form action="">
              <input type="text">
              <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>

          </div>
          <!--/Search Widget -->

          <!-- Recent Posts Widget -->
          <div class="recent-posts-widget widget-item">

            <h3 class="widget-title">Recent Posts</h3>
            @foreach ($recentPost as $item)
              
            <div class="post-item">
              {{-- <img src="{{url('assets/images/blog/blog-recent-1.jpg')}}" alt="" class="flex-shrink-0"> --}}
              <img src="{{ Storage::url($item->thumbnail) }}" class="flex-shrink-0">
              <div>
                <h4><a href="{{route('post.show',$item->slug)}}">{{$item->title}}</a></h4>
                <time datetime="{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}</time>
              </div>
            </div><!-- End recent post item-->

            @endforeach

            

          </div><!--/Recent Posts Widget -->

          

        </div>

      </div>

    </div>
  </div>

@endsection
