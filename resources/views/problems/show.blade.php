@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="invoice-title">
				<h4 class="font-size-16"><strong>{{ $problem->description }}</strong></h4>
			</div>
			<hr>
			<div class="row">
				<div class="col-6">
					<p>
						<strong>{{ __('titles.status') }}: </strong> {{ $problem->status->name }}
					</p>
					<p>
						<strong>{{ __('titles.price') }}: </strong> {{ $problem->price }}
					</p>
					<p>
						<strong>{{ __('titles.paid') }}: </strong> {{ $problem->paid }}
					</p>
					<p>
						<strong>{{ __('titles.due_time') }}: </strong> {{ $problem->due_time }}
					</p>
					<p>
						<strong>{{ __('titles.branch') }}: </strong> {{ $problem->branch->name }}
					</p>
					<p>
						<strong>{{ __('titles.device') }}: </strong> {{ $problem->device->name }}
						( {{ $problem->device->customer->name }} )
					</p>
					<p>
						<strong>{{ __('titles.employee') }}: </strong> {{ $problem->user->name }}
					</p>
					<p>
						<strong>{{ __('titles.comment') }}: </strong> {{ $problem->comment }}
					</p>

                    <p>
                        <strong>{{ __('titles.feedback') }}: </strong> {{$problem->feedback->content??"none"}}
                    </p>

                </div>
			</div>

		</div>
	</div>
<hr>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="p-2">
					<h3 class="panel-title font-size-20"><strong>{{ __('titles.materials') }}</strong></h3>
				</div>
				<div class="table-responsive">
					<table class="table">
						<thead>
						<tr>
							<td><strong>{{ __('titles.material') }}</strong></td>
							<td><strong>{{ __('titles.price') }}</strong></td>
						</tr>
						</thead>
						<tbody>
						<!-- foreach ($order->lineItems as $line) or some such thing here -->
						@foreach($problem->materials as $material)
							<tr>
								<td>{{ $material->name }}</td>
								<td>{{ $material->pivot->price }}</td>
							</tr>

						@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div> <!-- end row -->


@endsection
