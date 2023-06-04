<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            \App\Models\Variety::create([
                'title' => $faker->word,
                'description' =>  $faker->sentence($nbWords = 20, $variableNbWords = true),
                'variety_id' => rand(0, $i),
            ]);
        }
    }
}
