<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class adminIndex extends Controller
{
    function index(){
        $countUsers=User::all()->count();
        return view('admin.dash',['countUsers'=> $countUsers]);
    }
}
