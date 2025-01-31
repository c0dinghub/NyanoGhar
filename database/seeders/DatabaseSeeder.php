<?php

namespace Database\Seeders;

use App\Models\Role;
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
        // User::factory(10)->create();

        if (User::whereEmail('admin@admin.com')->count() < 1)
        User::create([
            'name' => 'Super Admin',
            'role' => 'superAdmin',
            'email' => 'admin@admin.com',
            'password' =>bcrypt('password'),
        ]);
        $this->call([
            AddressSeeder::class,

        ]);
        Role::insert([
            ['name' => 'admin'],
            ['name' => 'agent'],
            ['name' => 'user'],
        ]);
    }

}
