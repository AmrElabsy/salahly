<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    public function __construct(
        public CustomerService $service
    )
    {}
    
    public function index()
    {
        $customers=Customer::all();
        return view('customers.index',compact('customers'));
    }
    
    public function create()
    {
        return view("customers.create");
    }

    public function store(StoreCustomerRequest $request)
    {
        try {
            $this->service->store($request->all());
        } catch (\Throwable $e) {
        
        }
        return redirect()->route("customer.index")->withStatus(__("titles.customer_added"));
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        return view("customers.edit", compact("customer"));

    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        try {
            $this->service->update($request->all(), $customer);
        } catch (\Throwable $exception) {
        
        }
        return redirect()->route("customer.index")->withStatus(__("titles.customer_updated"));
    
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route("customer.index")->withStatus(__("titles.customer_deleted"));
    }
    
    public function deleted() {
        $customers = Customer::onlyTrashed()->get();
        return view("customers.deleted", compact("customers"));
    }

    public function restore($customer) {
        Customer::withTrashed()->find($customer)->restore();
        return redirect()->back()->withStatus(__("titles.customer_restored"));
    }
    
    public function forceDelete($customer) {
        Customer::withTrashed()->find($customer)->forceDelete();
        return redirect()->back()->withStatus(__("titles.customer_deleted"));
    }
}
