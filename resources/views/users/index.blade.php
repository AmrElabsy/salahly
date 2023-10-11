@extends("layouts.app")
@section("title", __("titles.users"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.users") }}</h2>
			<div>
				@can("add user")
					<a href="{{ route("user.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan
				<a href="{{ route("loan.index") }}" class="btn btn-success">{{ __("titles.loans") }}</a>
{{--				<a href="{{ route("user.deleted") }}" class="btn btn-secondary">{{ __("titles.deleted_users") }}</a>--}}
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
					<th>{{ __("titles.roles") }}</th>
					<th>{{ __("titles.salary") }}</th>
					<th>{{ __("titles.percentage") }}</th>
                    <th>{{ __("titles.target") }}</th>
                    <th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($users as $i => $user)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>
							@if($user->hasRole('Employee'))
								<a href="{{ route("user.show", $user->id) }}">{{ $user->name }}</a>
							@else
								{{ $user->name }}
							@endif

						</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
						<td>{{ $user->salary }}</td>
						<td>{{ $user->percentage }}%</td>
                        <td>{{ $user->target }}</td>
						<td>
							@can("edit user")
								<a href="{{ route("user.edit", $user->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan

							@can("delete user")
								@include("layouts.delete", ["action" => route("user.destroy", $user->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
