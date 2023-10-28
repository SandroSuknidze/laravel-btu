<form action="{{ isset($quiz) ? route('quiz.edit', $quiz->id) : route('quiz.edit') }}" method="POST">
    @csrf
    <input type="text" name="name" value="{{ $quiz->name ?? '' }}">
    <textarea name="description">{{ $quiz->description ?? '' }}</textarea>
    <button type="submit">Save</button>
</form>
