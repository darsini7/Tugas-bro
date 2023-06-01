<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id'=> 1, 'name' => 'elisoft', 'email' => 'elisofttech@test.com', 'password' => Hash::make('12345678'), 'status' => 1],
            ['id'=> 2, 'name' => 'darsini', 'email' => 'darsini04@test.com', 'password' => Hash::make('suni040622'), 'status' => 2],
        ];
        DB::table('users')->insert($data);
    }
}