@extends("layouts.app")
@section("title", __("titles.add_weekend"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("weekend.store") }}" method="post">
		@csrf
		<div class="form-group row">
			<label for="days" class="col-sm-2 col-form-label">{{ __("titles.days") }}</label>
			<div class="col-sm-10">
				<select class="form-control @error("days") is-invalid @enderror" type="text" id="days" name="days[]" multiple>
					<option value="Saturday">{{ __("titles.saturday") }}</option>
					<option value="Sunday">{{ __("titles.sunday") }}</option>
					<option value="Monday">{{ __("titles.monday") }}</option>
					<option value="Tuesday">{{ __("titles.tuesday") }}</option>
					<option value="Wednesday">{{ __("titles.wednesday") }}</option>
					<option value="Thursday">{{ __("titles.thursday") }}</option>
					<option value="Friday">{{ __("titles.friday") }}</option>
				</select>
				@error("days")
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
		$("#days").select2();
	</script>
@endsection