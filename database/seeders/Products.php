<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product_detail;

class Products extends Seeder
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
                'product_name' => 'Valorant 1945 Point',
                'price' =>420,
                'game_id' => 1,
                

            ],
            [
                'product_name' => 'Valorant 2485 Point',
                'price' =>540,
                'game_id' => 1,
            ],
            [
                'product_name' => 'Valorant 3075 Point',
                'price' =>680,
                'game_id' => 1,
            ],
            [
                'product_name' => 'Valorant 3890 Point',
                'price' =>840,
                'game_id' => 1,
            ],
            [
                'product_name' => 'Valorant 4430 Point',
                'price' =>931,
                'game_id' => 1,
            ],
            [
                'product_name' => 'Valorant 5835 Point',
                'price' =>1197,
                'game_id' => 1,
            ],
            [
                'product_name' => 'Valorant 7780 Point',
                'price' =>1428,
                'game_id' => 1,
            ],
            [
                'product_name' => 'Valorant 11790 Point',
                'price' =>1785,
                'game_id' => 1,
            ],[
                'product_name' => 'League of Legends 250 point',
                'price' =>50,
                'game_id' => 2,
                
            ],
            [
                'product_name' => 'League of Legends 450 point',
                'price' =>90,
                'game_id' => 2,
            ],
            [
                'product_name' => 'League of Legends 780 point',
                'price' =>150,
                'game_id' => 2,
            ],
            [
                'product_name' => 'League of Legends 1570 point',
                'price' =>300,
                'game_id' => 2,
            ],
            [
                'product_name' => 'League of Legends 3961 point',
                'price' =>500,
                'game_id' => 2,
            ],
            [
                'product_name' => 'League of Legends 5400 point',
                'price' =>1000,
                'game_id' => 2,
            ],
            [
                'product_name' => 'League of Legends 10,990 point',
                'price' =>2000,
                'game_id' => 2,
            ],
            
        ];
        foreach($user as $key => $value){
            product_detail::create($value);
        }
    }
}
