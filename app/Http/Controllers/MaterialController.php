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
        return view("");
    }

    public function create()
    {
        //
    }

    public function store(StoreMaterialRequest $request)
    {
        //
    }

    public function show(Material $material)
    {
        //
    }

    public function edit(Material $material)
    {
        //
    }

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        //
    }

    public function destroy(Material $material)
    {
        //
    }
}
