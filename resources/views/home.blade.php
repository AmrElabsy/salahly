@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('problem.create')}}" class="btn btn-primary btn-lg btn-block">استلام جهاز جديد</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('problem.index')}}" class="btn btn-primary btn-lg btn-block">أجهرة تحت الكشف</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('attendance.index')}}" class="btn btn-primary btn-lg btn-block">الحضور والغياب</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('problem.index', ['status' => '5']) }}" class="btn btn-primary btn-lg btn-block">تم التسليم</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('problem.index', ['status' => '3']) }}" class="btn btn-primary btn-lg btn-block">الرفض</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('money.index') }}" class="btn btn-primary btn-lg btn-block">{{ __('titles.manage_money') }}</a>
            </div>
        </div>
    </div>
@endsection
