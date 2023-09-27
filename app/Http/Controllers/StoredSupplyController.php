<?php

    namespace App\Http\Controllers;

    use App\Models\Supply;
    use App\Models\StoredSupply;
    use App\Http\Requests\StoreStoredSupplyRequest;
    use App\Http\Requests\UpdateStoredSupplyRequest;

    class StoredSupplyController extends Controller
    {
        public function index()
        {
            $this->authorize("show stored_supply");

            $supplies = Supply::all();
            return view("stock.supplies.index", compact("supplies"));
        }

        public function create()
        {
            $this->authorize("add stored_supply");

            $supplies = Supply::all();

            return view("stock.supplies.create", compact("supplies"));
        }

        public function store(StoreStoredSupplyRequest $request)
        {
            $storedSupply = new StoredSupply();
            
            if ( Supply::where('id', $request->supply_id)->exists() ) {
                $storedSupply->supply_id = $request->get("supply_id");
            } else {
                $supply = new Supply();
                $supply->name = $request->supply_id;
                $supply->save();
                $storedSupply->supply_id = $supply->id;
            }

            $storedSupply->amount = $request->get("amount");
            $storedSupply->price = $request->get("price");

            $storedSupply->buying_date = $request->get("buying_date");

            $storedSupply->save();

            return redirect()->route("stock.supply.index");
        }

        public function show(Supply $supply)
        {
            return view("stock.supplies.show", compact("supply"));
        }

        public function edit(StoredSupply $supply)
        {
            $this->authorize("edit stored_supply");

            $supplies = Supply::all();
            return view("stock.supplies.edit", compact("supply", "supplies"));
        }

        public function update(UpdateStoredSupplyRequest $request, StoredSupply $supply)
        {
            $supply->supply_id = $request->get("supply_id");
            $supply->amount = $request->get("amount");
            $supply->price = $request->get("price");
            $supply->buying_date = $request->get("buying_date");

            $supply->save();

            return redirect()->route("stock.supply.index");
        }

        public function destroy(StoredSupply $supply)
        {
            $this->authorize("delete stored_supply");

            $supply->delete();

            return redirect()->route("stock.supply.index");
        }
    }
