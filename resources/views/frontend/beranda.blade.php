@extends('layouts.frontend')
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="assets/frontend/img/hero-bg.jpg" alt="" data-aos="fade-in">

        <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <h1>Selamat Datang di Kemahasiswaan</h1>
                    <h3>STIKES Suaka Insan</h3>
                    {{-- <p>STIKES Suaka Insan</p> --}}
                    {{-- <a href="#about" class="btn-get-started">Get Started</a> --}}
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p><span>Tentang</span> <span class="description-title">Kemahasiswaan<br></span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5">

                <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                    <h3>Tentang Kemahasiswaan</h3>
                    <p>
                        Membentuk generasi tenaga kesehatan yang tidak hanya unggul secara akademik tetapi juga
                        memiliki kepribadian yang berintegritas, peduli terhadap masyarakat, dan mampu bersaing di
                        dunia global
                    </p>
                    {{-- <a href="#" class="about-btn align-self-center align-self-xl-start"><span>About us</span>
                            <i class="bi bi-chevron-right"></i></a> --}}
                </div>

                <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-briefcase"></i>
                            <h4><a href="" class="stretched-link">Melangkah untuk Kesehatan Bangsa</a></h4>
                            <p>Mencerminkan komitmen mahasiswa untuk memajukan kesehatan masyarakat.</p>
                        </div><!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-gem"></i>
                            <h4><a href="" class="stretched-link">Generasi Sehat dan Berintegritas</a></h4>
                            <p>Membentuk tenaga kesehatan yang kompeten dan bermoral tinggi</p>
                        </div><!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-broadcast"></i>
                            <h4><a href="" class="stretched-link">Dari Kampus ke Dunia Kesehatan</a></h4>
                            <p>Mahasiswa siap berkontribusi di tingkat lokal, nasional, dan global</p>
                        </div><!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-easel"></i>
                            <h4><a href="" class="stretched-link">Profesional dan Humanis</a></h4>
                            <p>Mengutamakan ilmu dan empati dalam pelayanan kesehatan</p>
                        </div><!-- Icon-Box -->

                    </div>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Layanan</h2>
            <p>Lihat <span class="description-title">Layanan Kami</span></p>
        </div><!-- End Section Title -->

        <div class="container ">

            <div class=" row">

                {{-- <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-activity icon"></i></div>
                            <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div><!-- End Service Item --> --}}

                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                        <h4><a href="https://bimsel.stikessuakainsan.ac.id" class="stretched-link">Bimbingan Konseling</a></h4>
                        <p>membantu mahasiswa mengatasi masalah pribadi, akademik, dan sosial,</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                        <h4><a href="https://cc.stikessuakainsan.ac.id" class="stretched-link">Pusat Karir</a></h4>
                        <p>mempersiapkan mahasiswa untuk memasuki dunia kerja melalui pelatihan dan layanan
                            penempatan kerja.</p>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                        <h4><a href="{{route('scholarship.index')}}" class="stretched-link">Beasiswa</a></h4>
                        <p>Unit Kemahasiswaan menyediakan berbagai program beasiswa untuk mendukung mahasiswa berprestasi dan membutuhkan bantuan finansial.</p>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->



    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <h2>Portfolio</h2> --}}
            <p><span>Lihat</span> <span class="description-title">Artikel</span></p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <ul class="nav nav-underline">
                        <li class="nav-item">
                            <a class="nav-link active " aria-current="page" href="#">Kegiatan Mahasiswa</a>
                            <ul class="list-group list-group-flush">
                                @foreach ($postsKegiatanMhs as $item)
                                    <li class="list-group-item"><a  href="{{route('kegiatan-mahasiswa.show', $item->slug)}}" target="_blank" >{{$item->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <ul class="nav nav-underline">
                        <li class="nav-item">
                            <a class="nav-link active mb-3" aria-current="page" href="#">Blog</a>
                            <ul class="list-group list-group-flush">
                                @foreach ($postsBerita as $item)
                                    <li class="list-group-item"><a  href="{{route('post.show', $item->slug)}}" target="_blank" >{{$item->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </section><!-- /Portfolio Section -->



    <!-- Faq Section -->
    {{-- <section id="faq" class="faq section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
            <p><span>Section Title</span> <span class="description-title">Direda Flowed</span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                            <div class="faq-content">
                                <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                    laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                    rhoncus dolor purus non.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                    interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                    scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                    Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                            <div class="faq-content">
                                <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                    Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                    suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                    convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                    interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                    scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                    Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                            <div class="faq-content">
                                <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse
                                    in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed
                                    in suscipit sequi. Distinctio ipsam dolore et.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

    </section> --}}
    <!-- /Faq Section -->
@endsection
