<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<10;$i++){
        DB::table('users')->insert([
            'name' => Str::random(5),
            'lastname' => Str::random(5),
            'birthday' => '2000-12-12',

            'email' => Str::random(5).'@gmail.com',
            'phone' => "599".rand(100000,700000),
            'password' => Hash::make('password'),
        ]);
        }
    }
}
