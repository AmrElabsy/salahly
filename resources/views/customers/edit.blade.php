@extends("layouts.app")
@section("title", __("titles.edit_customer"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("customer.update", $customer) }}" method="post">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.customer") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("name") is-invalid @enderror"
					   type="text" id="name" name="name"
					   required minlength="2" value="{{ old("name", $customer->name) }}">
				@error("name")
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="phones" class="col-sm-2 col-form-label">{{ __("titles.phone") }}</label>
			<div class="col-sm-6">
				<select name="phones[]" id="phones" multiple class="form-control @error("phones.*") is-invalid @enderror">
					@foreach(old("phones", $customer->phones) as $phone)
						<option value="{{ $phone->phone ?? $phone }}" selected>{{ $phone->phone ?? $phone }}</option>
					@endforeach
				</select>
				@error("phones.*")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
	</form>
@endsection

@section("script")
	<script src="{{ asset("assets/libs/select2/js/select2.min.js")  }}"></script>
	<script>
		$("#phones").select2({
			tags: true
		});
	</script>
@endsection