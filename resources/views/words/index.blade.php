@extends("layouts.app")
@section("title", __("titles.words"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.words") }}</h2>
			<div>
				@can("add word")
					<a href="{{ route("word.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
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

		<form>
			<div class="form-group row">
				<label for="word" class="col-sm-2 col-form-label">{{ __("titles.word") }}</label>
				<div class="col-sm-4">
					<input type="text" name="word" id="word" class="form-control">
				</div>

				<div class="col-sm-2">
					<input type="submit" class="btn btn-primary" value="{{ __("titles.submit") }}">
				</div>

			</div>
		</form>

		<div class="table-responsive">
			<table class="table table-striped mb-0">
				<thead>
				<tr>
					<th>#</th>
					<th>{{ __("titles.word") }}</th>
					<th>{{ __("titles.english") }}</th>
					<th>{{ __("titles.arabic") }}</th>
					<th>{{ __("titles.manage") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($words as $i => $word)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $word->word }}</td>
						<td>{{ $word->en }}</td>
						<td>{{ $word->ar }}</td>
						<td>
							@can("edit word")
								<a href="{{ route("word.edit", $word->id) }}"
								   class="btn btn-primary">{{ __("titles.edit") }}</a>
							@endcan

							@can("delete word")
								@include("layouts.delete", ["action" => route("word.destroy", $word->id)])
							@endcan
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
			<div class="d-flex justify-content-center mt-4">
				{{ $words->links("vendor.pagination.bootstrap-4") }}
			</div>

		</div>
	</div>
@endsection