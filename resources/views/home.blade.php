@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-purple mr-0 float-right"><span class="mdi mdi-account-group"></span></span>
                        <div class="mini-stat-info">
                            <span class="counter text-purple">{{ $employees->count() }}</span>
                            {{ __("titles.employees") }}
                        </div>
                        <div class="clearfix"></div>
                        <p class="invisible mb-0 mt-4 text-muted">Total income: $22506 <span class="float-right"><i class="fa fa-caret-up mr-1"></i>10.25%</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="mdi mdi-black-mesa"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-blue-grey">{{ $currentMonthProblems }}</span>
                            {{ __("titles.problems") }}
                        </div>
                        <div class="clearfix"></div>
                        <p class="text-muted mb-0 mt-4">{{ __("titles.problems") }}: {{ $problems->count() }} <span class="float-right"><i class="{{ $problemIcon }}"></i>{{ $problemPercentage }}%</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="mdi mdi-currency-usd"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-brown">{{ $currentMonthProfit }}</span>
                            {{ __("titles.total_profit") }}
                        </div>
                        <div class="clearfix"></div>
                        <p class="text-muted mb-0 mt-4">{{ __("titles.total_profit") }}: {{ $profit }} <span class="float-right"><i class="{{ $profitIcon }}"></i>{{ $problemPercentage }}%</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon bg-teal mr-0 float-right"><i class="mdi mdi-currency-usd"></i></span>
                        <div class="mini-stat-info">
                            <span class="counter text-teal">{{ $currentMonthNetProfit }}</span>
                            {{ __("titles.net_profit") }}
                        </div>
                        <div class="clearfix"></div>
                        <p class="text-muted mb-0 mt-4">{{ __("titles.net_profit") }}: {{ $netProfit }} <span class="float-right"><i class="{{ $netProfitIcon }}"></i>{{ $netProfitPercentage }}%</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card" style="max-height: 450px; overflow: scroll">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __("titles.employees") }}</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __("titles.employees") }}</th>
                                <th>{{ __("titles.email") }}</th>
                                <th>{{ __("titles.branches") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $i => $employee)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>
                                        @foreach($employee->branches as $branch)
                                            <p>{{ $branch->name }}</p>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card" style="max-height: 450px; overflow: scroll">
                <div class="card-body" >
                    <h4 class="card-title mb-4">{{ __("titles.problems") }}</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-vertical table-nowrap mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __("titles.description") }}</th>
                                <th>{{ __("titles.branch") }}</th>
                                <th>{{ __("titles.device") }}</th>
                                <th>{{ __("titles.cost") }}</th>
                                <th>{{ __("titles.price") }}</th>
                                <th>{{ __("titles.paid") }}</th>
                                <th>{{ __("titles.status") }}</th>
                                <th>{{ __("titles.due_time") }}</th>
                                <th>{{ __("titles.customer") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($problems as $i => $problem)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $problem->description }}</td>
                                    <td>{{ $problem->branch->name }}</td>
                                    <td>{{ $problem->device->name }}</td>
                                    <td>{{ $problem->cost }}</td>
                                    <td>{{ $problem->price }}</td>
                                    <td>{{ $problem->paid }}</td>
                                    <td>{{ $problem->status?->name }}</td>
                                    <td>{{ $problem->due_time }}</td>
                                    <td>{{ $problem->device?->customer?->name }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
