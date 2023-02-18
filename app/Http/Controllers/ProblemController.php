<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Device;
use App\Models\Problem;
use App\Http\Requests\StoreProblemRequest;
use App\Http\Requests\UpdateProblemRequest;
use App\Models\Status;
use App\Services\ProblemService;

class ProblemController extends Controller
{
    public function __construct(
        public ProblemService $service
    )
    {}
    
    public function index()
    {
        $problems = Problem::all();
        $statuses = Status::all();
        return view("problems.index", compact("problems", "statuses"));
    }

    public function create()
    {
        $devices = Device::all();
        $statuses = Status::all();
        $customers = Customer::all();
        
        return view("problems.create", compact("devices", "statuses", "customers"));
    }

    public function store(StoreProblemRequest $request)
    {
        $this->service->store($request->all());
        return redirect()->route("problem.index")->withStatus(__("titles.problem_added"));
    }

    public function show(Problem $problem)
    {
        //
    }

    public function edit(Problem $problem)
    {
        $devices = Device::all();
        $statuses = Status::all();
    
        return view("problems.edit", compact("problem","devices", "statuses"));
    }

    public function update(UpdateProblemRequest $request, Problem $problem)
    {
        $this->service->update($request->all(), $problem);
        return redirect()->route("problem.index")->withStatus(__("titles.problem_updated"));
    }

    public function destroy(Problem $problem)
    {
        $problem->delete();
        return redirect()->route("problem.index")->withStatus(__("titles.problem_deleted"));
    }
}
