@extends("layouts.app")
@section("title", __("titles.add_device"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("device.update", $device->id) }}" method="post">
		@csrf
		@method('PUT')

		<div class="form-group row">
			<label for="device_name" class="col-sm-2 col-form-label">{{ __("titles.device") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("device_name") is-invalid @enderror"
					   type="text" id="device_name" name="device_name"
					   required minlength="2" value="{{ old("device_name", $device->name) }}">
				@error("device_name")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div id="old_customer">
			<div class="form-group row">
				<label for="customer" class="col-sm-2 col-form-label">{{ __("titles.customer") }}</label>
				<div class="col-sm-6">
					<select name="customer_id" id="customer" class="form-control">
						@foreach($customers as $customer)
							<option value="{{ $customer->id }}"
								@selected(old('customer_id', $device->customer_id) == $customer->id)
							>{{ $customer->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
	</form>
@endsection

@section("script")
	<script src="{{ asset("assets/libs/select2/js/select2.min.js")  }}"></script>
	<script>
		$("#customer").select2();
	</script>
@endsection