<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialReturn;
use App\Http\Requests\StoreMaterialReturnRequest;
use App\Http\Requests\UpdateMaterialReturnRequest;

class MaterialReturnController extends Controller
{
    public function index()
    {
        $materialReturns = MaterialReturn::all();
		
		return view("stock.materialreturns.index", compact("materialReturns"));
    }

    public function create()
    {
		$this->authorize("add material_return");
		
        $materials = Material::all();
		
		return view("stock.materialreturns.create", compact("materials"));
    }

    public function store(StoreMaterialReturnRequest $request)
    {
        $materialReturn = new MaterialReturn();
		
		$materialReturn->material_id = $request->get("material_id");
		$materialReturn->amount = $request->get("amount");
		$materialReturn->price = $request->get("price");
		$materialReturn->return_date = $request->get("return_date");
		
		$materialReturn->save();
		
		return redirect()->route("stock.materialreturn.index");
    }

    public function show(MaterialReturn $materialReturn)
    {
        //
    }

    public function edit(MaterialReturn $materialreturn)
    {
        $this->authorize("edit material_return");
		
		$materials = Material::all();
		
		return view("stock.materialreturns.edit", compact("materialreturn", "materials"));
    }

    public function update(UpdateMaterialReturnRequest $request, MaterialReturn $materialreturn)
    {
		$materialreturn->material_id = $request->get("material_id");
		$materialreturn->amount = $request->get("amount");
		$materialreturn->price = $request->get("price");
		$materialreturn->return_date = $request->get("return_date");
	
		$materialreturn->save();
	
		return redirect()->route("stock.materialreturn.index");
    }

    public function destroy(MaterialReturn $materialreturn)
    {
        $materialreturn->delete();
		
		return redirect()->route("stock.materialreturn.index");
	}
}
