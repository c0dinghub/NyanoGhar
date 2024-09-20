<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('provinces')->insert([
            ['name' => 'Province 1'],
            ['name' => 'Province 2'],
            ['name' => 'Province 3'],
            ['name' => 'Gandaki Province'],
            ['name' => 'Lumbini Province'],
            ['name' => 'Karnali Province'],
            ['name' => 'Sudurpashchim Province'],
        ]);
    }
}
