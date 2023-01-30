@extends("layouts.app")
@section("title", __("titles.customers"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.customers") }}</h2>
			<div><a href="{{ route("customer.create") }}" class="btn btn-success">{{ __("titles.add") }}</a></div>
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
					<th>{{ __("titles.customers") }}</th>
					<th>Manage</th>
				</tr>
				</thead>
				<tbody>
				@foreach($customers as $i => $customer)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $customer->name }}</td>
						<td>
							<a href="{{ route("customer.edit", $customer->id) }}"
							   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@include("layouts.delete", ["action" => route("customer.destroy", $customer->id)])
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection