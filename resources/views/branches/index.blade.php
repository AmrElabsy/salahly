@extends("layouts.app")
@section("title", __("titles.branches"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.branches") }}</h2>
			<div>
				@can("add branch")
					<a href="{{ route("branch.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan
{{--				<a href="{{ route("branch.deleted") }}"--}}
{{--				   class="btn btn-secondary">{{ __("titles.deleted_branches") }}</a>--}}
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
					<th>{{ __("titles.branches") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($branches as $i => $branch)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $branch->name }}</td>
						<td>
							@can("edit branch")
								<a href="{{ route("branch.edit", $branch->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan

							@can("delete branch")
								@include("layouts.delete", ["action" => route("branch.destroy", $branch->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection