<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class usersComment extends Model
{
    use HasFactory;
    use softDeletes;

    
    public function product_detail(){
        return $this->belongsTo(product_detail::class);

    }
    public function user(){
        return $this->belongsTo(User::class);

    }
}
