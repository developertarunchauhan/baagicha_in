<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cats = \App\Models\Category::all()->count();
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(rand(1, 2)) . " " . $faker->word;
            $subcategory = \App\Models\Subcategory::create([
                'title' => $title,
                'slug' => Str::slug($title, '-'),
                'image' => 'img_' . rand(1, 5) . '.jpg',
                'description' => $faker->sentence($nbWords = 20, $variableNbWords = true),
                'created_at' => now()
            ]);
            $cat_array = [rand(1, 3), rand(4, 5), rand(6, 7)];
            $subcategory->categories()->attach($cat_array);
        }
    }
}
