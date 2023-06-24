<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    use HasFactory;
    
    protected $fillable = ["phone", "customer_id"];
    
    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }
}
