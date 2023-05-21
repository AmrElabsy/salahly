<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Problem;
use App\Models\User;
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
        $employees = User::role("employee")->get();
        $problems = Problem::all();
        $branches = Branch::all();
        $profit = Problem::sum("paid");
        
        $startLastMonth = new Carbon("first day of last month");
        $endLastMonth = new Carbon("last day of last month");
        $startCurrentMonth = new Carbon("first day of this month");
        $endCurrentMonth = new Carbon("last day of this month");
        
        /**
         * Calculate the Number of problems this month and compare it with the last month
         */
        $lastMonthProblems = $problems->where("created_at", ">=", $startLastMonth)->where("created_at", "<=", $endLastMonth)->count();
        $currentMonthProblems = $problems->where("created_at", ">=", $startCurrentMonth)->where("created_at", "<=", $endCurrentMonth)->count();
        $difference = $currentMonthProblems - $lastMonthProblems;
        $lastMonthProblems=1;
        
        try 
        {
                $problemPercentage = $difference / $lastMonthProblems * 100;    
        } 
        catch (\Exception $exception) 
        {
            $problemPercentage = 0;
        }
        
        if($problemPercentage > 0 ) {
            $problemIcon = "fa fa-caret-up mr-1";
        } elseif ($problemPercentage < 0) {
            $problemIcon = "fa fa-caret-down mr-1";
        } else {
            $problemIcon = "mdi mdi-minus";
        }
    
        /**
         * Calculate the Total profit of this month and compare it with the last month
         */
        $lastMonthProfit = $problems->where("created_at", ">=", $startLastMonth)->where("created_at", "<=", $endLastMonth)->sum("paid");
        $currentMonthProfit = $problems->where("created_at", ">=", $startCurrentMonth)->where("created_at", "<=", $endCurrentMonth)->sum("paid");
        
        $difference = $currentMonthProfit - $lastMonthProfit;
        try {
            $profitPercentage = $difference / $lastMonthProblems * 100;
        } catch (\Exception $exception) {
            $profitPercentage = 0;
        }
    
        if($profitPercentage > 0 ) {
            $profitIcon = "fa fa-caret-up mr-1";
        } elseif ($profitPercentage < 0) {
            $profitIcon = "fa fa-caret-down mr-1";
        } else {
            $profitIcon = "mdi mdi-minus";
        }
    
        $lastMonthPaid = Problem::where("created_at", ">=", $startLastMonth)->where("created_at", "<=", $endLastMonth)
            ->sum("paid");
        $lastMonthCost = $problems->where("created_at", ">=", $startLastMonth)->where("created_at", "<=", $endLastMonth)
            ->sum("cost");
        $lastMonthNetProfit = $lastMonthPaid - $lastMonthCost;
        
        $currentMonthPaid = Problem::where("created_at", ">=", $startCurrentMonth)->where("created_at", "<=", $endCurrentMonth)
            ->sum("paid");
        $currentMonthCost = $problems->where("created_at", ">=", $startCurrentMonth)->where("created_at", "<=", $endCurrentMonth)
            ->sum("cost");
        $currentMonthNetProfit = $currentMonthPaid - $currentMonthCost;
    
        $difference = $currentMonthNetProfit - $lastMonthNetProfit;
        try {
            $netProfitPercentage = $difference / $lastMonthProblems * 100;
        } catch (\Exception $exception) {
            $netProfitPercentage = 0;
        }
    
        if($netProfitPercentage > 0 ) {
            $netProfitIcon = "fa fa-caret-up mr-1";
        } elseif ($netProfitPercentage < 0) {
            $netProfitIcon = "fa fa-caret-down mr-1";
        } else {
            $netProfitIcon = "mdi mdi-minus";
        }
        
        $netProfit = $profit - $problems->sum("cost");
        
        
        return view('home', compact(
            "employees", "problems", "branches", "profit", "netProfit",
            "problemPercentage", "problemIcon", "currentMonthProblems",
            "profitPercentage", "profitIcon", "currentMonthProfit",
            "netProfitPercentage", "netProfitIcon", "currentMonthNetProfit"
        ));
    }
}
