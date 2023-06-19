@extends("layouts.app")
@section("title", __("titles.add_supplyPrice"))

@section("content")
	<form action="{{route('supplyPrice.store')}}" method="post">
		@csrf

		<div class="form-group row">
			<label for="price" class="col-sm-2 col-form-label">{{ __("titles.supply") }}</label>
			<div class="col-sm-6">
				<select name="supply" id="supply" class="form-control">
					@foreach($supplies as $supply)
						<option
								@selected(old('$supply') == $supply->id)
								value="{{ $supply->id }}">{{ $supply->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="price" class="col-sm-2 col-form-label">{{ __("titles.Price") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("price") is-invalid @enderror" type="number" id="price" name="price"
					   required minlength="2" value="{{ old("price") }}">
				@error("price")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="price" class="col-sm-2 col-form-label">{{ __("titles.StartDate") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("start_date") is-invalid @enderror" type="date" id="start_date"
					   name="start_date"
					   required minlength="2" value="{{ old("start_date") }}">
				@error("start_date")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="{{__("titles.submit") }}">
	</form>
@endsection
