@extends("layouts.app")
@section("title", __("titles.month"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}">
	<link rel="stylesheet" href="{{ asset("assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css") }}">

	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.materials") }}</h2>
		</div>

		<div class="table-responsive">
			<table class="table table-striped mb-0">
				<thead>
				<tr>
					<th>#</th>
					<th>{{ __("titles.material") }}</th>
					<th>{{ __("titles.buying_date") }}</th>
					<th>{{ __("titles.amount") }}</th>
					<th>{{ __("titles.price") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($storedMaterials as $i => $material)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $material->material->name }}</td>
						<td>{{ $material->buying_date }}</td>
						<td>{{ $material->amount }}</td>
						<td>{{ $material->price }}</td>
						<td>
							@can("edit stored_material")
								<a href="{{ route("stock.material.edit", $material->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan
							@can("delete stored_material")
								@include("layouts.delete", ["action" => route("stock.material.destroy", $material->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>

		<div class="d-flex justify-content-between mt-5">
			<h2>{{ __("titles.loans") }}</h2>
		</div>

		<div class="table-responsive">
			<table class="table">
				<thead>
				<tr>
					<th>#</th>
					<th>{{__('titles.employee')}}</th>
					<th>{{__('titles.quantity')}}</th>
					<th>{{__('titles.month')}}</th>
					<th>{{__('titles.manage')}}</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($loans as $loan)
					<tr>
						<td>{{ $loan->id }}</td>
						<td>{{ $loan->user->name }}</td>
						<td>{{ $loan->quantity }}</td>
						<td>{{ $loan->month }}</td>
						<td>
							<a href="{{ route('loan.edit', $loan) }}" class="btn btn-secondary">Edit</a>
							<form action="{{ route('loan.destroy', $loan) }}" method="POST"
								  style="display: inline-block">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger"
										onclick="return confirm('Are you sure you want to delete this loan?')">Delete
								</button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>		</div>

		<div class="d-flex justify-content-between mt-5">
			<h2>{{ __("titles.problems") }}</h2>
		</div>

		<div class="table-responsive">
			<table class="table table-striped" id="table">
				<thead>
				<tr>
					<th>#</th>
					<th>{{ __("titles.description") }}</th>
					<th>{{ __("titles.branch") }}</th>
					<th>{{ __("titles.price") }}</th>
					<th>{{ __("titles.paid") }}</th>
					<th>{{ __("titles.status") }}</th>
					<th>{{ __("titles.due_time") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($problems as $i => $problem)
					<tr
							@if($problem->due_time_is_today)
							class="table-warning"
							@elseif($problem->due_time_has_passed)
							class="table-danger"
							@endif
					>
						<th scope="row">{{ $i + 1 }}</th>
						<td>
							<a href="{{ route("problem.show", $problem->id) }}">{{ $problem->description }}</a>
						</td>
						<td>{{ $problem->branch->name }}</td>
						<td>{{ $problem->price }}</td>
						<td>{{ $problem->paid }}</td>
						<td>{{ $problem->status?->name }}</td>
						<td>{{ $problem->due_time }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>

		<div class="d-flex justify-content-between mt-5">
			<h2>{{ __("titles.material_returns") }}</h2>
		</div>

		<div class="table-responsive">
			<table class="table table-striped mb-0">
				<thead>
				<tr>
					<th>#</th>
					<th>{{ __("titles.material") }}</th>
					<th>{{ __("titles.amount") }}</th>
					<th>{{ __("titles.price") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($materialReturns as $i => $material)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $material->material->name }}</td>
						<td>{{ $material->amount }}</td>
						<td>{{ $material->price }}</td>
						<td>
							@can("edit material_return")
								<a href="{{ route("stock.materialreturn.edit", $material->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan
							@can("delete material_return")
								@include("layouts.delete", ["action" => route("stock.materialreturn.destroy", $material->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>

		<div class="d-flex justify-content-between mt-5">
			<h2>{{ __("titles.supply_returns") }}</h2>
		</div>

		<div class="table-responsive">
			<table class="table table-striped mb-0">
				<thead>
				<tr>
					<th>#</th>
					<th>{{ __("titles.supply") }}</th>
					<th>{{ __("titles.amount") }}</th>
					<th>{{ __("titles.price") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($supplyReturns as $i => $supply)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $supply->supply->name }}</td>
						<td>{{ $supply->amount }}</td>
						<td>{{ $supply->price }}</td>
						<td>
							@can("edit supply_return")
								<a href="{{ route("stock.supplyreturn.edit", $supply->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan
							@can("delete supply_return")
								@include("layouts.delete", ["action" => route("stock.supplyreturn.destroy", $supply->id)])
							@endcan
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
		$(document).ready(function() {
			let table = $("#table").DataTable({
				lengthChange: false,
				buttons: ["copy", "excel", "colvis"]
			});

			// Use the buttons() method to get access to the column() method
			table.buttons().container().appendTo("#table_wrapper .col-md-6:eq(0)");
			// table.column(3).visible(false);
			// table.column(4).visible(false);
			// table.column(9).visible(false);
			// table.column(10).visible(false);
			// table.column(12).visible(false);
		});
	</script>

@endsection
