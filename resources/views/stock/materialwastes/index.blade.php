@extends("layouts.app")
@section("title", __("titles.material_wastes"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.material_wastes") }}</h2>
			<div>
				@can("add material_waste")
				<a href="{{ route("stock.materialwaste.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan
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
					<th>{{ __("titles.material") }}</th>
					<th>{{ __("titles.amount") }}</th>
					<th>{{ __("titles.price") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($materialWastes as $i => $material)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $material->material->name }}</td>
						<td>{{ $material->amount }}</td>
						<td>
							@can("edit material_waste")
								<a href="{{ route("stock.materialwaste.edit", $material->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan
							@can("delete material_waste")
								@include("layouts.delete", ["action" => route("stock.materialwaste.destroy", $material->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
