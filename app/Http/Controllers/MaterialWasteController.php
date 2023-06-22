<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialWaste;
use App\Http\Requests\StoreMaterialWasteRequest;
use App\Http\Requests\UpdateMaterialWasteRequest;

class MaterialWasteController extends Controller
{
	public function index()
	{
		$materialWastes = MaterialWaste::all();
		
		return view("stock.materialwastes.index", compact("materialWastes"));
	}
	
	public function create()
	{
		$this->authorize("add material_waste");
		
		$materials = Material::all();
		
		return view("stock.materialwastes.create", compact("materials"));
	}
	
	public function store(StoreMaterialWasteRequest $request)
	{
		$materialWaste = new MaterialWaste();
		
		$materialWaste->material_id = $request->get("material_id");
		$materialWaste->amount = $request->get("amount");
		
		$materialWaste->save();
		
		return redirect()->route("stock.materialwaste.index");
	}
	
	public function show(MaterialWaste $materialWaste)
	{
		//
	}
	
	public function edit(MaterialWaste $materialwaste)
	{
		$this->authorize("edit material_waste");
		
		$materials = Material::all();
		
		return view("stock.materialwastes.edit", compact("materialwaste", "materials"));
	}
	
	public function update(UpdateMaterialWasteRequest $request, MaterialWaste $materialwaste)
	{
		$materialwaste->material_id = $request->get("material_id");
		$materialwaste->amount = $request->get("amount");
		
		$materialwaste->save();
		
		return redirect()->route("stock.materialwaste.index");
	}
	
	public function destroy(MaterialWaste $materialwaste)
	{
		$materialwaste->delete();
		
		return redirect()->route("stock.materialwaste.index");
	}
}
