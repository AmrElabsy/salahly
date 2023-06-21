<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;

class AttendanceController extends Controller
{
    public function index( $year = null, $month = null)
    {
        $this->authorize("show attendance");
    
        $year = $year ?? Carbon::now()->year;
        $month = $month ?? Carbon::now()->month;
    
        $date = new Carbon($year . "-" . $month );
        $start = new DateTime($date->startOfMonth());
        $interval = new DateInterval('P1D');
        $end = $date->endOfMonth() < now() ? new DateTime($date->endOfMonth()) : Carbon::now();
        $days = new DatePeriod($start, $interval, $end);
    
        $jan = new DateTime(Carbon::now()->firstOfYear());
        $interval = new DateInterval("P1M");
        $currentMonth = Carbon::now()->lastOfMonth();
        
        $months = new DatePeriod($jan, $interval, $currentMonth);
        
        $employees = User::role("employee")->get();
        return view("attendances.index", compact("employees", "days", "months"));
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
    
    public function attend(User $user) {
        $this->authorize("add attendance");
    
        $attendance = new Attendance();
        $attendance->user_id = $user->id;
        $attendance->type = 0;
        $attendance->save();
        
        return redirect()->back();
    }

    public function leave(User $user) {
        $this->authorize("add attendance");
    
        $attendance = new Attendance();
        $attendance->user_id = $user->id;
        $attendance->type = 1;
        $attendance->save();
        
        return redirect()->back();
    }
}
