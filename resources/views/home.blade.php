<x-app-layout>

    <div class="row">
        @foreach($quizzes as $quiz)
            <div class="col-md-4 mb-4">
                <div class="card s {{ $quiz['status'] == 'approved' ? 'border-success' : 'border-warning' }}">
                    <img src="{{ asset($quiz['photo']) }}" alt="{{ $quiz['name'] }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $quiz['name'] }}</h5>
                        <p class="card-text">Status: {{ ucfirst($quiz['status']) }}
                            <a href="{{ route('quiz.view', $quiz->id) }}">View Quiz</a>
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


    <footer class="mt-5">
        <form action="/subscribe" method="POST" class="form-inline justify-content-center">
            @csrf
            <div class="form-group mb-2 mr-2">
                <input type="email" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
        </form>
    </footer>
</x-app-layout>
