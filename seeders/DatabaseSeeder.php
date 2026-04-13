<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 1. Buat Master Data: Rak Buku (Bookshelfs)
        for ($i = 1; $i <= 5; $i++) {
            DB::table('bookshelfs')->insert([
                'code' => 'RK0' . $i,
                'name' => 'Rak Utama ' . $i,
                'created_at' => now(),
            ]);
        }

        // 2. Buat 50 Data User dengan Aturan NPM Khusus
        for ($i = 1; $i <= 50; $i++) {
            $kodeJurusan = "55201";
            $angkatan = $faker->numberBetween(21, 25); // Angkatan 21-25
            $urutan = str_pad($i, 3, '0', STR_PAD_LEFT); // Urutan 001, 002...
            $npm = $kodeJurusan . $angkatan . $urutan;

            DB::table('users')->insert([
                'npm' => (int)$npm,
                'username' => $faker->unique()->userName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'created_at' => now(),
            ]);
        }

        // 3. Buat 50 Data Buku
        for ($i = 1; $i <= 50; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'year' => $faker->year,
                'publisher' => $faker->company,
                'city' => $faker->city,
                'cover' => 'default.jpg',
                'bookshelf_id' => $faker->numberBetween(1, 5),
                'created_at' => now(),
            ]);
        }
    }
}