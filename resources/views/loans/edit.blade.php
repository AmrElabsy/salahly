@extends("layouts.app")
@section("title", __("titles.edit_loan"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section('content')
	<div class="container">

		<form action="{{ route('loan.update', $loan->id) }}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="user_id">{{ __('titles.employee') }}</label>
				<select name="user_id" id="user_id" class="form-control">
					@foreach($employees as $employee)
						<option @selected(old('user_id', $loan->user_id) == $employee->id) value="{{ $employee->id }}">{{ $employee->name }}</option>
					@endforeach
				</select>

			</div>
			<div class="form-group">
				<label for="quantity">{{ __('titles.quantity') }}</label>
				<input class="form-control @error(" quantity") is-invalid @enderror" type="number" id="quantity" name="quantity" required value="{{ old("quantity", $loan->quantity) }}">
				@error('quantity')
				<div class="text-danger">{{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="month">{{ __('titles.month') }}</label>
				<input class="form-control @error(" month") is-invalid @enderror" type="date" id="month" name="month" required
					   value="{{ old("month",  $loan->month) }}">
				@error('month')
				<div class="text-danger">{{ $message }}</div>
				@enderror
			</div>

			<button type="submit" class="btn btn-primary">{{ __('titles.submit') }}</button>
		</form>
	</div>
@endsection


@section("script")
	<script src="{{ asset("assets/libs/select2/js/select2.min.js")  }}"></script>
	<script>
		$("#user_id").select2();
	</script>
@endsection
