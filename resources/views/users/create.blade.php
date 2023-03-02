@extends("layouts.app")
@section("title", __("titles.add_user"))

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

		<div class="form-group row">
			<label for="type" class="col-sm-2 col-form-label">{{ __("titles.type") }}</label>
			<div class="col-sm-6">
				<select name="type" id="type" class="form-control">
					<option value="employee">Employee</option>
					<option value="admin">Admin</option>
				</select>
				@error("password")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
	</form>
@endsection
