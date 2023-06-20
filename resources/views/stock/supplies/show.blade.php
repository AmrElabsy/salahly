@extends("layouts.app")
@section("title", $supply->name)

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ $supply->name }}</h2>
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
					<th>{{ __("titles.buying_date") }}</th>
					<th>{{ __("titles.amount") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($supply->storedSupplies as $i => $supply)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $supply->buying_date }}</td>
						<td>{{ $supply->amount }}</td>
						<td>
							<a href="{{ route("stock.supply.edit", $supply->id) }}"
							   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@include("layouts.delete", ["action" => route("stock.supply.destroy", $supply->id)])
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
