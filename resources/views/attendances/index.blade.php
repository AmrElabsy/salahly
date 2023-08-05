@extends("layouts.app")
@section("title", __("titles.attendances"))

@section("content")
	<div class="container">
		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.attendances") }}</h2>
		</div>

		<div class="d-flex">
			<div class="btn-group">
				@foreach($months as $month)
					<a href="{{ route("attendance.month", ["2023", $month->format("m")]) }}"
					   @if(true)
					   @endif
					   class="btn btn-success">
						{{ $month->format("F") }}
					</a>
				@endforeach

			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-striped mb-0 mt-3 table-bordered">
				<thead>
				<tr class="text-center">
					<td>{{ __("titles.employee") }}</td>
					@foreach($days as $day)
						<td>{{ $day->format("d M Y") }} {{ $day->format('l') }}</td>
						<td style="border-bottom: 1px solid #555">{{ $day->format("d M Y") }} {{ $day->format('l') }}</td>
					@endforeach
				</tr>
				</thead>
				<tbody>
				@foreach($employees as $employee)
					<tr>
						<td>{{ $employee->name }}</td>
						@foreach($days as $day)
							@if($employee->isHoliday($day))
								<td class="table-primary">{{ __("titles.holiday") }}</td>
								<td class="table-primary">{{ __("titles.holiday") }}</td>
							@else
								@if($employee->attended($day))
									<td class="table-success">
										{{ $employee->attendanceTime($day) }}
									</td>
								@elseif(\Carbon\Carbon::parse($day)->isToday())
									<td>
										<a href="{{ route("attendance.attend", $employee) }}" class="btn btn-primary">{{ __('titles.attend') }}</a>
									</td>
								@else
									<td class="table-danger">{{ __("titles.absent") }}</td>
								@endif

								@if($employee->left($day))
									<td class="table-success" style="border-bottom: 1px solid #555">
										{{ $employee->leavingTime($day) }}
									</td>

								@elseif(\Carbon\Carbon::parse($day)->isToday() && $employee->attended($day))
									<td style="border-bottom: 1px solid #555">
										<a href="{{ route("attendance.leave", $employee) }}" class="btn btn-primary">{{ __('titles.leave') }}</a>
									</td>
								@else
									<td style="border-bottom: 1px solid #555">{{ __("titles.didnt_leave") }}</td>
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