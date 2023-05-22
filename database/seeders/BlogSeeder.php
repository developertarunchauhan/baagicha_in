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
        for ($i = 0; $i < 500; $i++) {
            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            DB::table('blogs')->insert([
                'title' => $title,
                'slug' => Str::slug($title, '-'),
                'excrept' => $faker->sentence($nbWords = 20, $variableNbWords = true),
                'body' => $faker->text($maxNbChars = 200),
                'image' => 'blog.jpg',
                'tags' => $faker->word,
                'meta_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'seo_title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'user_id' => rand(1, 10),
            ]);
        }
    }
}