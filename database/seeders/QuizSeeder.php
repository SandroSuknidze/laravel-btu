<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('quizzes')->insert([
//            ['name' => 'Quiz 1', 'description' => 'Description for quiz 1'],
//            ['name' => 'Quiz 2', 'description' => 'Description for quiz 2'],
//            ['name' => 'Quiz 3', 'description' => 'Description for quiz 3'],
//            ['name' => 'Quiz 4', 'description' => 'Description for quiz 4'],
//            ['name' => 'Quiz 5', 'description' => 'Description for quiz 5'],
//        ]);
         Quiz::factory(32)->create();

    }
}
