<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;

    public function phones(): HasMany {
        return $this->hasMany(Phone::class);
    }

    public function devices(): HasMany {
        return $this->hasMany(Device::class);
    }
    public function getPhoneAttribute()
    {
        if (isset($this->phones[0]))
        {
            return $this->phones[0]->phone;
        }
        return null;
    }
}
