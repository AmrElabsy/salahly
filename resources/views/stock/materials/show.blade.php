@extends("layouts.app")
@section("title", $material->name)

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ $material->name }}</h2>
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
					<th>{{ __("titles.buying_date") }}</th>
					<th>{{ __("titles.amount") }}</th>
                    <th>{{ __("titles.price") }}</th>

                    <th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($material->storedMaterials as $i => $material)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $material->buying_date }}</td>
						<td>{{ $material->amount }}</td>
                        <td>{{ $material->price}}</td>

                        <td>
							@can("edit stored_material")
								<a href="{{ route("stock.material.edit", $material->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan
							@can("delete stored_material")
								@include("layouts.delete", ["action" => route("stock.material.destroy", $material->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
