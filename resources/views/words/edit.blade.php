@extends("layouts.app")
@section("title", __("titles.add_word"))

@section("content")
	<form action="{{ route("word.update", $word->id) }}" method="post">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="word" class="col-sm-2 col-form-label">{{ __("titles.word") }}</label>
			<div class="col-sm-10">
				<input class="form-control @error("word") is-invalid @enderror" type="text" id="word" name="word"
					   minlength="2" value="{{ $word->word }}" disabled>
				@error("word")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group row">
					<label for="english" class="col-sm-4 col-form-label">{{ __("titles.english") }}</label>
					<div class="col-sm-8">
						<input class="form-control @error("word") is-invalid @enderror" type="text" id="english" name="en" required
							   minlength="2" value="{{ old("en", $word->en) }}">
						@error("en")
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
				</div>

			</div>
			<div class="col-sm-6">
				<div class="form-group row">
					<label for="arabic" class="col-sm-4 col-form-label">{{ __("titles.arabic") }}</label>
					<div class="col-sm-8">
						<input class="form-control @error("ar") is-invalid @enderror" type="text" id="arabic" name="ar" required
							   minlength="2" value="{{ old("ar", $word->ar) }}">
						@error("ar")
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
				</div>

			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="{{__("titles.submit") }}">
	</form>
@endsection
