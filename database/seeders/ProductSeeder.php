<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cat_count = \App\Models\Category::all()->count();
        $subcat_count = \App\Models\Subcategory::all()->count();
        for ($i = 0; $i < 50; $i++) {
            $title = $faker->sentence(rand(1, 6)) . "" . $faker->word();
            $product = \App\Models\Product::create([
                'title' => $title,
                'slug' => Str::slug($title, '-'),
                'description' => $faker->sentence($nbWords = 20, $variableNbWords = true),
                'image' => 'img_' . rand(1, 5) . '.jpg',
                'status' => rand(0, 1) ? 'In Stocks' : 'Out Of Stock',
                'price' => rand(100, 1000),
                'created_at' => now()
            ]);
            $product_cat = [rand(1, $cat_count / 2), rand(($cat_count / 2 + 1), $cat_count)];
            $product_subcat = [rand(1, $subcat_count / 2), rand(($subcat_count / 2 + 1), $subcat_count)];
            $product->categories()->attach($product_cat);
            $product->subcategories()->attach($product_subcat);
        }
    }
}
