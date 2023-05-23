@extends("layouts.app")
@section("title", __("titles.add_user"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("user.update", $user) }}" method="post">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.user") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("name") is-invalid @enderror"
					   type="text" id="name" name="name"
					   required minlength="2" value="{{ old("name", $user->name) }}">
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
					   required minlength="2" value="{{ old("email", $user->email) }}">
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
					   minlength="8">
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
						<option value="{{ $role->name }}" {{ in_array($role->name, $user->getRoleNames()->toArray()) ? "selected" : "" }}>{{ $role->name }}</option>
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
			<label for="branches" class="col-sm-2 col-form-label">{{ __("titles.branches") }}</label>
			<div class="col-sm-6">
				<select name="branches[]" id="branches" class="form-control" multiple>
					@foreach($branches as $branch)
						<option
								@selected($user->branches->contains($branch->id))
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
		$("#roles").select2();
	</script>
@endsection