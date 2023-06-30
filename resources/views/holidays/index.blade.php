@extends("layouts.app")
@section("title", __("titles.holidays"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.holidays") }}</h2>
			<div>
				@can("add holiday")
					<a href="{{ route("holiday.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
				@endcan
{{--				<a href="{{ route("holiday.deleted") }}"--}}
{{--				   class="btn btn-secondary">{{ __("titles.deleted_holidays") }}</a>--}}
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
					<th>{{ __("titles.start") }}</th>
					<th>{{ __("titles.end") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($holidays as $i => $holiday)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $holiday->start }}</td>
						<td>{{ $holiday->end }}</td>
						<td>
							@can("edit holiday")
								<a href="{{ route("holiday.edit", $holiday->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan

							@can("delete holiday")
								@include("layouts.delete", ["action" => route("holiday.destroy", $holiday->id)])
							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection