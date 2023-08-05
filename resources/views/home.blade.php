@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4" >
                <a href="{{route('problem.create')}}" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">إستلام جهاز جديد</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('problem.index')}}" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">اجهزة تحت الكشف</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('attendance.index')}}" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">الحضور والغياب</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">تم التسليم</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">الرفض</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">الخزنة</a>
            </div>
        </div>
    </div>
@endsection
