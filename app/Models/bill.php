<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bill extends Model
{
    use HasFactory;
    use softDeletes;

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(product::class);
    }
    protected $fillable = [
        'totalprice',
        'user_id',
        'product_id'
    ];
  

}
