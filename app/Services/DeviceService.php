<?php
    
    namespace App\Services;
    
    use App\Models\Customer;
    use App\Models\Device;
    use Illuminate\Database\Eloquent\Model;

    class DeviceService implements IResourceService
    {
        public function store( $data ) {
            $device = new Device();
            $device->name = $data["device_name"];
            if(isset($data["is_new_customer"]) && $data["is_new_customer"] == "on") {
                $customerService = new CustomerService();
                $customer = $customerService->store($data);
                $device->customer_id = $customer->id;
            } else {
                $device->customer_id = $data["customer_id"];
            }
            $device->save();
        }
    
        public function update( $data, Model $resource ) {
            $resource->name = $data["device_name"];
            $resource->customer_id = $data["customer_id"];
            $resource->save();
        }
    }