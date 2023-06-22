@extends("layouts.app")
@section("title", __("titles.supply_returns"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.supply_returns") }}</h2>
			<div>
				@can("add supply_return")
				<a href="{{ route("stock.supplyreturn.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan
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
