@extends("layouts.app")
@section("title", __("titles.add_material"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("stock.materialreturn.update", $materialreturn->id) }}" method="post">
		@csrf
		@method("PUT")

		<div class="form-group row">
			<label for="material_id" class="col-sm-2 col-form-label">{{ __("titles.material") }}</label>
			<div class="col-sm-6">
				<select name="material_id" id="material_id" class="form-control">
					@foreach($materials as $m)
						<option
								value="{{ $m->id }}"
								@selected($m->id == $materialreturn->material_id)
						>{{ $m->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="amount" class="col-sm-2 col-form-label">{{ __("titles.amount") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("amount") is-invalid @enderror"
					   type="number" id="amount" name="amount"
					   required value="{{ old("amount", $materialreturn->amount) }}">
				@error("amount")
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
					   required value="{{ old("price", $materialreturn->price) }}">
				@error("price")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="return_date" class="col-sm-2 col-form-label">{{ __("titles.return_date") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("return_date") is-invalid @enderror"
					   type="date" id="return_date" name="return_date"
					   required value="{{ old("return_date", $materialreturn->return_date) }}">
				@error("return_date")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>


		<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
	</form>
@endsection
