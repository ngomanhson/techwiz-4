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
                'description' => 'The Little Gem Southern Magnolia is a versatile plant that can be used in many different ways in the garden. Because of its smaller size, it makes a great specimen tree in the lawn for a smaller garden. It is gorgeous planted as a beautiful background to other shrubs and flowering plants. It also makes an elegant avenue, spaced out along a driveway in pairs, with one on either side. If you need a screen, this tree is ideal, since it stays compact, but is rapid growing, dense and evergreen, with the bonus of beautiful flowers.',
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
            [
                'product_category_id' => 3,
                'name' => 'Aglaonema Jazzed Gems™ Dizzy Diamond',
                'slug' => Str::slug('Aglaonema Jazzed Gems Dizzy Diamond'),
                'description' => 'Aglaonema Jazzed Gems™ ‘Sapphire Suzanne’ is a showy houseplant displaying dark green leaves with leaf edges that glow reddish pink. The foliage is carried on lovely pale pink stems. Bright indirect light will bring out the best color in your home.',
                'content' => null,
                'price' => 32.71,
                'qty' => 5,
                'discount' => 39.23,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'rate' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 6,
                'name' => 'Neem Oil',
                'slug' => Str::slug('Neem Oil'),
                'description' => 'Pure cold pressed neem oil Docneem is produced by cold pressing technology, keeping the original essence and has a strong smell to help repel and eliminate harmful insects extremely effectively. At the same time inhibits the development of eggs, pupae of pests. Limiting pests laying eggs, preventing the molting of harmful pests.',
                'content' => null,
                'price' => 15.91,
                'qty' => 5,
                'discount' => 19.22,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'rate' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 5,
                'name' => 'Zig-Zag Cactus',
                'slug' => Str::slug('Zig-Zag Cactus'),
                'description' => 'Zig-Zag Cactus is an excellent choice for someone starting to care for houseplants. The succulent leaves hold moisture minimizing the need for frequent watering. The thin wavy leaves will cascade over the sides of the container, creating undulating waves of green ribbons. Provide the Zig Zag Cactus with over 6 hours of bright indirect sunlight daily and temperatures over 65°F to encourage it to grow.',
                'content' => null,
                'price' => 55.00,
                'qty' => 5,
                'discount' => 60.00,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'rate' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 4,
                'name' => 'Karl Rosenfield Peony',
                'slug' => Str::slug('Karl Rosenfield Peony'),
                'description' => 'The Karl Rosenfield Peony is an herbaceous perennial plant, dying back to the ground each fall and returning in spring to quickly develop into a shrub-like bush, 2 to 3 feet tall and wide, with large, glossy green leaves divided into many pointed lobes. These stay beautiful and attractive all through summer and into fall, when they often turn shades of red and gold.',
                'content' => null,
                'price' => 69.50,
                'qty' => 12,
                'discount' => 83.23,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'rate' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 2,
                'name' => 'Dracaena Ulises',
                'slug' => Str::slug('Dracaena Ulises'),
                'description' => 'Glossy and Glamorous, Ulises lances at your space with radiant green foliage banded with white striping. The compact arrangement of this dragon tree against a bright backdrop creates an atmosphere of sophistication and elegance, the perfect statement piece in an entrance or hallway. The multi-stem variety of this Dracaena displays individual plants at tiered heights creating a more structured and sculptural display.',
                'content' => null,
                'price' => 151.22,
                'qty' => 12,
                'discount' => 162.93,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'rate' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 1,
                'name' => 'Olympic Fire Mountain Laurel',
                'slug' => Str::slug('Olympic Fire Mountain Laurel'),
                'description' => 'The Olympic Flame Mountain Laurel is an evergreen shrub with an upright, rounded form. In the garden, it will grow to 4 or 5 feet in height, and perhaps 4 feet wide – in a planter it will be smaller. Even when not in flower the foliage is excellent. The smooth oval leaves are glossy and leathery, between 3 and 5 inches long, and with an attractive wavy edge. The leaves give the plant a nice dense look, and it is attractive every day of the year. Older plants may develop a woody, gnarled base, which only adds to their appeal.',
                'content' => null,
                'price' => 64.80,
                'qty' => 12,
                'discount' => 60.93,
                'weight' => null,
                'sku' => Str::random(8),
                'featured' => true,
                'rate' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 6,
                'name' => 'Indoor Plant Mister',
                'slug' => Str::slug('Indoor Plant Mister'),
                'description' => 'Keep your plants looking and feeling fresh in style with a classically styled metal mister in a deep grey coating. Perfect for houseplants that crave humidity and a soft approach to watering. The super-fine mist of this must-have accessory will revitalise your plants with delicacy.',
                'content' => null,
                'price' => 99.10,
                'qty' => 12,
                'discount' => 100.88,
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
            [
                'product_id' => 4,
                'path' => 'front/assets/img/product/product-4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'path' => 'front/assets/img/product/product-4.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'path' => 'front/assets/img/product/product-4.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'path' => 'front/assets/img/product/product-4.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'path' => 'front/assets/img/product/product-5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'path' => 'front/assets/img/product/product-5.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'path' => 'front/assets/img/product/product-6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'path' => 'front/assets/img/product/product-6.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'path' => 'front/assets/img/product/product-6.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'path' => 'front/assets/img/product/product-6.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'path' => 'front/assets/img/product/product-7.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'path' => 'front/assets/img/product/product-7.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'path' => 'front/assets/img/product/product-7.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'path' => 'front/assets/img/product/product-7.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'path' => 'front/assets/img/product/product-8.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'path' => 'front/assets/img/product/product-8.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'path' => 'front/assets/img/product/product-8.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 8,
                'path' => 'front/assets/img/product/product-8.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 9,
                'path' => 'front/assets/img/product/product-9.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 9,
                'path' => 'front/assets/img/product/product-9.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 9,
                'path' => 'front/assets/img/product/product-9.3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 9,
                'path' => 'front/assets/img/product/product-9.4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'path' => 'front/assets/img/product/product-10.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'path' => 'front/assets/img/product/product-10.2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 10,
                'path' => 'front/assets/img/product/product-10.3.png',
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
