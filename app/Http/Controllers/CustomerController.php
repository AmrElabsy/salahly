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
        $this->authorize("show customer");
    
        $customers = Customer::all();
        return view('customers.index',compact('customers'));
    }
    
    public function create()
    {
        $this->authorize("add customer");
    
        return view("customers.create");
    }

    public function store(StoreCustomerRequest $request)
    {
        try {
            $this->service->store($request->all());
            return redirect()->route("customer.index")->withStatus(__("titles.customer_added"));
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        $this->authorize("edit customer");
    
        return view("customers.edit", compact("customer"));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        try {
            $this->service->update($request->all(), $customer);
            return redirect()->route("customer.index")->withStatus(__("titles.customer_updated"));
        } catch (\Throwable $exception) {
            return redirect()->back();
        }
    
    }

    public function destroy(Customer $customer)
    {
        $this->authorize("delete customer");
    
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
