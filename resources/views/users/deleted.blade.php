@extends("layouts.app")
@section("title", __("titles.deleted_users"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.deleted_users") }}</h2>
			<div>
				<a href="{{ route("user.index") }}" class="btn btn-success">{{ __("titles.users") }}</a>
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
					<th>{{ __("titles.users") }}</th>
					<th>{{ __("titles.email") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($users as $i => $user)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<a href="{{ route("user.restore", $user->id) }}"
							   class="btn btn-primary">{{ __("titles.restore") }}</a>
							<a href="{{ route("user.forceDelete", $user->id) }}"
							   class="btn btn-danger">{{ __("titles.delete") }}</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection