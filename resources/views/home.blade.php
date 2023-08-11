@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-4">
                <a href="{{route('problem.create')}}" class="btn btn-primary btn-lg btn-block">{{__('titles.new_device')}}</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('problem.index', ['status' => 1])}}" class="btn btn-primary btn-lg btn-block">{{ __('titles.devices_under_detection') }}</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('attendance.index')}}" class="btn btn-primary btn-lg btn-block">{{__('titles.attendance')}}</a>
            </div>
        </div>
        <br>
        <div class="row">

            <div class="col-md-4">
                <a href="{{ route('problem.index', ['status' => '5']) }}" class="btn btn-primary btn-lg btn-block">{{ __('titles.done') }}</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('problem.index', ['status' => '3']) }}" class="btn btn-primary btn-lg btn-block">{{ __('titles.rejected') }}</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('money.index') }}" class="btn btn-primary btn-lg btn-block">{{ __('titles.manage_money') }}</a>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('feedback.index') }}" class="btn btn-primary btn-lg btn-block">{{ __('titles.feedbacks') }}</a>
            </div>

        </div>
    </div>
@endsection
