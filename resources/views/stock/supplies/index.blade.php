@extends("layouts.app")
@section("title", __("titles.supplies"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.supplies") }}</h2>
			<div>
				@can("add stored_supply")
				<a href="{{ route("stock.supply.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan
{{--				<a href="{{ route("stock.supply.deleted") }}" class="btn btn-secondary">{{ __("titles.deleted_supplies") }}</a>--}}
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

                </tr>
				</thead>
				<tbody>
				@foreach($supplies as $i => $supply)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>
							<a href="{{ route("stock.supply.show", $supply->id) }}">{{ $supply->name }}</a>
						</td>
						<td>{{ $supply->amount }}</td>
                    </tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection
