<?php

namespace App\Http\Controllers;

use App\Models\MaterialReturn;
use App\Models\Problem;
use App\Models\StoredMaterial;
use App\Models\StoredSupply;
use App\Models\SupplyReturn;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MoneyController extends Controller
{
    public function index() {
		$months = [];
		$current_month = Carbon::now()->format('m');
		for($i = 1; $i <= $current_month; $i++) {
			$month = $this->getMonthData($i);
			$months[] = $month;
		}
		
		return view("money.index", compact("months"));
	}
	
	public function month(int $month) {
		$storedMaterials = StoredMaterial::whereMonth("buying_date", $month)->get();
		$storedSupplies = StoredSupply::whereMonth("buying_date", $month)->get();
		
		$problems = Problem::whereMonth("created_at", $month)->get();
		$materialReturns = MaterialReturn::whereMonth("return_date", $month)->get();
		$supplyReturns = SupplyReturn::whereMonth("return_date", $month)->get();
		
		$month = $this->getMonthData($month);
		return view("money.month", compact("month", "storedMaterials", "storedSupplies", "problems", "materialReturns", "supplyReturns"));
	
	}
	
	private function getMonthData(int $monthNumber) {
		$m = str_pad($monthNumber, 2, '0', STR_PAD_LEFT);
		
		$month["name"] = Carbon::createFromDate(null, $monthNumber)->format('F');
		$month["paying"]["materials"] = 0;
		$month["paying"]["supplies"] = 0;
		$month["income"]["problems"] = 0;
		$month["income"]["material_returns"] = 0;
		$month["income"]["supply_returns"] = 0;
		
		$storedMaterials = StoredMaterial::whereMonth('buying_date', $m)->get();
		$storedSupplies = StoredSupply::whereMonth('buying_date', $m)->get();
		
		$problems = Problem::whereMonth("created_at", $m)->get();
		$materialReturns = MaterialReturn::whereMonth("return_date", $m)->get();
		$supplyReturns = SupplyReturn::whereMonth("return_date", $m)->get();
		
		
		foreach ($storedMaterials as $storedMaterial) {
			$month["paying"]["materials"] += $storedMaterial->price * $storedMaterial->amount;
		}
		
		foreach ($storedSupplies as $storedSupply) {
			$month["paying"]["supplies"] += $storedSupply->price * $storedSupply->amount;
		}
		
		foreach ($problems as $problem) {
			$month["income"]["problems"] += $problem->paid;
		}
		
		foreach ($materialReturns as $materialReturn) {
			$month["income"]["material_returns"] += $materialReturn->amount * $materialReturn->price;
		}
		
		foreach ($supplyReturns as $supplyReturn) {
			$month["income"]["supply_returns"] += $supplyReturn->amount * $supplyReturn->price;
		}
		
		$month["total"] = array_sum($month["income"]) - array_sum($month["paying"]);
		
		return $month;
	}
}
