<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use App\Http\Requests\StoreHolidayRequest;
use App\Http\Requests\UpdateHolidayRequest;

class HolidayController extends Controller
{
    public function index()
    {
        $this->authorize("show holiday");
    
    }

    public function create()
    {
        $this->authorize("add holiday");
    
    }

    public function store(StoreHolidayRequest $request)
    {
        //
    }

    public function show(Holiday $holiday)
    {
        //
    }

    public function edit(Holiday $holiday)
    {
        $this->authorize("edit holiday");
    
    }

    public function update(UpdateHolidayRequest $request, Holiday $holiday)
    {
        //
    }

    public function destroy(Holiday $holiday)
    {
        $this->authorize("delete holiday");
    
    }
}
