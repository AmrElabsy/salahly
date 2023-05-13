<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;
<<<<<<< HEAD


=======
    
    public function problem() {
        return $this->belongsTo(Problem::class);
    }
    
>>>>>>> 973b07cbc376b1a940ab1bfee4bcd823a043a3b0
}
