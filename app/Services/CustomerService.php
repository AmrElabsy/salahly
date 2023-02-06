<?php
    
    namespace App\Services;
    
    use App\Models\Customer;
    use App\Models\Phone;
    use Illuminate\Database\Eloquent\Model;

    class CustomerService implements IResourceService
    {
        public function store( $data ) {
            $customer = new Customer();
            $customer->name= $data["name"];
            $customer->save();
    
            $this->storePhones($customer, $data["phones"]);
        }
    
        public function update( $data, Model $resource ) {
            $resource->name = $data["name"];
            $resource->save();

            $resource->phones()->delete();
            $this->storePhones($resource, $data["phones"]);
        }
        
        public function storePhones($resource, $phones) {
            foreach ($phones as $num ) {
                $phone = new Phone();
                $phone->phone = $num;
                $phone->customer_id = $resource->id;
                $phone->save();
            }
        }
    }