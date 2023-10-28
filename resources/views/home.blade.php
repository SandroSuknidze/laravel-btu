@extends('layouts.app')


@push('styles')
    <link rel="stylesheet" href="/css/custom-home.css">
@endpush

@push('scripts')
    <script src="/js/custom-home.js"></script>
@endpush

@section('content')
<div class="row">
    @foreach($quizzes as $quiz)
        <div class="col-md-4 mb-4">
            <div class="card s {{ $quiz['status'] == 'completed' ? 'border-success' : 'border-warning' }}">
                <img src="{{ asset($quiz['photo']) }}" alt="{{ $quiz['name'] }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $quiz['name'] }}</h5>
                    <p class="card-text">Status: {{ ucfirst($quiz['status']) }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>


<a href="{{ route('quiz.edit') }}">Add New Quiz</a>
<ul>
    @foreach($quizzes as $quiz)
        <li>
            {{ $quiz->name }}
            <a href="{{ route('quiz.edit', $quiz->id) }}">Edit</a>
        </li>
    @endforeach
</ul>

{{--<div>--}}
{{--    @foreach (App\Models\Quiz::all() as $quiz)--}}
{{--        <div>--}}
{{--            <h2>{{ $quiz->name }}</h2>--}}
{{--            <p>{{ $quiz->description }}</p>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}

<footer class="mt-5">
    <form action="/subscribe" method="POST" class="form-inline justify-content-center">
        @csrf
        <div class="form-group mb-2 mr-2">
            <input type="email" name="email" class="form-control" placeholder="Enter your email">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
    </form>
</footer>
@endsection
