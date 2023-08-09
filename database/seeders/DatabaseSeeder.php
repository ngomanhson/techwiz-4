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
                'name' => 'Flowering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Non flowering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Indoor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Outdoor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Succulents',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Medicinal and so on',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('products')->insert([
            [
                'product_category_id' => 1,
                'name' => 'Skip Cherry Laurel',
                'slug' => Str::slug('Skip Cherry Laurel'),
                'description' => 'Skip Laurel is well known for its hardiness. Other varieties of Laurel will brown in winter, with those lovely glossy leaves turning brown and ugly. If you live in cooler areas, such as zone 6, be careful to choose this variety for your garden. In those areas it will always go through the winter without browning, coming into the spring looking as healthy and fresh as it did in fall.',
                'content' => null,
                'price' => 59.50,
                'qty' => 25,
                'discount' => 63.05,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'rate' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 6,
                'name' => 'Probiotic Root Stimulant',
                'slug' => Str::slug('Probiotic Root Stimulant'),
                'description' => 'Every one of the components in Probiotic Root Stimulant are supported by horticultural science, and we crafted this hand-blended mix from multiple ingredients chosen with the help of the latest scientific breakthroughs, and decades of experience. Every component has been proven to accelerate the establishment and adaption of newly-planted trees, so together they are the complete mixture every new tree needs.',
                'content' => null,
                'price' => 9.10,
                'qty' => 25,
                'discount' => 16.52,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'rate' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 1,
                'name' => 'Little Gem Southern Magnolia',
                'slug' => Str::slug('Little Gem Southern Magnolia'),
                'description' => 'The Little Gem Southern Magnolia is a versatile plant that can be used in many different ways in the garden. Because of its smaller size, it makes a great specimen tree in the lawn for a smaller garden. It is gorgeous planted as a beautiful background to other shrubs and flowering plants. It also makes an elegant avenue, spaced out along a driveway in pairs, with one on either side. If you need a screen, this tree is ideal, since it stays compact, but is rapid growing, dense and evergreen, with the bonus of beautiful flowers',
                'content' => null,
                'price' => 129.10,
                'qty' => 5,
                'discount' => 146.91,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'rate' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);


        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'front/assets/img/product/product-1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'path' => 'front/assets/img/product/product-1.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'path' => 'front/assets/img/product/product-1.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'path' => 'front/assets/img/product/product-1.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'path' => 'front/assets/img/product/product-2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'path' => 'front/assets/img/product/product-2.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'path' => 'front/assets/img/product/product-2.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'path' => 'front/assets/img/product/product-2.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'path' => 'front/assets/img/product/product-3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'path' => 'front/assets/img/product/product-3.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'path' => 'front/assets/img/product/product-3.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'path' => 'front/assets/img/product/product-3.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Ngô Mạnh Sơn',
                'email' => 'ngomanhson2004txpt@gmail.com',
                'password' => Hash::make('23102004'),
                'level' => 2,
                'description' => null,
                'company_name'=> 'FPT APTECH',
                'country'=> 'Viêt Nam',
                'street_address'=> '8A Tôn Thất Thuyết',
                'town_city'=> 'Hà Nội',
                'postcode_zip'=> '100000',
                'phone'=> '0929999999',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
