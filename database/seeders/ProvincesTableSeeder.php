<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $provinces= [
            ['name' => 'Province 1'],
            ['name' => 'Province 2'],
            ['name' => 'Province 3'],
            ['name' => 'Gandaki Province'],
            ['name' => 'Lumbini Province'],
            ['name' => 'Karnali Province'],
            ['name' => 'Sudurpashchim Province'],
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
