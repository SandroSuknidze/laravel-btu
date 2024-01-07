@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/quizzes">Go back</a>
                <div class="card">
                    <img src="{{ asset($quiz['photo']) }}" class="card-img-top" alt="{{ $quiz['name'] }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $quiz['name'] }}</h3>
                        <p class="card-text">
                            <strong>Status:</strong> {{ $quiz['status'] }}
                        </p>
                        <p class="card-text">
                            <strong>Description:</strong> {{ $quiz['description'] }}
                        </p>
                        <p class="card-text">
                            <strong>Author:</strong> {{ $quiz['author'] }}
                        </p>
                        <a href="{{ route('quiz.start', $quiz->id) }}" style="color: white"><button class="btn btn-primary">Start Quiz</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
