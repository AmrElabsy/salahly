<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory;
    
    public function problems() {
        return $this->belongsToMany(Problem::class)->withTimestamps()->withPivot("deleted_at");
    }
    
    public function prices() {
        return $this->hasMany(MaterialPrice::class);
    }
    
    public function price() {
        return $this->hasOne(MaterialPrice::class)->latest();
    }
    
    public function storedMaterials()
    {
        return $this->hasMany(StoredMaterial::class);
    }
	
	public function materialReturns() {
		return $this->hasMany(MaterialReturn::class);
	}
	
	public function materialWastes() {
		return $this->hasMany(MaterialWaste::class);
	}
    
    public function getAmountAttribute()
    {
        return $this->storedMaterials()->sum('amount')
			- $this->materialReturns()->sum('amount')
			- $this->materialWastes()->sum('amount')
			- $this->problems()->count();
    }
}
