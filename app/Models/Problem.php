<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Problem extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function device(): BelongsTo {
        return $this->belongsTo(Device::class);
    }
    
    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
    
    public function branch(): BelongsTo {
        return $this->belongsTo(Branch::class);
    }
    
    public function status(): BelongsTo {
        return $this->belongsTo(Status::class);
    }
    
    public function materials(): BelongsToMany {
        return $this->belongsToMany(Material::class)->withPivot("price");
    }
    
    public function getCostAttribute(): int {
        return $this->materials->sum("pivot.price");
    }
}
