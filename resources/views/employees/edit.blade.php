@extends("layouts.app")
@section("title", __("titles.add_employee"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("employee.update", $employee) }}" method="post">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.employee") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("name") is-invalid @enderror"
					   type="text" id="name" name="name"
					   required minlength="2" value="{{ old("name", $employee->name) }}">
				@error("name")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="branches" class="col-sm-2 col-form-label">{{ __("titles.branches") }}</label>
			<div class="col-sm-6">
				<select name="branches[]" id="branches" class="form-control" multiple>
					@foreach($branches as $branch)
						<option
								@selected($employee->branches->contains($branch->id))
								value="{{ $branch->id }}">{{ $branch->name }}</option>
					@endforeach
				</select>
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

@section("script")
	<script src="{{ asset("assets/libs/select2/js/select2.min.js")  }}"></script>
	<script>
		$("#branches").select2();
	</script>
@endsection