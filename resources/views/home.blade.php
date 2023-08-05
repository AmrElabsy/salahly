@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
<<<<<<< HEAD
            <div class="col-md-4" >
                <a href="{{route('problem.create')}}" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">إستلام جهاز جديد</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('problem.index')}}" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">اجهزة تحت الكشف</a>
=======
            <div class="col-md-4">
                <a href="{{route('problem.create')}}" class="btn btn-primary btn-lg btn-block">استلام جهاز جديد</a>
            </div>
            <div class="col-md-4">
                <a href="{{route('problem.index')}}" class="btn btn-primary btn-lg btn-block">أجهرة تحت الكشف</a>
>>>>>>> a39df6737352cccf294465651757805da3f04a67
            </div>
            <div class="col-md-4">
                <a href="{{route('attendance.index')}}" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">الحضور والغياب</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
<<<<<<< HEAD
                <a href="#" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">تم التسليم</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">الرفض</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-dark btn-lg btn-block" style="height: 100px; display: flex; align-items: center; justify-content: center;">الخزنة</a>
=======
                <a href="{{ route('problem.index', ['status' => '5']) }}" class="btn btn-primary btn-lg btn-block">تم التسليم</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('problem.index', ['status' => '3']) }}" class="btn btn-primary btn-lg btn-block">الرفض</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('money.index') }}" class="btn btn-primary btn-lg btn-block">{{ __('titles.manage_money') }}</a>
>>>>>>> a39df6737352cccf294465651757805da3f04a67
            </div>
        </div>
    </div>
@endsection
