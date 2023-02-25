<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Employee;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;

class AttendanceController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $day2 = Carbon::now()->format("d");
        $month = Carbon::now()->format("M");
    
        $start = new DateTime(Carbon::now()->startOfMonth());
        $interval = new DateInterval('P1D');
        $end = new DateTime(Carbon::now());
        $period = new DatePeriod($start, $interval, $end);
        
        return view("attendances.index", compact("employees", "day2", "month", "period"));
    }

    public function create()
    {
        //
    }

    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    public function show(Attendance $attendance)
    {
        //
    }

    public function edit(Attendance $attendance)
    {
        //
    }

    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    public function destroy(Attendance $attendance)
    {
        //
    }
    
    public function attend(Employee $employee) {
        $attendance = new Attendance();
        $attendance->employee_id = $employee->id;
        $attendance->type = 0;
        $attendance->save();
        
        return redirect()->back();
    }

    public function leave(Employee $employee) {
        $attendance = new Attendance();
        $attendance->employee_id = $employee->id;
        $attendance->type = 1;
        $attendance->save();
        
        return redirect()->back();
    }
}
