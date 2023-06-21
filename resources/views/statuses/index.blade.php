@extends("layouts.app")
@section("title", __("titles.statuses"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.statuses") }}</h2>
			<div>
				@can("add status")
					<a href="{{ route("status.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
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
					<th>{{ __("titles.statuses") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($statuses as $i => $status)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $status->name }}</td>
						<td>
							@can("edit status")
								<a href="{{ route("status.edit", $status->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan

							@can("delete status")
								@include("layouts.delete", ["action" => route("status.destroy", $status->id)])
							@endcan
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection