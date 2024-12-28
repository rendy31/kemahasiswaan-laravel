<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organizations')->insert([
            ['name' => 'BEM', 'structure' => 'BEM.jpg', 'description' => 'ini deskripsi struktur organisasi'],
            ['name' => 'HIMA PSIK', 'structure' => 'HIMA PSIK.jpg', 'description' => 'ini deskripsi struktur organisasi'],
            ['name' => 'HIMA Fisioterapi', 'structure' => 'HIMA Fisioterapi.jpg', 'description' => 'ini deskripsi struktur organisasi'],
            ['name' => 'HIMA AdminKes',  'structure' => 'HIMA AdminKes.jpg', 'description' => 'ini deskripsi struktur organisasi'],
        ]);
    }
}
