@extends("layouts.app")
@section("title", __("titles.edit_supply"))

@section("content")
	<form action="{{ route("supply.update", $supply) }}" method="post">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.supply") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("name") is-invalid @enderror"
					   type="text" id="name" name="name"
					   required minlength="2" value="{{ old("name", $supply->name) }}">
				@error("name")
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="price" class="col-sm-2 col-form-label">{{ __("titles.price") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("price") is-invalid @enderror"
					   type="text" id="price" name="price"
					   required minlength="2" value="{{ old("price", $supply->price) }}">
				@error("price")
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
	</form>
@endsection
