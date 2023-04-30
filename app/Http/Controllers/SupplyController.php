<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use App\Http\Requests\StoreSupplyRequest;
use App\Http\Requests\UpdateSupplyRequest;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies=Supply::all();
        return view("supplies.index", compact("supplies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupplyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplyRequest $request)
    {

        $supply = new Supply();
        $supply->name = $request->get("name");
        $supply->price = $request->get("price");

        $supply->save();

        return redirect()->route("supply.index")->withStatus(__("titles.supply_added"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        return view('supplies.edit',compact('supply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupplyRequest  $request
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplyRequest $request, Supply $supply)
    {
        $supply->name = $request->get("name");
        $supply->price = $request->get("price");

        $supply->save();
        return redirect()->route("supply.index")->withStatus(__("titles.supply_updated"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {

        $supply->delete();
        return redirect()->route("supply.index")->withStatus(__("titles.supply_deleted"));
    }
    public function deleted() {
        $supplies = Supply::onlyTrashed()->get();
        return view("supplies.deleted", compact("supplies"));
    }

    public function restore($supply) {
        Supply::withTrashed()->find($supply)->restore();
        return redirect()->back()->withStatus(__("titles.supply_restored"));
    }

    public function forceDelete($supply) {
        Supply::withTrashed()->find($supply)->forceDelete();
        return redirect()->back()->withStatus(__("titles.supply_deleted"));
    }
}
