<?php

namespace Database\Seeders;



use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  

       

        //    2 ajouts des données statiques 
        $userDatas = [
            [
                'name'=>'Foo',
                'email'=> 'foo.foo@example.com', 
                'password'=>'papamama',
            ],
            [
                'name'=>'Bar',
                'email'=> 'bar.bar@example.com',
                'password'=>'papamamo',
            ],
        ];

        foreach ($userDatas as $userData){
            $user = new User();
            $user->name = $userData["name"];
            $user->email = $userData["email"];
            $user->password = Hash::make($userData["password"]);
            $user->save();


        }
    }
}