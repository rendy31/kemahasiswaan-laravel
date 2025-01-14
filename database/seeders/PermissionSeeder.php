<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'post']);
        Permission::create(['name'=>'organisasi']);
        Permission::create(['name'=>'monev']);
        Permission::create(['name'=>'prestasi']);
        Permission::create(['name'=>'beasiswa']);
        Permission::create(['name'=>'setting']);
    }
}
