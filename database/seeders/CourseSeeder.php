<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('courses')->insert([
            'name'=>'პროგრამიერების საბაზისო კურსი ',
            'type'=>'1',
            'status'=>'current'
        ]);
        DB::table('courses')->insert([
            'name'=>'php',
            'type'=>'2',
            'status'=>'current'
        ]);
         DB::table('courses')->insert([
            'name'=>'javascript ',
            'type'=>'2',
            'status'=>'current'
        ]);
        DB::table('courses')->insert([
            'name'=>'c++',
            'type'=>'2',
            'status'=>'current'
        ]);
        DB::table('courses')->insert([
            'name'=>'java',
            'type'=>'2',
            'status'=>'current'
        ]);
    }
}
