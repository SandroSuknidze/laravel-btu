<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('custom')->group(function () {
    Route::get('/name', function () {
        return 'Sandro';
    });
});

Route::get('/surname', function () {
    return 'Suknidze';
});

Route::get('/age', function () {
    return '21';
});

Route::get('/hobby', function () {
    return 'Basketball';
});

Route::get('/skinColor', function () {
    return 'white';
});

Route::get('/test', function () {
    return 'test success';
});

Route::post('/post', function () {
    return response()->json(['message' => 'წარმატებით განახლდა']);
});

Route::put('/put', function () {
    return response()->json(['message' => 'წარმატებით დაემატა']);
});

Route::delete('/delete', function () {
    return response()->json(['message' => 'წარმატებით წაიშალა']);
});

Route::get('/quizzes', [QuizController::class, 'index']);
Route::get('/quiz/{id?}', [QuizController::class, 'edit'])->name('quiz.edit');
Route::post('/quiz/{id?}', [QuizController::class, 'store']);
Route::get('/quizzing/{id}', [QuizController::class, 'quizzing'])->name('quiz.start');
Route::get('/quiz-view/{id}', [QuizController::class, 'show'])->name('quiz.view');

Route::post('/check-answer', [QuizController::class, 'checkAnswer']);

Route::post('/subscribe', [QuizController::class, 'subscribe']);
