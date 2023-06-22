<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use App\Models\SupplyReturn;
use App\Http\Requests\StoreSupplyReturnRequest;
use App\Http\Requests\UpdateSupplyReturnRequest;

class SupplyReturnController extends Controller
{
	public function index()
	{
		$supplyReturns = SupplyReturn::all();
		
		return view("stock.supplyreturns.index", compact("supplyReturns"));
	}
	
	public function create()
	{
		$this->authorize("add supply_return");
		
		$supplies = Supply::all();
		
		return view("stock.supplyreturns.create", compact("supplies"));
	}
	
	public function store(StoreSupplyReturnRequest $request)
	{
		$supplyReturn = new SupplyReturn();
		
		$supplyReturn->supply_id = $request->get("supply_id");
		$supplyReturn->amount = $request->get("amount");
		$supplyReturn->price = $request->get("price");
		$supplyReturn->return_date = $request->get("return_date");
		
		$supplyReturn->save();
		
		return redirect()->route("stock.supplyreturn.index");
	}
	
	public function show(SupplyReturn $supplyReturn)
	{
		//
	}
	
	public function edit(SupplyReturn $supplyreturn)
	{
		$this->authorize("edit supply_return");
		
		$supplies = Supply::all();
		
		return view("stock.supplyreturns.edit", compact("supplyreturn", "supplies"));
	}
	
	public function update(UpdateSupplyReturnRequest $request, SupplyReturn $supplyreturn)
	{
		$supplyreturn->supply_id = $request->get("supply_id");
		$supplyreturn->amount = $request->get("amount");
		$supplyreturn->price = $request->get("price");
		$supplyreturn->return_date = $request->get("return_date");
		
		$supplyreturn->save();
		
		return redirect()->route("stock.supplyreturn.index");
	}
	
	public function destroy(SupplyReturn $supplyreturn)
	{
		$supplyreturn->delete();
		
		return redirect()->route("stock.supplyreturn.index");
	}
}
