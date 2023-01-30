@extends("layouts.app")
@section("title", __("titles.add_customer"))

@section("content")
	<form action="{{ route("customer.store") }}" method="post">
		@csrf
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.customer") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("name") is-invalid @enderror"
					   type="text" id="name" name="name"
					   required minlength="2" value="{{ old("name") }}">
				@error("name")
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
	</form>
@endsection