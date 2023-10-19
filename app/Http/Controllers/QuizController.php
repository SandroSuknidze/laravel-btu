<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = [
            ['name' => 'Quiz 1', 'photo' => 'storage/cagar.jpg', 'status' => 'completed'],
            ['name' => 'Quiz 2', 'photo' => 'storage/photo.jpg', 'status' => 'pending'],
        ];

        return view('home', ['quizzes' => $quizzes]);
    }

    public function subscribe(Request $request)
    {
        return redirect('/quizzes')->with('status', 'Subscribed successfully!');
    }
}
