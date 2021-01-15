<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    //
     function home()
    {
        $posts=Post::
        orderBy('created_at','desc')
        ->limit(4)
        ->get()
        ;
        $first=true;
     
        return  view('home',['posts'=> $posts,'first'=>$first]);
        
    }
}
