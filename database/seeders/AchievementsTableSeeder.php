<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AchievementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Menggunakan lokal bahasa Indonesia

        // Daftar contoh data untuk kolom tertentu
        $prodis = ['PSIK & Ners', 'Fisioterapi', 'AdminKes'];
        $events = ['Lomba Karya Tulis Ilmiah', 'Olimpiade Nasional', 'Hackathon', 'Workshop Kepemimpinan'];
        $levels = ['Regional', 'Provinsi', 'Nasional', 'Internasional'];
        $peringkat = ['Juara 1', 'Juara 2', 'Juara 3', 'Juara Harapan'];

        for ($i = 0; $i < 50; $i++) {
            DB::table('achievements')->insert([
                'nim' => $faker->numerify('2021#####'), // Format NIM
                'nama' => $faker->name, // Nama mahasiswa
                'prodi' => $faker->randomElement($prodis), // Pilih prodi secara acak
                'event' => $faker->randomElement($events), // Pilih event secara acak
                'penyelenggara' => $faker->company, // Nama penyelenggara
                'tempat' => $faker->city, // Kota penyelenggaraan
                'tglMulai' => $faker->date('Y-m-d', 'now'), // Tanggal mulai (sebelum hari ini)
                'tglAkhir' => $faker->date('Y-m-d', '+2 day'), // Tanggal akhir (1 minggu setelah mulai)
                'namaPenghargaan' => $faker->sentence(3), // Nama penghargaan
                'peringkat' => $faker->randomElement($peringkat), // Pilih peringkat secara acak
                'level' => $faker->randomElement($levels), // Pilih level secara acak
            ]);
        }
    }
}
