<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Problem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::all();
        $problems = Problem::all();
        $branches = Branch::all();
        
        $startLastMonth = new Carbon("first day of last month");
        $endLastMonth = new Carbon("last day of last month");
        $lastMonth = $problems->where("created_at", ">=", $startLastMonth)->where("created_at", "<=", $endLastMonth)->count();
        
        $startCurrentMonth = new Carbon("first day of this month");
        $endCurrentMonth = new Carbon("last day of this month");
        $currentMonth = $problems->where("created_at", ">=", $startCurrentMonth)->where("created_at", "<=", $endCurrentMonth)->count();
        
        $difference = $currentMonth - $lastMonth;
        
        try {
            $problemPercentage = $difference / $lastMonth * 100;
        } catch (\Exception $exception) {
            $problemPercentage = 0;
        }
        
        if($problemPercentage > 0 ) {
            $problemIcon = "fa fa-caret-up mr-1";
        } elseif ($problemPercentage < 0) {
            $problemIcon = "fa fa-caret-down mr-1";
        } else {
            $problemIcon = "mdi mdi-minus";
        }
        
        return view('home', compact("employees", "problems", "branches", "problemPercentage", "problemIcon", "currentMonth"));
    }
}
