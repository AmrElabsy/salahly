<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicePrice extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->belongsTo(Service::class);
    }}
