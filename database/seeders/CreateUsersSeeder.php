<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'gender' => 'ชาย',
                'password' => bcrypt('12345'),
                'user_pfp' => 'default_pfp.png'

            ],
            [
                'name' => 'User',
                'balance' =>10000,
                'email' => 'user@user.com',
                'is_admin' => '0',
                'gender' => 'หญิง',
                'password' => bcrypt('1234'),
                'user_pfp' => 'default_pfp.png'
            ]
        ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
