@extends("layouts.app")
@section("title", __("titles.add_problem"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("problem.store") }}" method="post">
		@csrf

		<div class="form-group row">
			<label for="description" class="col-sm-2 col-form-label">{{ __("titles.description") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("description") is-invalid @enderror"
					   type="text" id="description" name="description"
					   required minlength="2" value="{{ old("description") }}">
				@error("description")
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
					   type="number" id="price" name="price"
					   value="{{ old("price", 0) }}">
				@error("price")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="paid" class="col-sm-2 col-form-label">{{ __("titles.paid") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("paid") is-invalid @enderror"
					   type="number" id="paid" name="paid"
					   value="{{ old("paid", 0) }}">
				@error("paid")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="branch" class="col-sm-2 col-form-label">{{ __("titles.branch") }}</label>
			<div class="col-sm-6">
				<select name="branch" id="branch" class="form-control">
					@foreach($branches as $branch)
						<option
								@selected(old('branch') == $branch->id)
								value="{{ $branch->id }}">{{ $branch->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="employee" class="col-sm-2 col-form-label">{{ __("titles.employee") }}</label>
			<div class="col-sm-6">
				<select name="user" id="employee" class="form-control">
					<option value=""></option>
				@foreach($employees as $employee)
						<option
								@selected(old('employee') == $employee->id)
								value="{{ $employee->id }}">{{ $employee->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="due_time" class="col-sm-2 col-form-label">{{ __("titles.due_time") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("due_time") is-invalid @enderror"
					   type="datetime-local" id="due_time" name="due_time"
					   value="{{ old("due_time", now()) }}">
				@error("paid")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="status_id" class="col-sm-2 col-form-label">{{ __("titles.status") }}</label>
			<div class="col-sm-6">
				<select name="status" id="status_id" class="form-control">
					@foreach($statuses as $status)
						<option value="{{ $status->id }}">{{ $status->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="categories" class="col-sm-2 col-form-label">{{ __("titles.categories") }}</label>
			<div class="col-sm-6">
				<select name="categories[]" id="categories" class="form-control" multiple>
					@foreach($categories as $category)
						<option
								@selected(in_array($category->id, old('$categories', [])))
								value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="materials" class="col-sm-2 col-form-label">{{ __("titles.materials") }}</label>
			<div class="col-sm-6">
				<select name="materials[]" id="materials" class="form-control" multiple>
					@foreach($materials as $material)
						<option
								@selected(in_array($material->id, old('materials', [])))
								value="{{ $material->id }}">{{ $material->name }} ({{ $material->price?->price }})</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="is_new_device" class="col-sm-2 col-form-label">{{ __("titles.is_new_device") }}</label>
			<div class="col-sm-6">
				<div class="form-check form-switch">
					<input type="checkbox" id="is_new_device" name="is_new_device" class="form-check-input">
				</div>
			</div>
		</div>

		<div id="new_device">
			<div class="form-group row">
				<label for="device_name" class="col-sm-2 col-form-label">{{ __("titles.device") }}</label>
				<div class="col-sm-6">
					<input class="form-control @error("device_name") is-invalid @enderror"
						   type="text" id="device_name" name="device_name"
						   value="{{ old("device_name") }}">
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
		</div>

		<div id="old_device">
			<div class="form-group row">
				<label for="device" class="col-sm-2 col-form-label">{{ __("titles.device") }}</label>
				<div class="col-sm-6">
					<select name="device_id" id="device" class="form-control">
						@foreach($devices as $device)
							<option value="{{ $device->id }}">{{ $device->name }} ({{ $device->customer?->name }})</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

        <div class="form-group row">
            <label for="comment" class="col-sm-2 col-form-label">{{ __("titles.comment") }}</label>
            <div class="col-sm-6">
                <input class="form-control @error("comment") is-invalid @enderror"
                       type="text" id="comment" name="comment"
                       minlength="2" value="{{ old("comment") }}">
                @error("comment")
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
		$("#customer").select2();
		$("#device").select2();
		$("#status_id").select2();
		$("#branch").select2();
		$("#employee").select2();
		$("#materials").select2();
		$("#categories").select2();
		$("#phones").select2({
			tags: true
		});

		$("#new_customer").hide();
		$("#new_device").hide();

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

		$("#is_new_device").change(function(  ) {
			let isNewDevice = $(this).is(":checked");

			if ( isNewDevice ) {
				$("#old_device").hide();
				$("#new_device").show();
			} else {
				$("#new_device").hide();
				$("#old_device").show();
			}
		})
	</script>
@endsection
