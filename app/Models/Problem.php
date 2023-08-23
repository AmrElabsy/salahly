<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Problem extends Model
{
    use HasFactory;

    public function device(): BelongsTo {
        return $this->belongsTo(Device::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function branch(): BelongsTo {
        return $this->belongsTo(Branch::class);
    }

    public function status(): BelongsTo {
        return $this->belongsTo(Status::class);
    }

    public function materials(): BelongsToMany {
        return $this->belongsToMany(Material::class)->withTimestamps()->withPivot("deleted_at", "price");
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class)->withTimestamps()->withPivot("deleted_at");
    }
    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
    public function getCostAttribute(): int {
        return $this->materials->sum("pivot.price");
    }

    public function getDueTimeIsTodayAttribute(){
        return Carbon::parse($this->due_time)->isToday();
    }

    public function getDueTimeHasPassedAttribute() {
        return Carbon::parse($this->due_time)->isPast();
    }


}
