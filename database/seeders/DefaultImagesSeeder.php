<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DefaultImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    $names=['vue','c_sharp','cpp','laravel','react','python','javascript','c','php'];
    $links=Storage::files('public/images/default_images');
    for($i=0,$c=count($links);$i<$c;$i++){

        DB::table('default_images')->insert([
            'name' => $names[$i],
            'img' => $links[$i],
            
        ]);
    }
    }
}