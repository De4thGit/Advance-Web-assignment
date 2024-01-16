<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin: userLevel =1, BU: userLevel=2, developer: userLevel=3 , manager: userLevel=4
        $users = [ 
            [ 
                'name'=>'Admin User', 
                'email'=>'admin@uniten.edu.my', 
                'password'=> bcrypt('admin'), 
                'user_level' => 1 
            ], 

            [ 
                'name'=>'Business unit 1 ', 
                'email'=>'1@uniten.edu.my', 
                'password'=> bcrypt('Bu123'), 
                'user_level' => 2,
                'business_unit_id' => 1

            ], 

            [ 
                'name'=>'Business unit 2 ', 
                'email'=>'2@uniten.edu.my', 
                'password'=> bcrypt('Bu123'), 
                'user_level' => 2,
                'business_unit_id' => 2

            ], 

            [ 
                'name'=>'Business unit 3 ', 
                'email'=>'3@uniten.edu.my', 
                'password'=> bcrypt('Bu123'), 
                'user_level' => 2,
                'business_unit_id' => 3

            ], 

            [ 
                'name'=>'Developer User', 
                'email'=>'De@uniten.edu.my', 
                'password'=> bcrypt('De123'), 
                'user_level' => 3 
            ], 

            [ 
                'name'=>'Manager User', 
                'email'=>'Ma@uniten.edu.my', 
                'password'=> bcrypt('Ma123'), 
                'user_level' => 4 
            ], 

        ]; 

        // foreach item in the $users array (above), create user 
        foreach ($users as $key => $user) {
	        User::create($user); 
        }
    }
}
