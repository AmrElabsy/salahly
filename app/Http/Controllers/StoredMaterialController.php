<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\StoredMaterial;
use App\Http\Requests\StoreStoredMaterialRequest;
use App\Http\Requests\UpdateStoredMaterialRequest;

class StoredMaterialController extends Controller
{
    public function index()
    {
        $this->authorize("show stored_material");
    
        $materials = Material::all();
        return view("stock.materials.index", compact("materials"));
    }

    public function create()
    {
        $this->authorize("add stored_material");
    
        $materials = Material::all();
    
        return view("stock.materials.create", compact("materials"));
    }

    public function store(StoreStoredMaterialRequest $request)
    {
        $storedMaterial = new StoredMaterial();
        
        $storedMaterial->material_id = $request->get("material_id");
        $storedMaterial->amount = $request->get("amount");
        $storedMaterial->buying_date = $request->get("buying_date");
        
        $storedMaterial->save();
        
        return redirect()->route("stock.material.index");
    }

    public function show(Material $material)
    {
        return view("stock.materials.show", compact("material"));
    }

    public function edit(StoredMaterial $material)
    {
        $this->authorize("edit stored_material");
    
        $materials = Material::all();
        return view("stock.materials.edit", compact("material", "materials"));
    }

    public function update(UpdateStoredMaterialRequest $request, StoredMaterial $material)
    {
        $material->material_id = $request->get("material_id");
        $material->amount = $request->get("amount");
        $material->buying_date = $request->get("buying_date");
    
        $material->save();
    
        return redirect()->route("stock.material.index");
    }

    public function destroy(StoredMaterial $material)
    {
        $this->authorize("delete stored_material");
    
        $material->delete();
    
        return redirect()->route("stock.material.index");
    }
}
