@extends("layouts.app")
@section("title", __("titles.add_user"))


@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("user.store") }}" method="post">
		@csrf
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.name") }}</label>
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

		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label">{{ __("titles.email") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("email") is-invalid @enderror"
					   type="email" id="email" name="email"
					   required minlength="2" value="{{ old("email") }}">
				@error("email")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label">{{ __("titles.password") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("password") is-invalid @enderror"
					   type="password" id="password" name="password"
					   required minlength="8" value="{{ old("password") }}">
				@error("password")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		{{--		@can("assign roles")--}}
		<div class="form-group row">
			<label for="roles" class="col-sm-2 col-form-label">{{ __("titles.role") }}</label>
			<div class="col-sm-6">
				<select name="roles[]" id="roles" class="form-control @error("roles") is-invalid @enderror" multiple>
					@foreach($roles as $role)
						<option value="{{ $role->name }}">{{ $role->name }}</option>
					@endforeach
				</select>
				@error("roles")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>
		{{--		@endcan--}}

		<div class="form-group row">
			<label for="roles" class="col-sm-2 col-form-label">{{ __("titles.branch") }}</label>
			<div class="col-sm-6">
				<select name="branches[]" id="branches" class="form-control @error("branches") is-invalid @enderror" multiple>
					@foreach($branches as $branch)
						<option value="{{ $branch->id }}">{{ $branch->name }}</option>
					@endforeach
				</select>
				@error("roles")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="salary" class="col-sm-2 col-form-label">{{ __("titles.salary") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("salary") is-invalid @enderror"
					   type="number" id="salary" name="salary"
					   value="{{ old("salary") }}">
				@error("salary")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="percentage" class="col-sm-2 col-form-label">{{ __("titles.percentage") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("percentage") is-invalid @enderror"
					   type="number" id="percentage" name="percentage"
					   value="{{ old("percentage") }}">
				@error("percentage")
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
	<script src="{{ asset("assets/libs/select2/js/select2.min.js") }}"></script>
	<script>
		$("#roles").select2();
		$("#branches").select2();
	</script>
@endsection
