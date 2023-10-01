<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Models\User;
use App\Services\LoanService;

class LoanController extends Controller
{
    public function __construct(
        public LoanService $service
    ) {}
    
    public function index()
    {
        $loans = Loan::all();
        
        return view('loans.index', compact('loans'));
        
    }

    public function create()
    {
        $employees = User::employees()->get();
        
        return view('loans.create', compact('employees'));
    }

    public function store(StoreLoanRequest $request)
    {
        try {
            $this->service->store($request->all());
            return redirect()->route("loan.index")->withStatus(__("titles.loan_added"));
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back();
        }
    }

    public function show(Loan $loan)
    {
        //
    }

    public function edit(Loan $loan)
    {
        $employees = User::employees()->get();
        return view("loans.edit", compact('loan', "employees"));
    
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        try {
            $this->service->update($request->all(), $loan);
            return redirect()->route("loan.index")->withStatus(__("titles.loan_updated"));
        } catch (\Throwable $exception) {
    
            return redirect()->back();
        }
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        
        return redirect()->route("loan.index")->withStatus(__("titles.loan_deleted"));
    }
}
