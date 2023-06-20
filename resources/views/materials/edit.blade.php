@extends("layouts.app")
@section("title", __("titles.edit_material"))

@section("content")
	<form action="{{ route("material.update", $material) }}" method="post">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">{{ __("titles.material") }}</label>
			<div class="col-sm-6">
				<input class="form-control @error("name") is-invalid @enderror"
					   type="text" id="name" name="name"
					   required minlength="2" value="{{ old("name", $material->name) }}">
				@error("name")
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
		</div>

		@foreach($material->prices as $index => $price)
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

	<!-- Wrapper for all the form fields -->
		<div id="input_fields_wrap"></div>

		<!-- Add button -->
		<a href="#" class="add_field_button btn btn-success"><i class="fa fa-plus"></i> Add More Fields</a>


		<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
	</form>
@endsection

@section("script")
	<script>
		$(document).ready(function () {
			let index = {{ count($material->prices) }};

			$(".add_field_button").click(function() {
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

				$("#input_fields_wrap").append(html);
				index++;
			});

			$(document).on("click", ".remove_field", function() {
				$(this).parent().parent().remove();
			});
		});
	</script>
@endsection