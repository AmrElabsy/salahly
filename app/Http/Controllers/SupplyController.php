<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use App\Http\Requests\StoreSupplyRequest;
use App\Http\Requests\UpdateSupplyRequest;
use App\Models\SupplyPrice;

class SupplyController extends Controller
{
    public function index()
    {
        $supplies=Supply::all();
        return view("supplies.index", compact("supplies"));
    }

    public function create()
    {
        return view('supplies.create');
    }

    public function store(StoreSupplyRequest $request)
    {
        $supply = new Supply();
        $supply->name = $request->get("name");
        $supply->save();
    
        $prices = $request->input('prices');
        $start_dates = $request->input('start_dates');
    
        foreach ($prices as $index => $price) {
            $supplyPrice = new SupplyPrice();
            $supplyPrice->price = $price;
            $supplyPrice->start_date = $start_dates[$index];
            $supplyPrice->supply_id = $supply->id;
    
            $supplyPrice->save();
        }

        return redirect()->route("supply.index")->withStatus(__("titles.supply_added"));
    }

    public function show(Supply $supply)
    {
        //
    }

    public function edit(Supply $supply)
    {
        return view('supplies.edit',compact('supply'));
    }

    public function update(UpdateSupplyRequest $request, Supply $supply)
    {
        $supply->name = $request->get("name");
        $supply->save();
        // @TODO: Sync the prices
        return redirect()->route("supply.index")->withStatus(__("titles.supply_updated"));
    }

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
