@extends("layouts.app")
@section("title", __("titles.add_supply"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<form action="{{ route("stock.supply.store") }}" method="post">
		@csrf

		<div class="form-group row">
			<label for="supply_id" class="col-sm-2 col-form-label">{{ __("titles.supply") }}</label>
			<div class="col-sm-6">
				<select name="supply_id" id="supply_id" class="form-control">
					@foreach($supplies as $supply)
						<option value="{{ $supply->id }}">{{ $supply->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="amount" class="col-sm-2 col-form-label">{{ __("titles.amount") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("amount") is-invalid @enderror"
					   type="number" id="amount" name="amount"
					   required value="{{ old("amount") }}">
				@error("amount")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="buying_date" class="col-sm-2 col-form-label">{{ __("titles.buying_date") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("buying_date") is-invalid @enderror"
					   type="date" id="buying_date" name="buying_date"
					   required value="{{ old("buying_date", date('Y-m-d')) }}">
				@error("amount")
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>


		<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
	</form>
@endsection
