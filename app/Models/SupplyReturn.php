<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyReturn extends Model
{
    use HasFactory;
	
	public function supply() {
		return $this->belongsTo(Supply::class);
	}
}
