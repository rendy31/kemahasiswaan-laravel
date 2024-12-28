@extends('layouts.frontend')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url('{{ url('assets/frontend/img/page-title-bg.webp') }}')">
        <div class="container position-relative">
            <h1>Prestasi</h1>
            {{-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                molestias.</p> --}}
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
                    <li class="current">Detail Prestasi</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <h2>Starter Section</h2> --}}
            <p><span>List Mahasiswa Berprestasi</span> </p>
            <p><span> {{ $prodi }} - {{ $peringkat }} - {{ $level }}</span> </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            {{-- <p><strong>Prodi:</strong> {{ $prodi }}</p>
            <p><strong>Peringkat:</strong> {{ $peringkat }}</p>
            <p><strong>Level:</strong> {{ $level }}</p> --}}

            @if ($mahasiswa->isEmpty())
                <p class="alert alert-danger">Tidak ada mahasiswa yang terdaftar untuk peringkat ini.</p>
            @else
                <table class="display row-border nowrap compact hover table-sm" id="myTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Mahasiswa</th>
                            <th>Event</th>
                            <th>Penyelenggara</th>
                            <th>Tanggal</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $index => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->event }}</td>
                                <td>{{ $item->penyelenggara }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tglMulai)->translatedFormat('l, d F Y') }}</td>
                                <td>
                                    @if ($item->attachment)
                                        <a href="{{ asset('storage/' . $item->attachment) }}" target="_blank"
                                            class="btn btn-sm  btn-outline-primary">Lampiran</a>
                                    @else
                                        Tidak ada lampiran
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        {{-- <div class="d-flex justify-content-center mt-5">
            {{ $unduh->links() }}
        </div> --}}

    </section><!-- /Starter Section Section -->
@endsection
