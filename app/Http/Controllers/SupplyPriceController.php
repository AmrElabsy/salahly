<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use Illuminate\Http\Request;
use App\Models\SupplyPrice;
class SupplyPriceController extends Controller
{

    public function index()
    {
        $supplyPrices = SupplyPrice::all();
        return view('supplyPrices.index',compact('supplyPrices'));
    }

    public function create()
    {
        $supplies = Supply::all();
        return view('supplyPrices.create',compact('supplies'));
    }


    public function store(Request $request)
    {
        $supplyPrice = new SupplyPrice();
        $supplyPrice->supply_id = $request->input('supply');
        $supplyPrice->price = $request->input('price');
        $supplyPrice->start_date = $request->input('start_date');
        $supplyPrice->save();
        return redirect()->route('supplyPrice.index')->withStatus(__("titles.supplyPrice_added"));
    }

    public function show($id)
    {
        //
    }

    public function edit(SupplyPrice $supplyPrice)
    {
//        $supplyPrice = SupplyPrice::findOrFail($id);
        $supplies = Supply::all();
        return view('supplyPrices.edit',compact('supplies','supplyPrice'));
    }


    public function update(Request $request, SupplyPrice $supplyPrice)
    {
        $supplyPrice->supply_id = $request->input('supply');
        $supplyPrice->price = $request->input('price');
        $supplyPrice->start_date = $request->input('start_date');
        $supplyPrice->save();
        return redirect()->route('supplyPrice.index')->withStatus(__("titles.supplyPrice_updated"));

    }


    public function destroy(SupplyPrice $supplyPrice)
    {
        $supplyPrice->delete();
        return redirect()->route("supplyPrice.index")->withStatus(__("titles.supplyPrice_deleted"));

    }
    public function deleted() {
        $supplyPrices = SupplyPrice::onlyTrashed()->get();
        return view("supplyPrices.deleted", compact("supplyPrices"));
    }

    public function restore($supplyPrice) {
        SupplyPrice::withTrashed()->find($supplyPrice)->restore();
        return redirect()->back()->withStatus(__("titles.supplyPrices_restored"));
    }

    public function forceDelete($supplyPrice) {
        SupplyPrice::withTrashed()->find($supplyPrice)->forceDelete();
        return redirect()->back()->withStatus(__("titles.supplyPrices_deleted"));
    }
}
