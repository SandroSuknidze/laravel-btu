<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-end mb-4">
            <a href="{{ route('quiz.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                Add New Quiz
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($quizzes as $quiz)
                @if(Auth::user()->id == 1 || Auth::user()->id == $quiz->author_id)
                    <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover object-center" src="{{ asset('photos/' . $quiz->photo) }}" alt="{{ $quiz->name }}">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $quiz->name }}</h2>
                            <p class="text-gray-700 mb-2">{{ $quiz->description }}</p>
                            <p class="text-gray-600 text-sm mb-2">Status: {{ $quiz->status }}</p>
                            <p class="text-gray-600 text-sm mb-4">Author: {{ $quiz->user->name }}</p>
                            <a href="{{ route('quiz.edit', $quiz->id) }}" class="text-blue-500 hover:text-blue-600 font-semibold">Edit</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
