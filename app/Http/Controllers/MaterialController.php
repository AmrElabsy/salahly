<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Services\MaterialService;

class MaterialController extends Controller
{
    public function __construct(
        public MaterialService $service
    ) {}
    
    public function index()
    {
        $materials = Material::all();
        return view("materials.index", compact("materials"));
        
    }

    public function create()
    {
        return view("materials.create");

    }

    public function store(StoreMaterialRequest $request)
    {
        
        $material = new Material();
        $material->name = $request->get("name");
        $material->price = $request->get("price");
        
        $material->save();
        
        return redirect()->route("material.index")->withStatus(__("titles.material_added"));
    }

    public function show(Material $material)
    {
        //
    }

    public function edit(Material $material)
    {
        return view("materials.edit", compact("material"));

    }

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $material->name = $request->get("name");
        $material->price = $request->get("price");

        $material->save();
        return redirect()->route("material.index")->withStatus(__("titles.material_updated"));
    
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route("material.index")->withStatus(__("titles.material_deleted"));
    }
    public function deleted() {
        $materials = Material::onlyTrashed()->get();
        return view("materials.deleted", compact("materials"));
    }

    public function restore($material) {
        Material::withTrashed()->find($material)->restore();
        return redirect()->back()->withStatus(__("titles.material_restored"));
    }
    
    public function forceDelete($material) {
        Material::withTrashed()->find($material)->forceDelete();
        return redirect()->back()->withStatus(__("titles.material_deleted"));
    }
}
