@extends("layouts.app")
@section("title", __("titles.add_feedback"))

@section('content')
    <div class="container">
        <h1>Create Feedback</h1>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available') ? 'checked' : '' }}>
                <label for="is_available">Is Available?</label>
                @error('is_available')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="known_from">Known From</label>
                <input class="form-control @error(" known_from") is-invalid @enderror" type="text" id="known_from" name="known_from" required
                       minlength="2" value="{{ old("known_from") }}">
                @error('known_from')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="where_from">Where From</label>
                <input class="form-control @error(" where_from") is-invalid @enderror" type="text" id="where_from" name="where_from" required
                       minlength="2" value="{{ old("where_from") }}">
                @error('where_from')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="problem_id">Problem</label>

                <select name="problem" id="problem_id" class="form-control">
                    @foreach($problems as $problem)
                        <option
                            @selected(old('problem') == $problem->id)
                            value="{{ $problem->id }}">
                            {{ $problem->description }}
                        </option>
                            value="{{ $problem->id }}">{{ $problem->description }}</option>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
