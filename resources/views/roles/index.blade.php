@extends("layouts.app")
@section("title", __("titles.roles"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.roles") }}</h2>
			<div><a href="{{ route("role.create") }}" class="btn btn-success">{{ __("titles.add") }}</a></div>
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
					<th>{{ __("titles.role") }}</th>
					<th style="max-width: 400px">{{ __("titles.permissions") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($roles as $i => $role)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $role->name }}</td>
						<td style="max-width: 250px">
							@foreach($role->permissions as $permission)
								<span class="badge badge-success font-size-14">{{ $permission->name }}</span>
							@endforeach
						</td>
						<td>
							<a href="{{ route("role.edit", $role->id) }}"
							   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@include("layouts.delete", ["action" => route("role.destroy", $role->id)])
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection