@extends("layouts.app")
@section("title", __("titles.materials"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.materials") }}</h2>
			<div>
				<a href="{{ route("stock.material.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				<a href="{{ route("stock.material.deleted") }}" class="btn btn-secondary">{{ __("titles.deleted_materials") }}</a>
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
				</tr>
				</thead>
				<tbody>
				@foreach($materials as $i => $material)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>
							<a href="{{ route("stock.material.show", $material->id) }}">{{ $material->name }}</a>
						</td>
						<td>{{ $material->amount }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
