<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\front;
use App\Models\Download;
use App\Models\Achievement;
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
        $postsKegiatanMhs = studentActivity::latest()->take(5)->get();
        $postsBerita = Post::where('category_id','1')->latest()->take(5)->get();
        return view('frontend.beranda',compact('postsKegiatanMhs','postsBerita'));
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
            
            
        return view('frontend.prestasi', compact('data','peringkat'));
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
            
            
        return view('frontend.prestasiProvinsi', compact('data','peringkat'));
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
            
            
        return view('frontend.prestasiNasional', compact('data','peringkat'));
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
            
            
        return view('frontend.prestasiInternasional', compact('data','peringkat'));
    }

    public function downloadfile()
    {
        $downloadfiles = Download::latest()->paginate(10);
        return view('frontend.ebook', compact('downloadfiles'));
    }

    public function blog()
    {
        $posts = Post::where('category_id', '1')->latest()->paginate(9);
        return view('frontend.blog', compact('posts'));
    }
    
    public function postdetail(Post $post)
    {
        return view('frontend.blog-detail',['post'=>$post]);
    }

    public function monev()
    {
        $posts = Post::where('category_id', '3')->get();
        return view('frontend.monev', compact('posts'));
    }

    public function kegiatanMhs()
    {
        $activities = studentActivity::latest()->paginate(6);
        return view('frontend.kegiatanMhs', compact('activities'));
    }
}
