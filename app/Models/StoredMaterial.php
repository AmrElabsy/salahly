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
}
