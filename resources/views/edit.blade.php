<x-app-layout>

    <form action="{{ isset($quiz) ? route('quiz.edit', $quiz->id) : route('quiz.edit') }}" method="POST"
          enctype="multipart/form-data" class="p-4 border rounded">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $quiz->name ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $quiz->description ?? '' }}</textarea>
        </div>

        @if($quiz->photo)
            <div class="mb-3">
                <img src="{{ asset('photos/' . $quiz->photo) }}" alt="" class="img-fluid mb-3">
            </div>
        @endif

        <div class="mb-3">
            <label for="photo" class="form-label">Quiz Photo:</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        @if(Auth::user()->id == 1)
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status">
                    <option value="pending" {{ ($quiz->status ?? '') == 'pending' ? 'selected' : '' }}>pending</option>
                    <option value="approved" {{ ($quiz->status ?? '') == 'approved' ? 'selected' : '' }}>approved</option>
                    <option value="rejected" {{ ($quiz->status ?? '') == 'rejected' ? 'selected' : '' }}>rejected</option>
                </select>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</x-app-layout>
