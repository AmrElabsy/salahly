@extends("layouts.app")
@section("title", __("titles.deleted_branches"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.deleted_branches") }}</h2>
			<div>
				<a href="{{ route("branch.index") }}" class="btn btn-success">{{ __("titles.branches") }}</a>
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
					<th>{{ __("titles.branch") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($branches as $i => $branch)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $branch->name }}</td>
						<td>
							<a href="{{ route("branch.restore", $branch->id) }}"
							   class="btn btn-primary">{{ __("titles.restore") }}</a>
							<a href="{{ route("branch.forceDelete", $branch->id) }}"
							   class="btn btn-danger">{{ __("titles.delete") }}</a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection