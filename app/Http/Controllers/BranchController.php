<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Services\BranchService;

class BranchController extends Controller
{
    public function __construct(
        public BranchService $service
    ) {}
    
    public function index()
    {
        $this->authorize("show branch");
    
        $branches = Branch::all();
        return view("branches.index", compact("branches"));
    }

    public function create()
    {
        $this->authorize("add branch");
    
        return view("branches.create");
    }

    public function store(StoreBranchRequest $request)
    {
        try {
            $this->service->store($request->all());
            return redirect()->route("branch.index")->withStatus(__("titles.branch_added"));
        } catch ( \Throwable $e) {
            return redirect()->back();
        }
    }

    public function show(Branch $branch)
    {
        //
    }

    public function edit(Branch $branch)
    {
        $this->authorize("edit branch");
    
        return view("branches.edit", compact("branch"));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        try {
            $this->service->update($request->all(), $branch);
            return redirect()->route("branch.index")->withStatus(__("titles.branch_updated"));
        } catch (\Throwable $exception) {
            return redirect()->back();
        }
    }

    public function destroy(Branch $branch)
    {
        $this->authorize("delete branch");
    
        $this->service->delete($branch);
        return redirect()->route("branch.index")->withStatus(__("titles.branch_deleted"));
    }
    
    public function deleted() {
        $branches = Branch::onlyTrashed()->get();
        return view("branches.deleted", compact("branches"));
    }
    
    public function restore($branch) {
        Branch::withTrashed()->find($branch)->restore();
        return redirect()->back()->withStatus(__("titles.category_restored"));
    }
    
    public function forceDelete($branch) {
        Branch::withTrashed()->find($branch)->forceDelete();
        return redirect()->back()->withStatus(__("titles.category_deleted"));
    }
}
