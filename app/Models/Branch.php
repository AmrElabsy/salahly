<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory;
    
    public function problems() {
        return $this->hasMany(Problem::class);
    }
    
    
    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot("deleted_at");
    }
}
