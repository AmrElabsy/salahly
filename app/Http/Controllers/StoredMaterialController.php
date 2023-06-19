<?php

namespace App\Http\Controllers;

use App\Models\StoredMaterial;
use App\Http\Requests\StoreStoredMaterialRequest;
use App\Http\Requests\UpdateStoredMaterialRequest;

class StoredMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStoredMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoredMaterialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StoredMaterial  $storedMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(StoredMaterial $storedMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoredMaterial  $storedMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(StoredMaterial $storedMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoredMaterialRequest  $request
     * @param  \App\Models\StoredMaterial  $storedMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoredMaterialRequest $request, StoredMaterial $storedMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoredMaterial  $storedMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoredMaterial $storedMaterial)
    {
        //
    }
}
