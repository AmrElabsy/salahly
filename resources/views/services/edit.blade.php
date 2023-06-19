@extends("layouts.app")
@section("title", __("titles.edit_service"))

@section("content")
	<form action="{{ route("service.update", $service) }}" method="post">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.service") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("name") is-invalid @enderror"
					   type="text" id="name" name="name"
					   required minlength="2" value="{{ old("name", $service->name) }}">
				@error("name")
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
		</div>

		@foreach($service->prices as $index => $price)
			<div class="form-group row">
				<label for="price{{ $index }}" class="col-sm-1 col-form-label">{{ __("titles.price") }}</label>
				<div class="col-sm-4">
					<input class="form-control @error("price." . $index) is-invalid @enderror" type="number" id="price{{ $index }}" name="prices[]"
						   required minlength="2" value="{{ old("price." . $index, $price->price) }}">
					@error("price.{{ $index }}")
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>

				<label for="start_date{{ $index }}" class="col-sm-2 col-form-label">{{ __("titles.start_date") }}</label>
				<div class="col-sm-6 col-md-4">
					<input type="date" name="start_dates[]" id="start_date{{ $index }}" class="form-control" value="{{ old("start_dates." . $index, $price->start_date) }}">
					@error("start_dates." . $index )
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
				<div class="col-sm-1 col-md-1">
					<a href="#" class="remove_field btn btn-danger"><i class="fa fa-times-circle"></i></a>
					<div class="clearfix"></div>
				</div>
			</div>
		@endforeach

		<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
	</form>
@endsection

@section("script")
	<script>
		$(document).ready(function () {
			let index = {{ count($service->prices) }};

			$(".add-slot").click(function() {
				let html = `
					<div class="form-group row">
						<label for="price${index}" class="col-sm-1 col-form-label">{{ __("titles.price") }}</label>
						<div class="col-sm-4">
							<input class="form-control " type="number" id="price${index}" name="prices[]"
								   required minlength="2">
						</div>

						<label for="start_date${index}" class="col-sm-2 col-form-label">{{ __("titles.start_date") }}</label>
						<div class="col-sm-6 col-md-4">
							<input type="date" name="start_dates[]" id="start_date${index}" class="form-control">

						</div>
						<div class="col-sm-1 col-md-1">
							<a href="#" class="remove_field btn btn-danger"><i class="fa fa-times-circle"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				`;

				$("#new-slots-container").append(html);
				index++;
			});

			$(document).on("click", ".remove_field", function() {
				$(this).parent().parent().remove();
			});
		});
	</script>
@endsection