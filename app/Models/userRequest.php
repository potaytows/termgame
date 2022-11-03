<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class userRequest extends Model
{
    use HasFactory;
    use softDeletes;

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Transaction(){
        return $this->belongsTo(transaction::class);
    }
    
    protected $fillable = [
        'user_id',
        'transaction_id',
        'status',
        'reqamount',
        'slip_image',
    ];
    
}
