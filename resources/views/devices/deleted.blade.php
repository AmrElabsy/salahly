@extends("layouts.app")
@section("title", __("titles.deleted_devices"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.deleted_customers") }}</h2>
			<div>
				<a href="{{ route("device.index") }}" class="btn btn-success">{{ __("titles.devices") }}</a>
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
					<th>{{ __("titles.devices") }}</th>
					<th>{{ __("titles.customer") }}</th>
					<th>Manage</th>
				</tr>
				</thead>
				<tbody>
				@foreach($devices as $i => $device)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $device->name }}</td>
						<td>{{ $device->customer->name }}</td>
						<td>
							<a href="{{ route("device.restore", $device->id) }}"
							   class="btn btn-primary">{{ __("titles.restore") }}</a>
							<a href="{{ route("device.forceDelete", $device->id) }}"
							   class="btn btn-danger">{{ __("titles.delete") }}</a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection