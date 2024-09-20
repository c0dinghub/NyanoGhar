<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\LocalBody;
use App\Models\Province;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProvincesTableSeeder::class,
            DistrictsTableSeeder::class,
            LocalBodiesTableSeeder::class,
        ]);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone'=>'1234567890'
        ]);


        // District::factory()->create([
        //     'name' => 'Test User',
        // ]);

        // LocalBody::factory()->create([
        //     'name' => 'Test User',
        // ]);
    }
}
