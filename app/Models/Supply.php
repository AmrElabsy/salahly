<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supply extends Model
{
    use HasFactory,SoftDeletes;
    
    public function prices() {
        return $this->hasMany(SupplyPrice::class);
    }
}
