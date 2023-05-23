<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view("services.index", compact("services"));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $service = new Service();
        $service->name = $request->get("name");
        $service->save();

        return redirect()->route("service.index")->withStatus(__("titles.service_added"));
    }

    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        return view('services.edit',compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->name = $request->get("name");

        $service->save();

        return redirect()->route("service.index")->withStatus(__("titles.service_updated"));
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route("service.index")->withStatus(__("titles.service_deleted"));
    }

    public function deleted()
    {
        $services = Service::onlyTrashed()->get();

        return view("services.deleted", compact("services"));
    }

    public function restore($service)
    {
        Service::withTrashed()->find($service)->restore();

        return redirect()->back()->withStatus(__("titles.service_restored"));
    }

    public function forceDelete($service)
    {
        Service::withTrashed()->find($service)->forceDelete();

        return redirect()->back()->withStatus(__("titles.service_deleted"));
    }
}

