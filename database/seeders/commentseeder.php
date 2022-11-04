<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\usersComment;


class commentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'user_id' => 2,
                'product_detail_id' => 3,
                'comment' => 'This product is really good!'
            ],
           
        ];
        foreach($user as $key => $value){
            usersComment::create($value);
        }
    }
}
