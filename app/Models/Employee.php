<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function branches(): BelongsToMany {
        return $this->belongsToMany(Branch::class)->withTimestamps()->withPivot("deleted_at");
    }
    
    public function attendances(): HasMany {
        return $this->hasMany(Attendance::class);
    }
    
    public function holidays(): HasMany {
        return $this->hasMany(Holiday::class);
    }
    
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    
    public function problems() {
        return $this->hasMany(Problem::class);
    }
    
    public function attended($day){
        return $this->attendances()->whereDate('created_at', $day)->where("type", 0)->exists();
    }
    
    public function attendanceTime($day) {
        return $this->attendances()->whereDate('created_at', $day)->where("type", 0)->first()->created_at->format("h:i:s A");
    }
    
    public function left($day) {
        return $this->attendances()->whereDate('created_at', $day)->where("type", 1)->exists();
    }

    public function leavingTime($day) {
        return $this->attendances()->whereDate('created_at', $day)->where("type", 1)->first()->created_at->format("h:i:s A");
    }
    
    public function isHoliday($day) {
        return false;
    }
    
}
