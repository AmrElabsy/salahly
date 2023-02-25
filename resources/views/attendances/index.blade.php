@extends("layouts.app")
@section("title", __("titles.attendances"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.attendances") }}</h2>
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
			<table class="table table-striped mb-0 table-bordered">
				<thead>
				<tr class="text-center">
					<td>{{ __("titles.employee") }}</td>
					@foreach($period as $day)
						<td>{{ $day->format("d M Y") }}</td>
						<td style="border-bottom: 1px solid #555">{{ $day->format("d M Y") }}</td>
					@endforeach
				</tr>
				</thead>
				<tbody>
				@foreach($employees as $employee)
					<tr>
						<td>{{ $employee->name }}</td>
						@foreach($period as $day)
							@if($employee->isHoliday($day))
								<td class="table-primary">Holiday</td>
								<td class="table-primary">Holiday</td>
							@else
								@if($employee->attended($day))
									<td class="table-success">
										{{ $employee->attendanceTime($day) }}
									</td>
								@elseif(\Carbon\Carbon::parse($day)->isToday())
									<td>
										<a href="{{ route("attendance.attend", $employee) }}" class="btn btn-primary">Attend</a>
									</td>
								@else
									<td class="table-danger">Absent</td>
								@endif

								@if($employee->left($day))
									<td class="table-success" style="border-bottom: 1px solid #555">
										{{ $employee->leavingTime($day) }}
									</td>

								@elseif(\Carbon\Carbon::parse($day)->isToday() && $employee->attended($day))
									<td>
										<a href="{{ route("attendance.leave", $employee) }}" class="btn btn-primary">Leave</a>
									</td>
								@else
									<td style="border-bottom: 1px solid #555">didn't leave</td>
								@endif
							@endif
						@endforeach
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection

@section("script")
	<script>
		$("table").each(function() {
			let $this = $(this);
			let newrows = [];
			$this.find("tr").each(function() {
				let i = 0;
				$(this).find("td").each(function() {
					i++;
					if ( newrows[i] === undefined ) {
						newrows[i] = $("<tr></tr>");
					}
					newrows[i].append($(this));
				});
			});
			$this.find("tr").remove();
			$.each(newrows, function() {
				$this.append(this);
			});
		});
	</script>
@endsection