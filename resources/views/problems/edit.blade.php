@extends("layouts.app")
@section("title", __("titles.add_problem"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("problem.update", $problem) }}" method="post">
		@csrf
		@method('PUT')

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">{{ __("titles.description") }}</label>
                <div class="col-sm-6">
                    <input class="form-control @error("description") is-invalid @enderror"
                           type="text" id="description" name="description"
                           required minlength="2" value="{{ old("description", $problem->description) }}">
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
					   value="{{ old("price", $problem->price) }}">
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
					   value="{{ old("paid", $problem->paid) }}">
				@error("paid")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="due_time" class="col-sm-2 col-form-label">{{ __("titles.due_time") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("due_time") is-invalid @enderror"
					   type="datetime-local" id="due_time" name="due_time"
					   value="{{ old("due_time", $problem->due_time) }}">
				@error("due_time")
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
								@selected(old('branch', $problem->branch->id) == $branch->id)
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
								@selected(old('employee', $problem->user?->id) == $employee->id)
								value="{{ $employee->id }}">{{ $employee->name }}</option>
					@endforeach
				</select>
			</div>
		</div>


		<div class="form-group row">
			<label for="status_id" class="col-sm-2 col-form-label">{{ __("titles.status") }}</label>
			<div class="col-sm-6">
				<select name="status" id="status_id" class="form-control">
					@foreach($statuses as $status)
						<option
								@selected(old('status', $problem->status?->id) == $status->id)
								value="{{ $status->id }}">{{ $status?->name }}</option>
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
								@selected($problem->materials->contains($material->id))
								value="{{ $material->id }}">{{ $material->name }} ({{ $material->price?->price }})</option>
					@endforeach
				</select>
			</div>
		</div>


		<div class="form-group row">
			<label for="device" class="col-sm-2 col-form-label">{{ __("titles.device") }}</label>
			<div class="col-sm-6">
				<select name="device_id" id="device" class="form-control disabled">
					@foreach($devices as $device)
						<option
								@selected(old('device_id', $problem->device->id) == $device->id)
								value="{{ $device->id }}">{{ $device->name }} ({{ $device->customer?->name }})</option>
					@endforeach
				</select>
			</div>
		</div>

        <div class="form-group row">
            <label for="comment" class="col-sm-2 col-form-label">{{ __("titles.comment") }}</label>
            <div class="col-sm-6">
                <input class="form-control @error("comment") is-invalid @enderror"
                       type="text" id="comment" name="comment"
                       minlength="2" value="{{ old("comment", $problem->comment) }}">
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
		$("#device").select2();
		$("#status_id").select2();
		$("#materials").select2();
		$("#employee").select2();

	</script>
@endsection
