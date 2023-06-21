<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Device;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use App\Services\DeviceService;

class DeviceController extends Controller
{
    public function __construct(
        public DeviceService $service
    ) {}
    
    public function index()
    {
        $this->authorize("show device");
    
        $devices = Device::all();
        return view("devices.index", compact("devices"));
    }

    public function create()
    {
        $this->authorize("add device");
    
        $customers = Customer::all();
        return view("devices.create", compact("customers"));
    }

    public function store(StoreDeviceRequest $request)
    {
        try {
            $this->service->store($request->all());
        } catch (\Exception $e) {
        
        }
        return redirect()->route("device.index")->withStatus("titles.device_added");
    }

    public function show(Device $device)
    {
        //
    }

    public function edit(Device $device)
    {
        $this->authorize("edit device");
    
        $customers = Customer::all();
        return view("devices.edit", compact("device", "customers"));
    }

    public function update(UpdateDeviceRequest $request, Device $device)
    {
        try {
            $this->service->update($request->all(), $device);
        } catch (\Exception $e) {
        
        }
        return redirect()->route("device.index")->withStatus("titles.device_updated");
    }

    public function destroy(Device $device)
    {
        $this->authorize("delete device");
    
        $device->delete();
        return redirect()->route("device.index")->withStatus(__("titles.device_deleted"));
    }
    
    public function deleted() {
        $devices = Device::onlyTrashed()->get();
        return view("Devices.deleted", compact("devices"));
    }
    
    public function restore($device) {
        Device::withTrashed()->find($device)->restore();
        return redirect()->back()->withStatus(__("titles.device_restored"));
    }
    
    public function forceDelete($device) {
        Device::withTrashed()->find($device)->forceDelete();
        return redirect()->back()->withStatus(__("titles.device_deleted"));
    }
}
