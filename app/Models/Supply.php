<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supply extends Model
{
    use HasFactory;
    
    public function prices() {
        return $this->hasMany(SupplyPrice::class);
    }
    
    public function storedSupplies() {
        return $this->hasMany(StoredSupply::class);
    }
	
	public function supplyReturns() {
		return $this->hasMany(SupplyReturn::class);
	}
    
    public function getAmountAttribute()
    {
        return $this->storedSupplies()->sum('amount')
			- $this->supplyReturns()->sum('amount');
    }
}
