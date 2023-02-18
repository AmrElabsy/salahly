@extends("layouts.app")
@section("title", __("titles.branches"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.branches") }}</h2>
			<div><a href="{{ route("branch.create") }}" class="btn btn-success">{{ __("titles.add") }}</a></div>
		</div>

		@if(session('branch'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('branch') }}
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
					<th>{{ __("titles.branches") }}</th>
					<th>Manage</th>
				</tr>
				</thead>
				<tbody>
				@foreach($branches as $i => $branch)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $branch->name }}</td>
						<td>
							<a href="{{ route("branch.edit", $branch->id) }}"
							   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@include("layouts.delete", ["action" => route("branch.destroy", $branch->id)])
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection