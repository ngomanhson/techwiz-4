<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Hoa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('products')->insert([
            [
                'product_category_id' => 2,
                'name' => 'Commodo Augue Nisi',
                'slug' => Str::slug('Commodo Augue Nisi'),
                'description' => 'This adidas half-cap is perfect for tennis courts, training courts and running tracks.AEROREADY technology wicks away moisture to keep you dry and comfortable, while a curved cap protects your eyes from the sun.Silicone logo Embossed with sporty accents.',
                'content' => null,
                'price' => 18,
                'qty' => 25,
                'discount' => 21,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'tag_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 2,
                'name' => 'Adipiscing Cursus',
                'slug' => Str::slug('Adipiscing Cursus'),
                'description' => 'This adidas half-cap is perfect for tennis courts, training courts and running tracks.AEROREADY technology wicks away moisture to keep you dry and comfortable, while a curved cap protects your eyes from the sun.Silicone logo Embossed with sporty accents.',
                'content' => null,
                'price' => 13,
                'qty' => 25,
                'discount' => 21,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'tag_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('product_tag')->insert([
            [
                'name' => 'Keo',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => now(),
            ]
        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'https://images.unsplash.com/photo-1690983316606-87b1d720f1cf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1fHx8ZW58MHx8fHx8&auto=format&fit=crop&w=800&q=60',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'path' => 'https://images.unsplash.com/photo-1691175085195-a743156f9b2c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw5fHx8ZW58MHx8fHx8&auto=format&fit=crop&w=800&q=60',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
