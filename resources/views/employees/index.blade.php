@extends("layouts.app")
@section("title", __("titles.employees"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.employees") }}</h2>
			<div>
				<a href="{{ route("employee.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				<a href="{{ route("employee.deleted") }}" class="btn btn-secondary">{{ __("titles.deleted_employees") }}</a>
			</div>
		</div>

		@if(session('employee'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('employee') }}
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
					<th>{{ __("titles.email") }}</th>
					<th>{{ __("titles.branches") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($employees as $i => $employee)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $employee->user->name }}</td>
						<td>{{ $employee->user->email }}</td>
						<td>
							@foreach($employee->branches as $branch)
								<p>{{ $branch->name }}</p>
							@endforeach
						</td>
						<td>
							<a href="{{ route("employee.edit", $employee->id) }}"
							   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@include("layouts.delete", ["action" => route("employee.destroy", $employee->id)])
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection