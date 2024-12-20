@extends('layouts.frontend')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/frontend/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Prestasi</h1>
            {{-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                molestias.</p> --}}
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Prestasi</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <h2>Starter Section</h2> --}}
            <p><span>Daftar Prestasi Mahasiswa - Nasional</span> </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            {{-- <h3>Daftar Prestasi Mahasiswa</h3> --}}
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{route('prestasi')}}">Regional</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('prestasiProvinsi')}}">Provinsi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('prestasiNasional')}}">Nasional</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('prestasiInternasional')}}">Internasional</a>
                </li>
            </ul>
            <hr>
            <div class="container  my-2">
                <div class="row align-items-start">
                    <div class="col">
                        <canvas id="chart" width="400" height="200"></canvas>
                    </div>
                    <div class="col">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Prodi</th>
                                    <th scope="col">Juara 1</th>
                                    <th scope="col">Juara 2</th>
                                    <th scope="col">Juara 3</th>
                                    <th scope="col">Harapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $prodi => $rekap)
                                    <tr>
                                        <td>{{ $prodi }}</td>
                                        <td>{{ $rekap['Juara 1'] }}</td>
                                        <td>{{ $rekap['Juara 2'] }}</td>
                                        <td>{{ $rekap['Juara 3'] }}</td>
                                        <td>{{ $rekap['Juara Harapan'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </section><!-- /Starter Section Section -->

@endsection

@section('scripts')
    <script>
        // Data dari Laravel
        const labels = {!! json_encode(array_keys($data)) !!}; // Prodi
        const peringkat = {!! json_encode($peringkat) !!}; // Peringkat
        const rawData = {!! json_encode($data) !!}; // Data dari Laravel

        // Buat dataset untuk setiap peringkat
        const datasets = [];
        const colors = ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0']; // Warna batang

        peringkat.forEach((p, index) => {
            datasets.push({
                label: p, // Nama peringkat
                backgroundColor: colors[index],
                data: labels.map(prodi => rawData[prodi][p] || 0) // Jumlah data per prodi
            });
        });

        // Inisialisasi Chart.js
        const ctx = document.getElementById('chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Prodi
                datasets: datasets // Data per peringkat
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    // title: {
                    //     display: true,
                    //     text: 'Grafik Prestasi Mahasiswa (Regional)'
                    // }
                },
                scales: {
                    x: {
                        stacked: false, // Batang menyamping
                    },
                    y: {
                        stacked: false, // Batang menyamping
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection