<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use App\Http\Requests\StoreHolidayRequest;
use App\Http\Requests\UpdateHolidayRequest;
use App\Models\User;

class HolidayController extends Controller
{
    public function index()
    {
        $this->authorize("show holiday");
    
		$holidays = Holiday::all();
		
		return view("holidays.index", compact("holidays"));
    }

    public function create()
    {
        $this->authorize("add holiday");
    
		$employees = User::employees()->get();
		
		return view("holidays.create", compact("employees"));
    }

    public function store(StoreHolidayRequest $request)
    {
        $holiday = new Holiday();
		$holiday->start = $request->get("start");
		$holiday->end = $request->get("end");
		$holiday->save();
		
		$employees = $request->get("employees") ?? [];
		$holiday->users()->sync($employees);
		
		return redirect()->route("holiday.index");
    }

    public function edit(Holiday $holiday)
    {
        $this->authorize("edit holiday");
		
		$employees = User::employees()->get();
	
		return view("holidays.edit", compact("employees", "holiday"));
    }

    public function update(UpdateHolidayRequest $request, Holiday $holiday)
    {
		$holiday->start = $request->get("start");
		$holiday->end = $request->get("end");
		$holiday->save();
	
		$employees = $request->get("employees") ?? [];
		$holiday->users()->sync($employees);
	
		return redirect()->route("holiday.index");
    }

    public function destroy(Holiday $holiday)
    {
        $this->authorize("delete holiday");
		
		$holiday->delete();
	
		return redirect()->route("holiday.index");
	}
}
