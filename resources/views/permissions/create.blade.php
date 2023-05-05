@extends("layouts.app")
@section("title", __("titles.add_permission"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("permission.store") }}" method="post">
		@csrf
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.name") }}</label>
			<div class="col-sm-10">
				<select class="form-control @error("name") is-invalid @enderror" type="text" id="name" name="names[]" multiple>
				</select>
				@error("name")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="{{__("titles.submit") }}">
	</form>
@endsection

@section("script")
	<script src="{{ asset("assets/libs/select2/js/select2.min.js") }}"></script>
	<script>
		$("#name").select2({
			tags: true
		});
	</script>
@endsection