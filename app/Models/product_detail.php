<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class product_detail extends Model
{
    use HasFactory;
    use softDeletes;
    public function game(){
        return $this->belongsTo(game::class);
    }
    public function products(){
        return $this->hasMany(product::class);
    }
    public function usersComment(){
        return $this->hasMany(usersComment::class);
    }

    protected $fillable = [
        'product_name',
        'price',
        'game_id',
    ];
}
