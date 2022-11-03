<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\game;

class Games extends Seeder
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
                'game_name' => 'Valorant',
                'game_thmb' => 'VALportrait_1200x1600-74261a10f40a6a5015f069ddb7aa910c.jpg',
                'detail' => 'ซื้อ Valorant Riot pin card',
            ],
            [
                'game_name' => 'League of Legends',
                'game_thmb' => '87a1ef48e43b8cf114017e3ad51b801951b20fcf.jpg',
                'detail' => 'ซื้อ League of Legends Riot pin card'
            ],
        ];
        foreach($user as $key => $value){
            game::create($value);
        }
    }
}
