@extends("layouts.app")
@section("title", __("titles.weekends"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.weekends") }}</h2>
			@can("add weekend")
				<div><a href="{{ route("weekend.create") }}" class="btn btn-success">{{ __("titles.add") }}</a></div>
			@endcan
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
					<th>{{ __("titles.weekend") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($weekends as $i => $weekend)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $weekend->day }}</td>
						<td>
							@can("delete weekend")
								@include("layouts.delete", ["action" => route("weekend.destroy", $weekend->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection