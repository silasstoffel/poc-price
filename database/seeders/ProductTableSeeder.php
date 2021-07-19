<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Pricing\Entities\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $faker = Faker::create();

        for ($i = 0; $i < 250; $i++) {
            Product::create([
                'id' => Str::uuid()->toString(),
                'name' => $faker->name,
                'description' => $faker->sentence,
                'sku' => $faker->word,
                'category_id' => $faker->word,
                'price' => (float) $faker->randomFloat(1, 2),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
