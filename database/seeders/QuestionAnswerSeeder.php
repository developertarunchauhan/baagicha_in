<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class QuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Question::factory(100)->has(\App\Models\Answer::factory()->count(4))->create();

        // \App\Models\Question::factory(10)->create()->each(function ($question) {
        //     $ans = \App\Models\Answer::factory(4)->make();
        //     $question->answers()->save($ans);
        // });
    }
}
