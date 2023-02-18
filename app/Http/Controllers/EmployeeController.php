<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    public function __construct(
        public EmployeeService $service
    )
    {}
    
    public function index()
    {
        $employees = Employee::all();
        return view("employees.index", compact("employees"));
    }

    public function create()
    {
        $branches = Branch::all();
        return view("employees.create", compact("branches"));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->service->store($request->all());
        return redirect()->route("employee.index")->withStatus(__("titles.employee_added"));
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit(Employee $employee)
    {
        $branches = Branch::all();
        return view("employees.edit", compact("employee", "branches"));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->service->update($request->all(), $employee);
        return redirect()->route("employee.index")->withStatus(__("titles.employee_updated"));
    
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back()->withStatus(__("titles.employee_deleted"));
    }
    
    public function deleted() {
        $employees = Employee::onlyTrashed()->get();
        return view("employees.deleted", compact("employees"));
    }
    
    public function restore($employee) {
        Employee::withTrashed()->find($employee)->restore();
        return redirect()->back()->withStatus(__("titles.employee_restored"));
    }
    
    public function forceDelete($employee) {
        Employee::withTrashed()->find($employee)->forceDelete();
        return redirect()->back()->withStatus(__("titles.employee_deleted"));
    }
    
}
