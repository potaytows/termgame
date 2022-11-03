<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction extends Model
{
    use HasFactory;
    use softDeletes;
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Request(){
        return $this->hasOne(userRequest::class);
    }

    
    protected $fillable = [
        'user_id',
        'amount',
    ];

}
