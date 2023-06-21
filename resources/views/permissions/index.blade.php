@extends("layouts.app")
@section("title", __("titles.permissions"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.permissions") }}</h2>
			@can("add permission")
				<div><a href="{{ route("permission.create") }}" class="btn btn-success">{{ __("titles.add") }}</a></div>
			@endcan
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
					<th>{{ __("titles.permission") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($permissions as $i => $permission)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $permission->name }}</td>
						<td>
							@can("edit permission")
								<a href="{{ route("permission.edit", $permission->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan
							@can("delete permission")
								@include("layouts.delete", ["action" => route("permission.destroy", $permission->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection