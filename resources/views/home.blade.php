@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('problem.create')}}" class="btn btn-primary btn-lg btn-block">إستلام جهاز جديد</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('problem.index')}}" class="btn btn-primary btn-lg btn-block">اجهزة تحت الكشف</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('attendance.index')}}" class="btn btn-primary btn-lg btn-block">الحضور والغياب</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-lg btn-block">تم التسليم</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-lg btn-block">الرفض</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-lg btn-block"> الخزنة </a>
            </div>
        </div>
    </div>
@endsection
