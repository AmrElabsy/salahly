@extends("layouts.app")
@section("title", __("titles.add_supply"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("stock.supplyreturn.update", $supplyreturn->id) }}" method="post">
		@csrf
		@method("PUT")

		<div class="form-group row">
			<label for="supply_id" class="col-sm-2 col-form-label">{{ __("titles.supply") }}</label>
			<div class="col-sm-6">
				<select name="supply_id" id="supply_id" class="form-control">
					@foreach($supplies as $s)
						<option
								value="{{ $s->id }}"
								@selected($s->id == $supplyreturn->supply_id)
						>{{ $s->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="amount" class="col-sm-2 col-form-label">{{ __("titles.amount") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("amount") is-invalid @enderror"
					   type="number" id="amount" name="amount"
					   required value="{{ old("amount", $supplyreturn->amount) }}">
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
					   required value="{{ old("price", $supplyreturn->price) }}">
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
					   required value="{{ old("return_date", $supplyreturn->return_date) }}">
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
