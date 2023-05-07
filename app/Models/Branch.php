<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function problems() {
        return $this->hasMany(Problem::class);
    }
    
    public function employees() {
        return $this->belongsToMany(Employee::class);
    }
}
