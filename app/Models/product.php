<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class product extends Model
{
    use HasFactory;
    use softDeletes;
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function product_detail(){
        return $this->belongsTo(product_detail::class);
    }
 
    public function bill(){
        return $this->hasOne(bill::class);
    }

    protected $fillable = [
        'product_id',
        'user_id',
        'total_price',
    ];
}
