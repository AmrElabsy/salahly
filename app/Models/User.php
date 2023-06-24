<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "type"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function branches() {
        return $this->belongsToMany(Branch::class)->withTimestamps()->withPivot("deleted_at");
    }
    
    public function attendances(): HasMany {
        return $this->hasMany(Attendance::class);
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
