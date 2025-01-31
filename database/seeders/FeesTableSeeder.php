<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fees')->insert([
            ['type' => 'sale', 'fee' => 1000],
            ['type' => 'rent', 'fee' => 500],
        ]);

    }
}
