@extends("layouts.app")
@section("title", __("titles.services"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.services") }}</h2>
			<div>
				@can("add service")
					<a href="{{ route("service.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan
				<a href="{{ route("service.deleted") }}"
				   class="btn btn-secondary">{{ __("titles.deleted_services") }}</a>

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
					<th>{{ __("titles.services") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($services as $i => $service)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $service->name }}</td>
						<td>
							@can("edit service")
								<a href="{{ route("service.edit", $service->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan
							@can("delete service")
								@include("layouts.delete", ["action" => route("service.destroy", $service->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
