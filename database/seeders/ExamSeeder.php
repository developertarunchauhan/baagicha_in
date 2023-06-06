<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exam_list = [
            [
                'title' => 'PHP',
                'description' => 'This is a PHP exam'
            ],
            [
                'title' => 'Java',
                'description' => 'This is a Java exam'
            ],
            [
                'title' => 'JavaScript',
                'description' => 'This is a JavaScript exam'
            ],
            [
                'title' => 'Python',
                'description' => 'This is a Python exam'
            ],
            [
                'title' => 'Ruby',
                'description' => 'This is a Ruby exam'
            ],
            [
                'title' => 'SQL',
                'description' => 'This is a SQL exam'
            ],
            [
                'title' => 'Perl',
                'description' => 'This is a Perl exam'
            ],
            [
                'title' => 'Swift',
                'description' => 'This is a Swift exam'
            ],
            [
                'title' => 'Scala',
                'description' => 'This is a Scala exam'
            ],
            [
                'title' => 'Rust',
                'description' => 'This is a Rust exam'
            ]
        ];
        DB::table('exams')->insert($exam_list);
    }
}
