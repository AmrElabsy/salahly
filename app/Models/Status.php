<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory;
	
	public const DONE = "5";
    
    public function problems() {
        return $this->hasMany(Problem::class);
    }
    
}
