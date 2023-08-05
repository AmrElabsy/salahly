@extends("layouts.app")
@section("title", __("titles.edit_feedback"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section('content')
	<div class="container">
		<h1>{{ __('titles.edit_feedback') }}</h1>
		<form action="{{ route('feedback.update') }}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="content">{{ __('titles.feedback') }}</label>
				<textarea name="content" id="content" class="form-control">{{ old('content', $feedback->content) }}</textarea>
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
				<label for="known_from">{{ __('titles.known_from') }}</label>
				<input class="form-control @error(" known_from") is-invalid @enderror" type="text" id="known_from" name="known_from" required
					   minlength="2" value="{{ old("known_from", $feedback->known_from) }}">
				@error('known_from')
				<div class="text-danger">{{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="where_from">{{ __('titles.where_from') }}</label>
				<input class="form-control @error(" where_from") is-invalid @enderror" type="text" id="where_from" name="where_from" required
					   minlength="2" value="{{ old("where_from", $feedback->where_from) }}">
				@error('where_from')
				<div class="text-danger">{{ $message }}</div>
				@enderror
			</div>


			<div class="form-group">
				<label for="problem_id">{{ __('titles.problem') }}</label>

				<select name="problem" id="problem_id" class="form-control">
					@foreach($problems as $problem)
						<option
								@selected(old('problem', $feedback->problem_id) == $problem->id)
								value="{{ $problem->id }}">
							{{ $problem->description }} ({{ $problem->device->name }}) ({{ $problem->device->customer->name }})
						</option>
					@endforeach
				</select>

			</div>
			<button type="submit" class="btn btn-primary">{{ __('titles.submit') }}</button>
		</form>
	</div>
@endsection

@section("script")
	<script src="{{ asset("assets/libs/select2/js/select2.min.js")  }}"></script>
	<script>
		$("#problem_id").select2();
	</script>
@endsection
