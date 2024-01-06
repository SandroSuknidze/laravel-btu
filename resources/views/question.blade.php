@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <form id="quizForm">
            @csrf
            @foreach($questions as $index => $question)
                <div class="card mb-3">
                    <div class="card-header">
                        Question {{ $index + 1 }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $question->question_text }}</h5>
                        <div class="mt-3">
                            @foreach(json_decode($question->options) as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers" value="{{ $option }}" id="option_{{ $question->id }}_{{ $option }}">
                                    <label class="form-check-label" for="option_{{ $question->id }}_{{ $option }}">
                                        {{ $option }}
                                    </label>
                                </div>
                            @endforeach
                            <small id="feedback_{{ $question->id }}" class="form-text"></small>
                        </div>
                    </div>
                </div>
            @endforeach
            <button type="button" class="btn btn-primary" onclick="checkAnswers({{ $question->id }})">Submit Answers</button>
        </form>
    </div>

    <script>
        function checkAnswers(questionId) {
            const form = document.getElementById('quizForm');
            const formData = new FormData(form);
            const answers = $('input[name=answers]:checked').val();
                console.log()

            }

            fetch('/check-answers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({question_id: questionId, answers: answers})
            })
                .then(response => response.json())
                .then(data => {
                    for (const [questionId, isCorrect] of Object.entries(data.results)) {
                        const feedback = document.getElementById('feedback_' + questionId);
                        if (isCorrect) {
                            feedback.innerHTML = 'Correct!';
                            feedback.classList.add('text-success');
                            feedback.classList.remove('text-danger');
                        } else {
                            feedback.innerHTML = 'Incorrect!';
                            feedback.classList.add('text-danger');
                            feedback.classList.remove('text-success');
                        }
                    }
                });

        }
    </script>

@endsection
