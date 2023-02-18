@extends("layouts.app")
@section("title", __("titles.deleted_employees"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.deleted_employees") }}</h2>
			<div>
				<a href="{{ route("employee.index") }}" class="btn btn-success">{{ __("titles.employees") }}</a>
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
					<th>{{ __("titles.employees") }}</th>
					<th>{{ __("titles.branches") }}</th>
					<th>Manage</th>
				</tr>
				</thead>
				<tbody>
				@foreach($employees as $i => $employee)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $employee->name }}</td>
						<td>
							@foreach($employee->branches as $branch)
								<p>{{ $branch->name }}</p>
							@endforeach
						</td>
						<td>
							<a href="{{ route("employee.restore", $employee->id) }}"
							   class="btn btn-primary">{{ __("titles.restore") }}</a>
							<a href="{{ route("employee.forceDelete", $employee->id) }}"
							   class="btn btn-danger">{{ __("titles.delete") }}</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection