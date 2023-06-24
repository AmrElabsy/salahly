@extends("layouts.app")
@section("title", __("titles.devices"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.devices") }}</h2>
			<div>
				@can("add device")
					<a href="{{ route("device.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan
{{--				<a href="{{ route("device.deleted") }}" class="btn btn-secondary">{{ __("titles.deleted_devices") }}</a>--}}
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
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($devices as $i => $device)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $device->name }}</td>
						<td>{{ $device->customer?->name }}</td>
						<td>
							@can("edit device")
								<a href="{{ route("device.edit", $device->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan

							@can("delete device")
								@include("layouts.delete", ["action" => route("device.destroy", $device->id)])
							@endcan
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection