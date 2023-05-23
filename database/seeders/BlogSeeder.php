<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cats = \App\Models\Category::all()->count();

        for ($i = 0; $i < 500; $i++) {
            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $blog = \App\Models\Blog::create([
                'title' => $title,
                'slug' => Str::slug($title, '-'),
                'excrept' => $faker->sentence($nbWords = 20, $variableNbWords = true),
                'body' => $faker->text($maxNbChars = 200),
                'image' => 'img_' . rand(1, 5) . '.jpg',
                'tags' => $faker->word,
                'meta_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'seo_title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'status' => rand(0, 1) ? 'Published' : 'Draft',
                'user_id' => rand(1, 10),
                'created_at' => now()
            ]);
            $cat_array = [rand(1, 3), rand(4, 5), rand(6, 7)];
            $blog->categories()->attach($cat_array);
        }
    }
}
