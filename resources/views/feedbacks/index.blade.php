@extends("layouts.app")
@section("title", __("titles.feedbacks"))

@section('content')
	@if (session('success'))
		<div class="alert alert-success">{{ session('success') }}</div>
	@endif
	<div class="d-flex justify-content-between">
		<h2>{{ __("titles.feedbacks") }}</h2>
		<div>
			<a href="{{ route("feedback.create") }}" class="btn btn-success">{{ __("titles.add") }}</a>
			<a href="#" class="btn btn-secondary">{{ __("titles.deleted_feedbacks") }}</a>
		</div>
	</div>
	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>Content</th>
			<th>Is Available?</th>
			<th>Problem ID</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($feedbacks as $feedback)
			<tr>
				<td>{{ $feedback->id }}</td>
				<td>{{ $feedback->content }}</td>
				<td>{{ $feedback->is_available ? 'Yes' : 'No' }}</td>
				<td>{{ $feedback->problem_id }}</td>
				<td>
					<a href="{{ route('feedback.show', $feedback) }}" class="btn btn-primary">View</a>
					<a href="{{ route('feedback.edit', $feedback) }}" class="btn btn-secondary">Edit</a>
					@can("delete feedback")
						<form action="{{ route('feedback.destroy', $feedback) }}" method="POST"
							  style="display: inline-block">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger"
									onclick="return confirm('Are you sure you want to delete this feedback?')">Delete
							</button>
						</form>
					@endcan
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection
