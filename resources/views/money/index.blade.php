@extends("layouts.app")
@section("title", __("titles.money"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.money") }}</h2>
            <div>
                <a href="{{ route('money.todayBuys') }}" class="btn btn-success">{{ __('titles.todayBuys') }}</a>
            </div>
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
					<th rowspan="2">{{__('titles.months')}}</th>
					<th colspan="3" class="table-danger">{{ __("titles.paying") }}</th>
					<th colspan="3" class="table-success">{{ __("titles.income") }}</th>
					<th rowspan="2">{{ __("titles.total") }}</th>
				</tr>
				<tr>
					<th>{{ __("titles.materials") }}</th>
					<th>{{ __("titles.supplies") }}</th>
					<th>{{ __("titles.salaries") }}</th>
					<th>{{ __("titles.problems") }}</th>
					<th>{{ __("titles.material_returns") }}</th>
					<th>{{ __("titles.supply_returns") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($months as $i => $month)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>
							<a href="{{ route("money.month", $i + 1) }}">{{ $month["name"] }}</a>
						</td>
						<td class="table-danger">{{ $month["paying"]["materials"] }}</td>
						<td class="table-danger">{{ $month["paying"]["supplies"] }}</td>
						<td class="table-danger">{{ $month["paying"]["salaries"] }}</td>
						<td class="table-success">{{ $month["income"]["problems"] }}</td>
						<td class="table-success">{{ $month["income"]["material_returns"] }}</td>
						<td class="table-success">{{ $month["income"]["supply_returns"] }}</td>
						<td>{{ $month["total"] }}</td>
					</tr>
				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection
