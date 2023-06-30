<?php

namespace App\Http\Controllers;

use App\Models\Weekend;
use App\Http\Requests\StoreWeekendRequest;
use App\Http\Requests\UpdateWeekendRequest;

class WeekendController extends Controller
{
    public function index()
    {
		$this->authorize("show weekend");
        $weekends = Weekend::all();
		
		return view("weekends.index", compact("weekends"));
    }

    public function create()
    {
		$this->authorize("add weekend");
	
		return view("weekends.create");
    }

    public function store(StoreWeekendRequest $request)
    {
        $days = $request->get("days");
		
		Weekend::truncate();
		
		foreach ($days as $day) {
			if ( !Weekend::where('day', $day)->exists() ) {
				$weekend = new Weekend();
				$weekend->day = $day;
				$weekend->save();
			}
		}
		
		return redirect()->route("weekend.index");
    }


    public function destroy(Weekend $weekend)
    {
        $weekend->delete();
		return redirect()->route("weekend.index");
	}
}
