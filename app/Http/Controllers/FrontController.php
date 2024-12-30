<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\front;
use App\Models\Download;
use App\Models\Achievement;
use App\Models\Monev;
use App\Models\Organization;
use App\Models\Scholarship;
use App\Models\studentActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postsKegiatanMhs = Post::where('category_id', '1')->latest()->take(5)->get();
        $postsUmum = Post::where('category_id', '4')->latest()->take(5)->get();
        return view('frontend.beranda', compact('postsKegiatanMhs', 'postsUmum'));
    }

    public function prestasi()
    {
        $rekapitulasi = Achievement::select('prodi', 'peringkat', DB::raw('COUNT(*) as jumlah'))
            ->where('level', 'Regional') // Filter untuk level "Regional"
            ->groupBy('prodi', 'peringkat')
            ->orderBy('prodi')
            ->get();

        $data = [];
        $peringkat = ['Juara 1', 'Juara 2', 'Juara 3', 'Juara Harapan'];

        // Format data untuk memastikan semua peringkat ada
        foreach ($rekapitulasi as $item) {
            $data[$item->prodi][$item->peringkat] = $item->jumlah;
        }

        // Pastikan semua peringkat ada di setiap prodi
        foreach ($data as $prodi => &$rekap) {
            foreach ($peringkat as $j) {
                if (!isset($rekap[$j])) {
                    $rekap[$j] = 0; // Set ke 0 jika peringkat tidak ditemukan
                }
            }
        }


        return view('frontend.prestasi', compact('data', 'peringkat'));
    }

    public function prestasiProvinsi()
    {
        $rekapitulasi = Achievement::select('prodi', 'peringkat', DB::raw('COUNT(*) as jumlah'))
            ->where('level', 'Provinsi') // Filter untuk level "Regional"
            ->groupBy('prodi', 'peringkat')
            ->orderBy('prodi')
            ->get();

        $data = [];
        $peringkat = ['Juara 1', 'Juara 2', 'Juara 3', 'Juara Harapan'];

        // Format data untuk memastikan semua peringkat ada
        foreach ($rekapitulasi as $item) {
            $data[$item->prodi][$item->peringkat] = $item->jumlah;
        }

        // Pastikan semua peringkat ada di setiap prodi
        foreach ($data as $prodi => &$rekap) {
            foreach ($peringkat as $j) {
                if (!isset($rekap[$j])) {
                    $rekap[$j] = 0; // Set ke 0 jika peringkat tidak ditemukan
                }
            }
        }


        return view('frontend.prestasiProvinsi', compact('data', 'peringkat'));
    }

    public function prestasiNasional()
    {
        $rekapitulasi = Achievement::select('prodi', 'peringkat', DB::raw('COUNT(*) as jumlah'))
            ->where('level', 'Nasional') // Filter untuk level "Regional"
            ->groupBy('prodi', 'peringkat')
            ->orderBy('prodi')
            ->get();

        $data = [];
        $peringkat = ['Juara 1', 'Juara 2', 'Juara 3', 'Juara Harapan'];

        // Format data untuk memastikan semua peringkat ada
        foreach ($rekapitulasi as $item) {
            $data[$item->prodi][$item->peringkat] = $item->jumlah;
        }

        // Pastikan semua peringkat ada di setiap prodi
        foreach ($data as $prodi => &$rekap) {
            foreach ($peringkat as $j) {
                if (!isset($rekap[$j])) {
                    $rekap[$j] = 0; // Set ke 0 jika peringkat tidak ditemukan
                }
            }
        }


        return view('frontend.prestasiNasional', compact('data', 'peringkat'));
    }

    public function prestasiInternasional()
    {
        $rekapitulasi = Achievement::select('prodi', 'peringkat', DB::raw('COUNT(*) as jumlah'))
            ->where('level', 'Internasional') // Filter untuk level "Regional"
            ->groupBy('prodi', 'peringkat')
            ->orderBy('prodi')
            ->get();

        $data = [];
        $peringkat = ['Juara 1', 'Juara 2', 'Juara 3', 'Juara Harapan'];

        // Format data untuk memastikan semua peringkat ada
        foreach ($rekapitulasi as $item) {
            $data[$item->prodi][$item->peringkat] = $item->jumlah;
        }

        // Pastikan semua peringkat ada di setiap prodi
        foreach ($data as $prodi => &$rekap) {
            foreach ($peringkat as $j) {
                if (!isset($rekap[$j])) {
                    $rekap[$j] = 0; // Set ke 0 jika peringkat tidak ditemukan
                }
            }
        }


        return view('frontend.prestasiInternasional', compact('data', 'peringkat'));
    }

    public function daftarMahasiswa($prodi, $peringkat, $level)
    {
        // Mengambil daftar mahasiswa berdasarkan prodi, peringkat, dan level "Regional"
        $mahasiswa = Achievement::where('prodi', $prodi)
            ->where('peringkat', $peringkat)
            ->where('level', $level)
            ->get(['nim', 'nama', 'event', 'penyelenggara', 'tglMulai', 'attachment']); // Ambil beberapa kolom

        // Mengirimkan data ke view
        return view('frontend.daftar_mahasiswa', compact('mahasiswa', 'prodi', 'peringkat', 'level'));
    }


    public function unduh()
    {
        $unduh = Download::latest()->paginate(10);
        return view('frontend.unduh', compact('unduh'));
    }

    public function blog()
    {
        $posts = Post::where('category_id', '4')->latest()->paginate(9);
        return view('frontend.blog', compact('posts'));
    }

    public function postdetail(Post $post)
    {
        return view('frontend.post-detail', ['post' => $post]);
    }

    public function monev()
    {
        $postmonevs = Monev::latest()->paginate(9);
        return view('frontend.monev', compact('postmonevs'));
    }

    public function kegiatanMhs()
    {
        $posts = Post::where('category_id', '1')->latest()->paginate(9);
        return view('frontend.kegiatanMhs', compact('posts'));
    }

    public function pengembanganKarakter()
    {
        $posts = Post::where('category_id', '2')->latest()->paginate(9);
        return view('frontend.pengembanganKarakter', compact('posts'));
    }

    public function asrama()
    {
        $posts = Post::where('category_id', '3')->latest()->paginate(9);
        return view('frontend.asrama', compact('posts'));
    }

    public function bem()
    {
        $bem = Organization::find(1); // Mengambil data berdasarkan primary key
        return view('frontend.bem', compact('bem'));
    }

    public function himapsik()
    {
        $himapsik = Organization::find(2); // Mengambil data berdasarkan primary key
        return view('frontend.himapsik', compact('himapsik'));
    }

    public function himafisioterapi()
    {
        $himafisioterapi = Organization::find(3); // Mengambil data berdasarkan primary key
        return view('frontend.himafisioterapi', compact('himafisioterapi'));
    }

    public function himaadminkes()
    {
        $himaadminkes = Organization::find(4); // Mengambil data berdasarkan primary key
        return view('frontend.himaadminkes', compact('himaadminkes'));
    }

    public function beasiswa()
    {
        $scholarships = Scholarship::latest()->paginate(6);
        return view('frontend.beasiswa', compact('scholarships'));
    }
}
