@extends("layouts.app")
@section("title", __("titles.add_holiday"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection


@section("content")
	<form action="{{ route("holiday.update", $holiday->id) }}" method="post">
		@csrf
		@method("PUT")
		<div class="form-group row">
			<label for="start" class="col-sm-2 col-form-label">{{ __("titles.start") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("start") is-invalid @enderror" type="date" id="start" name="start" required
					   value="{{ old("start", $holiday->start) }}">
				@error("start")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="end" class="col-sm-2 col-form-label">{{ __("titles.end") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("end") is-invalid @enderror" type="date" id="end" name="end" required
					   value="{{ old("end", $holiday->end) }}">
				@error("end")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="employees" class="col-sm-2 col-form-label">{{ __("titles.employees") }}</label>
			<div class="col-sm-8">
				<select name="employees[]" id="employees" class="form-control @error("employees") is-invalid @enderror" multiple>
					@foreach($employees as $employee)
						<option
								@selected($holiday->users->contains($employee->id))
								value="{{ $employee->id }}">{{ $employee->name }}</option>
					@endforeach
				</select>
				@error("employees")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
			<div class="col-sm-2">
				<label for="toggle" class="btn btn-outline-success d-block" id="label">Select All</label>
				<input type="checkbox" class="d-none" id="toggle">
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="{{__("titles.submit") }}">
	</form>
@endsection


@section("script")
	<script src="{{ asset("assets/libs/select2/js/select2.min.js") }}"></script>
	<script>
		$("#employees").select2();

		$("#toggle").click(function(){
			$("#employees > option").prop("selected","selected");// Select All Options
			$("#employees").trigger("change");// Trigger change to select 2
			$("#label").removeClass("btn-outline-success").addClass("btn-success")
		});
	</script>

@endsection