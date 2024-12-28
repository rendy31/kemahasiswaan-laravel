<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>KemahasiSwaan</title>
    <meta name="description" content="Kemahasiswaan STIKES Suaka Insan">
    <meta name="keywords" content="Kemahasiswaan STIKES Suaka Insan">

    <!-- Favicons -->
    <link href="{{url('assets/frontend/img/favicon.png')}}" rel="icon">
    <link href="{{url('assets/frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('assets/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    {{-- DATATABLES --}}
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{url('assets/frontend/css/main.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Tempo
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            {{-- <a href="#" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{url('assets/frontend/img/logostikes.png')}}" alt="logo stikes suaka insan"> 
                <h1 class="sitename">Kemahasiswaan</h1>
            </a> --}}
            <a href="https://pmb.stikessuakainsan.ac.id" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{url('assets/frontend/img/logostikes.png')}}" class="img-fluid" alt="Kemahasiswaan STIKES Suaka Insan">

                <!-- <h1 class="sitename">STIKES Suaka Insan</h1><span>.</span> -->
                <div class="card bg-transparent" style="border: none;">
                  <ul class="list-group list-group-flush ">
                    <li class="list-group-item bg-transparent p-0" style="border: none;">
                      <h4 class="sitename">KEMAHASISWAAN</h4>
                    </li>
                    <li class="list-group-item bg-transparent p-0" style="border: none;">
                      <h6 class="sitename">STIKES Suaka Insan</h6>
                    </li>
                  </ul>
                </div>
              </a>


            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="{{request()->routeIs('beranda') ? 'active':''}}">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Kemahasiswaan</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            {{-- <li><a href="#">Dropdown 1</a></li> --}}
                            <li class="dropdown"><a href="#"><span>Organisasi</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Badan Eksekutif Mahasiswa (BEM)</a></li>
                                    <li><a href="#">HIMA Keperawatan</a></li>
                                    <li><a href="#">HIMA Fisioterapi</a></li>
                                    <li><a href="#">HIMA AdminKes</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('kegiatanMhs')}}">Keg. Mahasiswa</a></li>
                            <li><a href="{{route('pengembanganKarakter')}}">Pengembangan Karakter</a></li>
                            <li><a href="{{route('asrama')}}">Asrama</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('beasiswa')}}">Beasiswa</a></li>
                    <li><a href="{{route('prestasi')}}" class="{{request()->routeIs(['prestasi', 'prestasiProvinsi', 'prestasiNasional', 'prestasiInternasional']) ? 'active':''}}">Prestasi</a></li>
                    <li class="dropdown"><a href="#" {{request()->routeIs('downloadfile') ? 'active':''}}"><span>Layanan</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="https://bimsel.stikessuakainsan.ac.id" target="blank">Bimbingan Konseling</a></li>
                            <li><a href="https://cc.stikessuakainsan.ac.id" target="blank">Carier Center</a></li>
                            <li><a href="{{route('unduh')}}" >Download</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('blog')}}" class="{{request()->routeIs('blog') ? 'active':''}}">Blog</a></li>
                    <li class="dropdown"><a href="#" class="{{request()->routeIs('monev') ? 'active':''}}"><span>Laporan</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{route('monev')}}" class="{{request()->routeIs('monev') ? 'active':''}}">Monev & Audit</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        @yield('content')

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <div class="row">
                            <div class="col">
                                <span class="sitename">KEMAHASISWAAN</span><br>
                                <h5>STIKES SUAKA INSAN</h5>
                            </div>
                        </div>
                       
                    </a>
                    <p>Jl.H.Jafri Zamzam, No.8 | Kampus STIKES SUAKA INSAN</p>
                    {{-- <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div> --}}
                </div>

                {{-- <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div> --}}

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.145036627545!2d114.57649357374403!3d-3.314296941203265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423c9c5e61985%3A0x2d9edd614691e3be!2sSTIKES%20Suaka%20Insan!5e0!3m2!1sen!2sid!4v1733385422273!5m2!1sen!2sid" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Tempo</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{url('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/frontend/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{url('assets/frontend/vendor/aos/aos.js')}}"></script>
    <script src="{{url('assets/frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{url('assets/frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{url('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('assets/frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{url('assets/frontend/js/main.js')}}"></script>

    {{-- CHART JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- CHART JS SCRIPT --}}
    
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ url('assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/jquery-ui/jquery-ui.min.js') }} "></script>
    {{-- <script type="text/javascript" src="{{ url('assets/js/popper.js/popper.min.js') }}"></script> --}}

    {{-- DATATABLES --}}
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>

    {{-- DATATABLES SCRIPT --}}
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: -1
                    }
                ]
            });
        });
    </script>

    @yield('scripts')
    
</body>

</html>
