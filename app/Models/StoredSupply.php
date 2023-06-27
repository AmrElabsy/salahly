<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredSupply extends Model
{
    use HasFactory;
    
    public function supply() {
        return $this->belongsTo(Supply::class);
    }
    
    public function getPriceAttribute() {
        $supply = $this->supply;
        $buyingDate = $this->buying_date;
    
        $price = SupplyPrice::where('supply_id', $supply->id)
            ->where('start_date', '<', $buyingDate)
            ->orderBy('start_date', 'desc')
            ->first();
        
        return $price?->price;
    }
}
