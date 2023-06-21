@extends("layouts.app")
@section("title", __("titles.categories"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.categories") }}</h2>
			<div>
				@can("add category")
					<a href="{{ route("category.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan

				<a href="{{ route("category.deleted") }}"
				   class="btn btn-secondary">{{ __("titles.deleted_categories") }}</a>
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
					<th>{{ __("titles.category") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($categories as $i => $category)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $category->name }}</td>
						<td>
							@can("edit category")
								<a href="{{ route("category.edit", $category->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan

							@can("delete category")
								@include("layouts.delete", ["action" => route("category.destroy", $category->id)])
							@endcan
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>
	</div>
@endsection