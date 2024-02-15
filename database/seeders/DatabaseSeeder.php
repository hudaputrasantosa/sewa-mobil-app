<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'id' => Str::uuid(),
                'nama' => 'admin',
                'alamat' => 'daerah purwokerto',
                'no_telepon' => '085166562766',
                'no_sim' => '5643-1563',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123')
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'huda',
                'alamat' => 'daerah purwokerto',
                'no_telepon' => '085166562766',
                'no_sim' => '5643-1563',
                'role' => 'user',
                'email' => 'huda@gmail.com',
                'password' => Hash::make('huda123')
            ]
        ]);
    }
}
