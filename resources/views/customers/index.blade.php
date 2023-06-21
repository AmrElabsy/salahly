@extends("layouts.app")
@section("title", __("titles.customers"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.customers") }}</h2>
			<div>
				@can("add customer")
					<a href="{{ route("customer.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan
				<a href="{{ route("customer.deleted") }}"
				   class="btn btn-secondary">{{ __("titles.deleted_customers") }}</a>
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
					<th>{{ __("titles.phones") }}</th>
					<th>{{ __("titles.devices") }}</th>
					<th>{{ __("titles.manage") }}</th>
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
							@foreach($customer->devices as $device)
								<p>{{ $device->name }}</p>
							@endforeach
						</td>
						<td>
							@can("edit customer")
								<a href="{{ route("customer.edit", $customer->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan

							@can("delete customer")
								@include("layouts.delete", ["action" => route("customer.destroy", $customer->id)])
							@endcan
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection