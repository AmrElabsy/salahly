@extends("layouts.app")
@section("title", __("titles.add_device"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("device.store") }}" method="post">
		@csrf
		<div class="form-group row">
			<label for="device_name" class="col-sm-2 col-form-label">{{ __("titles.device") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("device_name") is-invalid @enderror"
					   type="text" id="device_name" name="device_name"
					   required minlength="2" value="{{ old("device_name") }}">
				@error("device_name")
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="is_new_customer" class="col-sm-2 col-form-label">{{ __("titles.is_new_customer") }}</label>
			<div class="col-sm-6">
				<div class="form-check form-switch">
					<input type="checkbox" id="is_new_customer" name="is_new_customer" class="form-check-input">
				</div>
			</div>
		</div>

		<div id="new_customer">
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">{{ __("titles.customer") }}</label>
				<div class="col-sm-6">
					<input class="form-control @error("name") is-invalid @enderror"
						   type="text" id="name" name="name"
						   value="{{ old("name") }}">
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
						@foreach(old("phones", []) as $phone)
							<option value="{{ $phone }}" selected>{{ $phone }}</option>
						@endforeach
					</select>
					@error("phones.*")
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>

		</div>

		<div id="old_customer">
			<div class="form-group row">
				<label for="customer" class="col-sm-2 col-form-label">{{ __("titles.customer") }}</label>
				<div class="col-sm-6">
					<select name="customer_id" id="customer" class="form-control">
						@foreach($customers as $customer)
							<option value="{{ $customer->id }}">{{ $customer->name }}</option>
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
		$("#phones").select2({
			tags: true
		});

		$("#new_customer").hide();

		$("#is_new_customer").change(function(  ) {
			let isNewCustomer = $(this).is(":checked");

			if ( isNewCustomer ) {
				$("#old_customer").hide();
				$("#new_customer").show();
			} else {
				$("#new_customer").hide();
				$("#old_customer").show();

			}
		})
	</script>
@endsection