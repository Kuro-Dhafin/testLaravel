<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
use App\Models\Service;
use App\Models\PriceReference;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::firstOrCreate(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ]
        );

        // Sample artist users
        $artists = [
            ['name' => 'Alice', 'email' => 'alice@mail.com', 'password' => bcrypt('password'), 'role' => 'artist'],
            ['name' => 'Bob', 'email' => 'bob@mail.com', 'password' => bcrypt('password'), 'role' => 'artist'],
        ];

        foreach ($artists as $artist) {
            User::firstOrCreate(['email' => $artist['email']], $artist);
        }

        // Categories
        $categories = [
            ['name' => '2D Art', 'slug' => Str::slug('2D Art')],
            ['name' => '3D Art', 'slug' => Str::slug('3D Art')],
            ['name' => 'Webtoon', 'slug' => Str::slug('Webtoon')],
            ['name' => 'Anime', 'slug' => Str::slug('Anime')],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }

        // Price references
        $priceReferences = [
            [
                'category_id' => 1,
                'level' => 'entry',
                'price_min' => 300000,
                'price_max' => 700000,
                'pricing_unit' => 'per artwork'
            ],
            [
                'category_id' => 1,
                'level' => 'mid',
                'price_min' => 800000,
                'price_max' => 2000000,
                'pricing_unit' => 'per artwork'
            ],
        ];

        foreach ($priceReferences as $pr) {
            PriceReference::firstOrCreate(
                ['category_id' => $pr['category_id'], 'level' => $pr['level']],
                $pr
            );
        }

        // Sample services for search & display
        $artistIds = User::where('role', 'artist')->pluck('id')->toArray();
        $services = [
            [
                'title' => 'Digital Portrait',
                'price' => 500000,
                'price_unit' => 'per panel',
                'description' => 'High-quality digital portrait, perfect for social media or gifts.',
                'category_id' => 1,
                'user_id' => $artistIds[0],
                'image' => null,
            ],
            [
                'title' => '3D Character Model',
                'price' => 1500000,
                'price_unit' => 'per second',
                'description' => 'Detailed 3D model ready for animation or games.',
                'category_id' => 2,
                'user_id' => $artistIds[1],
                'image' => null,
            ],
            [
                'title' => 'Webtoon Episode Illustration',
                'price' => 800000,
                'price_unit' => 'per panel',
                'description' => 'Illustrations for your webtoon series.',
                'category_id' => 3,
                'user_id' => $artistIds[0],
                'image' => null,
            ],
            [
                'title' => 'Anime-style Character',
                'price' => 600000,
                'price_unit' => 'per panel',
                'description' => 'Anime-inspired character illustrations.',
                'category_id' => 4,
                'user_id' => $artistIds[1],
                'image' => null,
            ],
        ];

        foreach ($services as $srv) {
            Service::firstOrCreate(
                ['title' => $srv['title'], 'user_id' => $srv['user_id']],
                $srv
            );
        }
    }
}
