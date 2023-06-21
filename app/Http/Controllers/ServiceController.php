<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\ServicePrice;
use App\Models\SupplyPrice;

class ServiceController extends Controller
{
    public function index()
    {
        $this->authorize("show service");
    
        $services = Service::all();
        return view("services.index", compact("services"));
    }

    public function create()
    {
        $this->authorize("add service");
    
        return view('services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $service = new Service();
        $service->name = $request->get("name");
        $service->save();
    
        $prices = $request->input('prices');
        $start_dates = $request->input('start_dates');
    
        foreach ($prices as $index => $price) {
            $servicePrice = new ServicePrice();
            $servicePrice->price = $price;
            $servicePrice->start_date = $start_dates[$index];
            $servicePrice->service_id = $service->id;
    
            $servicePrice->save();
        }
        
        return redirect()->route("service.index")->withStatus(__("titles.service_added"));
    }

    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        $this->authorize("edit service");
    
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
        $this->authorize("delete service");
    
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

