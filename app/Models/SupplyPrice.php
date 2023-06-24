<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplyPrice extends Model
{
    use HasFactory;
    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }
}
