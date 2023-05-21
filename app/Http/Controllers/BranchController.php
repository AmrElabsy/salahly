<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view("branches.index", compact("branches"));
    }

    public function create()
    {
        return view("branches.create");
    }

    public function store(StoreBranchRequest $request)
    {
        $branch = new Branch();
        $branch->name = $request->get("name");
        $branch->save();
        
        return redirect()->route("branch.index")->withStatus(__("titles.branch_added"));
    }

    public function show(Branch $branch)
    {
        //
    }

    public function edit(Branch $branch)
    {
        return view("branches.edit", compact("branch"));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->name = $request->get("name");
        $branch->save();
        return redirect()->route("branch.index")->withStatus(__("titles.branch_updated"));
        }

    public function destroy(Branch $branch)
    {
        $branch->delete();
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
