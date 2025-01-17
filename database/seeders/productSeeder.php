<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 200) as $index) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 100),
                'size' => json_encode($faker->randomElements(['S', 'M', 'L', 'XL'], rand(1, 4))),
                'color' => json_encode($faker->randomElements(['Red', 'Blue', 'Green', 'Black', 'White'], rand(1, 5))),
                'category' => $faker->randomElement(['Clothing', 'Accessories', 'Footwear']),
                'brand' => $faker->company,
                'stock' => $faker->numberBetween(10, 100),
                'image_url' => $faker->imageUrl(640, 480, 'fashion'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
