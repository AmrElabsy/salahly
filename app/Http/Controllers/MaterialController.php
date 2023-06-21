<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\MaterialPrice;
use App\Services\MaterialService;

class MaterialController extends Controller
{
    public function __construct(
        public MaterialService $service
    ) {}
    
    public function index()
    {
        $this->authorize("show material");
    
        $materials = Material::all();
        return view("materials.index", compact("materials"));
    }

    public function create()
    {
        $this->authorize("add material");
    
        return view("materials.create");
    }

    public function store(StoreMaterialRequest $request)
    {
        $material = new Material();
        $material->name = $request->get("name");
        $material->save();
    
        $prices = $request->input('prices');
        $start_dates = $request->input('start_dates');
    
        foreach ($prices as $index => $price) {
            $materialPrice = new MaterialPrice();
            $materialPrice->price = $price;
            $materialPrice->start_date = $start_dates[$index];
            $materialPrice->material_id = $material->id;
    
            $materialPrice->save();
        }
        
        return redirect()->route("material.index")->withStatus(__("titles.material_added"));
    }

    public function show(Material $material)
    {
        //
    }

    public function edit(Material $material)
    {
        $this->authorize("edit material");
    
        return view("materials.edit", compact("material"));
    }

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $material->name = $request->get("name");

        $material->save();
        
        $material->prices()->delete();
    
        $prices = $request->input('prices');
        $start_dates = $request->input('start_dates');
    
        foreach ($prices as $index => $price) {
            $materialPrice = new MaterialPrice();
            $materialPrice->price = $price;
            $materialPrice->start_date = $start_dates[$index];
            $materialPrice->material_id = $material->id;
        
            $materialPrice->save();
        }
        return redirect()->route("material.index")->withStatus(__("titles.material_updated"));
    
    }

    public function destroy(Material $material)
    {
        $this->authorize("delete material");
    
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
