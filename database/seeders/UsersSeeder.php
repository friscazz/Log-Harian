<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['fullname' => 'john doe','username' => 'john01','password' =>bcrypt('asd'), 'role_id' => 1],
            ['name' => 'jane', 'username' => 'jane01', 'password' =>bcrypt('asd'),'role_id' => 2],
            ['name' => 'carmilla', 'username' => 'carm01','password' =>bcrypt('asd'),'role_id' => 3],
            ['name' => 'agung','username' => 'agun01', 'password' =>bcrypt('asd'),'role_id' => 4],
            ['name' => 'putri', 'username' => 'putr01','password' =>bcrypt('asd'),'role_id' => 5]
        ]);
    }
}
