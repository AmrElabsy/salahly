@extends("layouts.app")
@section("title", __("titles.deleted_customers"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.deleted_customers") }}</h2>
			<div>
				<a href="{{ route("customer.index") }}" class="btn btn-success">{{ __("titles.customers") }}</a>
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
					<th>{{ __("titles.customers") }}</th>
					<th>Phones</th>
					<th>Manage</th>
				</tr>
				</thead>
				<tbody>
				@foreach($customers as $i => $customer)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $customer->name }}</td>
						<td>
							@foreach($customer->phones as $phone)
								<p>{{ $phone->phone }}</p>
							@endforeach

						</td>
						<td>
							<a href="{{ route("customer.restore", $customer->id) }}"
							   class="btn btn-primary">{{ __("titles.restore") }}</a>
							<a href="{{ route("customer.forceDelete", $customer->id) }}"
							   class="btn btn-danger">{{ __("titles.delete") }}</a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection