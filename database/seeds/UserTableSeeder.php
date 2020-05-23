<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name= "osman";
        $user->email= "osman9812@hotmail.com";
        $user->password = bcrypt('@armando9812');
        $user->save();
    }
}
