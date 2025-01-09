@extends('layouts.app')
@section('content')

<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Selamat Datang di Sistem Informasi KEMAHASISWAAN</h5>
                        <h5 class="m-b-0">
                            Halo, {{ Auth::user()->name }}, 
                            Role Anda: {{ Auth::user()->getRoleNames()->isEmpty() ? 'Tidak memiliki role' : Auth::user()->getRoleNames()->implode(', ') }}
                        </h5>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Sample Page</a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">PANDUAN PENGGUNAAN SISTEM (Pelajari Panduan Sesuai Role Anda !)</h5>
                                </div>
                                <div class="card-block accordion-block">
                                    <div id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="accordion-panel">
                                            <div class="accordion-heading" role="tab" id="headingOne">
                                                <h3 class="card-title accordion-title">
                                                    <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                                    data-parent="#accordion" href="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Admin
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    Role Admin adalah role tertinggi yang mempunyai akses ke semua fitur sistem termasuk pemberian hak akses kepada user lainnya. <br>
                                                    Berikut panduan penggunaan sistem untuk role admin : <button class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Download</button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingTwo">
                                            <h3 class="card-title accordion-title">
                                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapseTwo"
                                                aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                BKA
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="accordion-content accordion-desc">
                                            <p>
                                                Role BKA adalah role yang mempunyai akses ke fitur sistem yang berhubungan dengan kemahasiswaan dan alumni. <br>
                                                    Berikut panduan penggunaan sistem untuk role BKA : <a class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Download</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-panel">
                                    <div class=" accordion-heading" role="tab" id="headingThree">
                                        <h3 class="card-title accordion-title">
                                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseThree"
                                            aria-expanded="false"
                                            aria-controls="collapseThree">
                                            BEM dan HIMA
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="accordion-content accordion-desc">
                                        <p>
                                            Role BEM dan HIMA adalah role yang mempunyai akses ke fitur sistem yang berhubungan dengan publish konten yang berkaitan dengan BEM dan HIMA <br>
                                                    Berikut panduan penggunaan sistem untuk role BEM dan HIMA : <a class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Download</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="accordion-panel">
                                    <div class=" accordion-heading" role="tab" id="headingFour">
                                        <h3 class="card-title accordion-title">
                                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseFour"
                                            aria-expanded="false"
                                            aria-controls="collapseFour">
                                            MAHASISWA
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="accordion-content accordion-desc">
                                        <p>
                                            Role Mahasiswa adalah role yang mempunyai akses ke fitur prestasi untuk menginput data prestasi yang sudah didapatkan. <br>
                                                    Berikut panduan penggunaan sistem untuk role MAHASISWA : <a class="btn btn-sm btn-mat waves-effect waves-light btn-primary">Download</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                   

                </div>
            </div>
        </div>
    </div>
</div>

@endsection