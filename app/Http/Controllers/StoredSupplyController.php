<?php

namespace App\Http\Controllers;

use App\Models\StoredSupply;
use App\Http\Requests\StoreStoredSupplyRequest;
use App\Http\Requests\UpdateStoredSupplyRequest;

class StoredSupplyController extends Controller
{
    public function index()
    {
        $storedSupplies = StoredSupply::all();
        return view("stock.supplies.index", compact("storedSupplies"));
    }

    public function create()
    {
        //
    }

    public function store(StoreStoredSupplyRequest $request)
    {
        //
    }

    public function show(StoredSupply $storedSupply)
    {
        //
    }

    public function edit(StoredSupply $storedSupply)
    {
        //
    }

    public function update(UpdateStoredSupplyRequest $request, StoredSupply $storedSupply)
    {
        //
    }

    public function destroy(StoredSupply $storedSupply)
    {
        //
    }
}
