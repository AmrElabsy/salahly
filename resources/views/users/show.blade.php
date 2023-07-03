@extends("layouts.app")
@section("title", __("titles.month"))

@section("style")
	<link rel="stylesheet" href="{{ asset("assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}">
	<link rel="stylesheet" href="{{ asset("assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css") }}">

	<link rel="stylesheet" href="{{ asset("assets/libs/select2/css/select2.min.css") }}">
@endsection

@section("content")
	<div class="container">
		<div class="d-flex">
			<div class="btn-group">
				@foreach($months as $month)
					<a href="{{ route("user.show", [ $user->id, "2023", $month->format("m")]) }}"
					   class="btn btn-success">
						{{ $month->format("F") }}
					</a>
				@endforeach

			</div>
		</div>

		<div class="d-flex justify-content-between">
			<h2>{{ __("titles.attendances") }}</h2>
		</div>

		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>{{ __("titles.day") }}</th>
					<th>{{ __("titles.entrance") }}</th>
					<th>{{ __("titles.minutes_late") }}</th>
					<th>{{ __("titles.leaving") }}</th>
				</tr>
				</thead>
				<tbody>
				@foreach($days as $day)
					<tr>
						<th scope="row">{{ $day->format("d M Y") }} {{ $day->format('l') }}</th>
						@if($user->isHoliday($day))
							<td class="table-primary">Holiday</td>
							<td class="table-primary">Holiday</td>
							<td class="table-primary">Holiday</td>
						@else
							@if($user->attended($day))
								<td class="table-success">
									{{ $user->attendanceTime($day) }}
								</td>
							@elseif(\Carbon\Carbon::parse($day)->isToday())
								<td>
									<a href="{{ route("attendance.attend", $user) }}" class="btn btn-primary">Attend</a>
								</td>
							@else
								<td class="table-danger">Absent</td>
							@endif

						<td>{{ $user->minutesLate($day) }}</td>

							@if($user->left($day))
								<td class="table-success" style="border-bottom: 1px solid #555">
									{{ $user->leavingTime($day) }}
								</td>

							@elseif(\Carbon\Carbon::parse($day)->isToday() && $user->attended($day))
								<td style="border-bottom: 1px solid #555">
									<a href="{{ route("attendance.leave", $user) }}" class="btn btn-primary">Leave</a>
								</td>
							@else
								<td>didn't leave</td>
							@endif
						@endif
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>


		<div class="d-flex justify-content-between mt-5">
			<h2>{{ __("titles.problems") }}</h2>
		</div>

		<table class="table table-striped" id="table">
			<thead>
			<tr>
				<th>#</th>
				<th>{{ __("titles.description") }}</th>
				<th>{{ __("titles.branch") }}</th>
				<th>{{ __("titles.price") }}</th>
				<th>{{ __("titles.paid") }}</th>
				<th>{{ __("titles.status") }}</th>
			</tr>
			</thead>
			<tbody>
			@foreach($problems as $i => $problem)
				<tr
						@if($problem->due_time_is_today)
						class="table-warning"
						@elseif($problem->due_time_has_passed)
						class="table-danger"
						@endif
				>
					<th scope="row">{{ $i + 1 }}</th>
					<td>
						<a href="{{ route("problem.show", $problem->id) }}">{{ $problem->description }}</a>
					</td>
					<td>{{ $problem->branch->name }}</td>
					<td>{{ $problem->price }}</td>
					<td>{{ $problem->paid }}</td>
					<td>{{ $problem->status?->name }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>


		<div class="d-flex justify-content-between mt-5">
			<h2>{{ __("titles.salary") }}</h2>
		</div>

		<table class="table table-striped w-50">
			<tbody>
			<tr>
				<td>Salary</td>
				<td>{{ $user->salary }}</td>
			</tr>

			<tr>
				<td>Percentage</td>
				<td>{{ $user->percentage }}</td>
			</tr>

			<tr>
				<td>Count of problems</td>
				<td>{{ $problems->count() }}</td>
			</tr>

			<tr>
				<td>Total Value of problems</td>
				<td>{{ $problems->sum("price") }}</td>
			</tr>


			<tr>
				<td>Total Percentage of problems</td>
				<td>{{ $problems->sum("price") * $user->percentage / 100}}</td>
			</tr>

			<tr>
				<td>Total Absent Days</td>

				<td>{{ $user->absentDays($_month) }}</td>
			</tr>

			<tr>
				<td>Total Late Minutes</td>

				<td>{{ $user->minutesLateByMonth($_month) }}</td>
			</tr>


			<tr class="table-success">
				<td>Net Salary</td>
				<td>{{ $problems->sum("price") * $user->percentage / 100 + $user->salary}}</td>
			</tr>

			</tbody>
		</table>



	</div>
@endsection

@section("script")
	<script src="{{ asset("assets/libs/datatables.net/js/jquery.dataTables.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js") }}"></script>

	<script src="{{ asset("assets/libs/jszip/jszip.min.js") }}"></script>
	<script src="{{ asset("assets/libs/pdfmake/build/pdfmake.min.js") }}"></script>
	<script src="{{ asset("assets/libs/pdfmake/build/vfs_fonts.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-buttons/js/buttons.colVis.min.js") }}"></script>

	<script src="{{ asset("assets/libs/select2/js/select2.min.js")  }}"></script>

	<script>
		$(document).ready(function() {
			let table = $("#table").DataTable({
				lengthChange: false,
				buttons: ["copy", "excel", "colvis"]
			});

			// Use the buttons() method to get access to the column() method
			table.buttons().container().appendTo("#table_wrapper .col-md-6:eq(0)");
			// table.column(3).visible(false);
			// table.column(4).visible(false);
			// table.column(9).visible(false);
			// table.column(10).visible(false);
			// table.column(12).visible(false);
		});
	</script>

@endsection
