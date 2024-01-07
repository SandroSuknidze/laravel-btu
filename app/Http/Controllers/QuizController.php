<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {

        $quizzes = Quiz::whereNotNull('photo')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
//            ->limit(8)
            ->get();

//        if ($quizzes->count() < 8) {
//            $additionalQuizzes = Quiz::whereNotNull('description')
//                ->whereNotIn('id', $quizzes->pluck('id'))
//                ->where('active', true)
//                ->orderBy('created_at', 'desc')
//                ->limit(8 - $quizzes->count())
//                ->get();
//
//            $quizzes = $quizzes->merge($additionalQuizzes);
//        }


        return view('home', ['quizzes' => $quizzes]);
    }

    public function show($id): Factory|View|Application
    {
        $quiz = Quiz::findOrFail($id);

        return view('view', compact('quiz'));
    }

    public function edit($id = null)
    {
        $quiz = ($id) ? Quiz::find($id) : new Quiz;
        return view('edit', compact('quiz'));
    }

    public function store(Request $request, $id = null)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $quiz = ($id) ? Quiz::find($id) : new Quiz;
        $quiz->fill($data);
        $quiz->save();

        return redirect('/quizzes')->with('success', 'Quiz saved successfully!');
    }

    public function quizzing($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        return view('question', compact('quiz'));
    }


    public function checkAnswer(Request $request)
    {
        $data = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required',
        ]);


        $question = Question::find($data['question_id']);
        $isCorrect = $question && $question->correct_answer == $data['answer'];

        return response()->json(['correct' => $isCorrect]);
    }




    public function subscribe(Request $request)
    {
        return redirect('/quizzes')->with('status', 'Subscribed successfully!');
    }
}
