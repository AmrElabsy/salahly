<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;

class StatusController extends Controller
{
    public function index()
    {
        $this->authorize("show status");
    
        $statuses = Status::all();
        return view("statuses.index", compact("statuses"));
    }

    public function create()
    {
        $this->authorize("add status");
    
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
        $this->authorize("edit status");
    
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
        $this->authorize("delete status");
    
        $status->delete();
        return redirect()->route("status.index")->withStatus(__("titles.status_deleted"));
    }
}
