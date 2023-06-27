@extends("layouts.app")
@section("title", __("titles.money"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.money") }}</h2>
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
			<table class="table table-striped mb-0">
				<thead>
				<tr>
					<th rowspan="2">#</th>
					<th rowspan="2">Months</th>
					<th colspan="2">{{ __("titles.paying") }}</th>
					<th colspan="3">{{ __("titles.income") }}</th>
					<th rowspan="2">{{ __("titles.total") }}</th>
				</tr>
				<tr>
					<th>{{ __("titles.materials") }}</th>
					<th>{{ __("titles.supplies") }}</th>
					<th>{{ __("titles.problems") }}</th>
					<th>{{ __("titles.material_returns") }}</th>
					<th>{{ __("titles.supply_returns") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($months as $i => $month)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $month["name"] }}</td>
						<td>{{ $month["paying"]["materials"] }}</td>
						<td>{{ $month["paying"]["supplies"] }}</td>
						<td>{{ $month["income"]["problems"] }}</td>
						<td>{{ $month["income"]["material_returns"] }}</td>
						<td>{{ $month["income"]["supply_returns"] }}</td>
						<td>{{ $month["total"] }}</td>

					</tr>
				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection