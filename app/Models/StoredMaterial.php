<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredMaterial extends Model
{
    use HasFactory;
    
    public function material() {
        return $this->belongsTo(Material::class);
    }
	
	public function getPriceAttribute() {
		$material = $this->material;
		$buyingDate = $this->buying_date;
		
		$price = MaterialPrice::where('material_id', $material->id)
			->where('start_date', '<', $buyingDate)
			->orderBy('start_date', 'desc')
			->first();
		
		return $price?->price;
		
	}
}
