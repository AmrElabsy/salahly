<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view("statuses.index", compact("statuses"));
    }

    public function create()
    {
        return view("statuses.create");
    }

    public function store(StoreStatusRequest $request)
    {
        $status = new Status();
        $status->name = $request->get("name");
        $status->save();
        
        return redirect()->route("status.index")->withStatus(__("titles.status_added"));
    }

    public function show(Status $status)
    {
        //
    }

    public function edit(Status $status)
    {
        return view("statuses.edit", compact("status"));
    }

    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->name = $request->get("name");
        $status->save();
        return redirect()->route("status.index")->withStatus(__("titles.status_updated"));
    
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route("status.index")->withStatus(__("titles.status_deleted"));
    
    }
}
