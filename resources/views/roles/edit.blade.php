@extends("layouts.app")
@section("title", __("titles.edit_role"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("role.update", $role->id) }}" method="post">
		@csrf
		@method("PUT")
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.name") }}</label>
			<div class="col-sm-10">
				<input class="form-control @error("name") is-invalid @enderror" type="text" id="name" name="name" required
					   minlength="2" value="{{ old("name", $role->name) }}">
				@error("name")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="permissions" class="col-sm-2 col-form-label">{{ __("titles.permissions") }}</label>
			<div class="col-sm-8">
				<select name="permissions[]" id="permissions" class="form-control @error("permissions") is-invalid @enderror" multiple>
					@foreach($permissions as $permission)
						<option
								@selected($role->hasPermissionTo($permission->name))
								value="{{ $permission->id }}">{{ $permission->name }}</option>
					@endforeach

				</select>
				@error("permissions")
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
		$("#permissions").select2();
		$("#toggle").click(function(){
			$("#permissions > option").prop("selected","selected");// Select All Options
			$("#permissions").trigger("change");// Trigger change to select 2
			$("#label").removeClass("btn-outline-success").addClass("btn-success")
		});
	</script>

@endsection