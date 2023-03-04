@extends("layouts.app")
@section("title", __("titles.problems"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}">
	<link rel="stylesheet" href="{{ asset("assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css") }}">

	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.problems") }}</h2>
			<div>
				<a href="{{ route("problem.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
			</div>
		</div>

		<div class="">
			<form>
				<div class="form-group row">
					<label for="branch" class="col-sm-2 col-form-label">{{ __("titles.branch") }}</label>
					<div class="col-sm-3">
						<select name="branch" id="branch" class="form-control">
							<option value="">0</option>
							@foreach($branches as $branch)
								<option
										@selected(old('branch') == $branch->id)
										value="{{ $branch->id }}">{{ $branch->name }}</option>
							@endforeach
						</select>
					</div>


					<label for="status_id" class="col-sm-2 col-form-label">{{ __("titles.status") }}</label>
					<div class="col-sm-3">
						<select name="status" id="status_id" class="form-control">
							<option value="">0</option>
							@foreach($statuses as $status)
								<option
										@selected(old('status') == $status->id)
										value="{{ $status->id }}">{{ $status->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-sm-2">
						<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
					</div>

				</div>
			</form>
		</div>

		@if(session('status'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('status') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		<div class="table-responsive">
			<table class="table table-striped" id="table">
				<thead>
				<tr>
					<th>#</th>
					<th>{{ __("titles.description") }}</th>
					<th>{{ __("titles.branch") }}</th>
					<th>{{ __("titles.device") }}</th>
					<th>{{ __("titles.cost") }}</th>
					<th>{{ __("titles.price") }}</th>
					<th>{{ __("titles.paid") }}</th>
					<th>{{ __("titles.status") }}</th>
					<th>{{ __("titles.due_time") }}</th>
					<th>{{ __("titles.customer") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($problems as $i => $problem)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $problem->description }}</td>
						<td>{{ $problem->branch->name }}</td>
						<td>{{ $problem->device->name }}</td>
						<td>{{ $problem->cost }}</td>
						<td>{{ $problem->price }}</td>
						<td>{{ $problem->paid }}</td>
						<td>{{ $problem->status?->name }}</td>
						<td>{{ $problem->due_time }}</td>
						<td>{{ $problem->device?->customer?->name }}</td>
						<td class="d-flex ">
							<div>
								<a href="{{ route("problem.edit", $problem->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							</div>
							@include("layouts.delete", ["action" => route("problem.destroy", $problem->id)])
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section("script")
	<script src="{{ asset("assets/libs/datatables.net/js/jquery.dataTables.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js") }}"></script>

	<script src="{{ asset("assets/libs/jszip/jszip.min.js") }}"></script>
	<script src="{{ asset("assets/libs/pdfmake/build/pdfmake.min.js") }}"></script>
	<script src="{{ asset("assets/libs/pdfmake/build/vfs_fonts.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons/js/buttons.colVis.min.js") }}"></script>

	<script src="{{ asset("assets/libs/select2/js/select2.min.js")  }}"></script>

	<script>
		$("#table").DataTable({lengthChange:!1,buttons:["copy","excel","colvis"]}).buttons().container().appendTo("#table_wrapper .col-md-6:eq(0)");
		$("#status_id").select2();
	</script>

@endsection