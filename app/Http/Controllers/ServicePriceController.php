<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServicePrice;
use Illuminate\Http\Request;

class ServicePriceController extends Controller
{

    public function index()
    {
        $servicePrices = ServicePrice::all();
        return view('servicePrices.index',compact('servicePrices'));
    }
    public function create()
    {
        $services = Service::all();
        return view('servicePrices.create',compact('services'));
    }


    public function store(Request $request)
    {

        $servicePrice = new ServicePrice();
        $servicePrice->service_id = $request->input('service');
        $servicePrice->price = $request->input('price');
        $servicePrice->start_date = $request->input('start_date');
        $servicePrice->save();
        return redirect()->route('servicePrice.index')->withStatus(__("titles.servicePrice_added"));
    }


    public function show(ServicePrice $servicePrice)
    {
        //
    }


    public function edit(ServicePrice $servicePrice)
    {
        $services = Service::all();
        return view('servicePrices.edit',compact('services','servicePrice'));

    }


    public function update(Request $request, ServicePrice $servicePrice)
    {

        $servicePrice->service_id = $request->input('service');
        $servicePrice->price = $request->input('price');
        $servicePrice->start_date = $request->input('start_date');
        $servicePrice->save();
        return redirect()->route('servicePrice.index')->withStatus(__("titles.servicePrice_updated"));
    }

    public function destroy(ServicePrice $servicePrice)
    {

        $servicePrice->delete();
        return redirect()->route("servicePrice.index")->withStatus(__("titles.servicePrice_deleted"));
    }

    public function deleted()
    {
        $servicePrices = ServicePrice::onlyTrashed()->get();
        return view("servicePrices.deleted", compact("servicePrices"));
    }

    public function restore($servicePrice)
    {
        ServicePrice::withTrashed()->find($servicePrice)->restore();
        return redirect()->back()->withStatus(__("titles.servicePrices_restored"));
    }

    public function forceDelete($servicePrice)
    {
        ServicePrice::withTrashed()->find($servicePrice)->forceDelete();
        return redirect()->back()->withStatus(__("titles.servicePrices_deleted"));
    }
}
