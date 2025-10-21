<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        \App\Models\Category::insert([
            [
                'name' => '2D Art',
                'slug' => Str::slug('2D Art')
            ],
            [
                'name' => '3D Art',
                'slug' => Str::slug('3D Art')
            ],
            [
                'name' => 'Webtoon',
                'slug' => Str::slug('Webtoon')
            ],
            [
                'name' => 'Anime',
                'slug' => Str::slug('Anime')
            ],
        ]);

        \App\Models\PriceReference::insert([
            [
                'category_id' => 1,
                'level' => 'entry',
                'min_price' => 300000,
                'max_price' => 700000,
                'pricing_unit' => 'per artwork'
            ],
            [
                'category_id' => 1,
                'level' => 'mid',
                'min_price' => 800000,
                'max_price' => 2000000,
                'pricing_unit' => 'per artwork'
            ],
            [
                'category_id' => 3,
                'level' => 'entry',
                'min_price' => 50000,
                'max_price' => 100000,
                'pricing_unit' => 'per panel'
            ],
            [
                'category_id' => 4,
                'level' => 'mid',
                'min_price' => 100000,
                'max_price' => 300000,
                'pricing_unit' => 'per second'
            ],
        ]);
    }
}
