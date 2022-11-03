<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class game extends Model
{
    use HasFactory;
    use softDeletes;

    public function products_details(){
        return $this->hasMany(product_detail::class);
    }

    protected $fillable = [
        'game_name',
    ];
}
