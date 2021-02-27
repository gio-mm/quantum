<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Group;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Support\Facades\DB;



use PhpParser\Node\Stmt\Foreach_;

class adminController extends Controller
{
    
   public function index(){
        
    
        $countUsers=User::all()->count();
        $countGroups=Group::all()->count();
        $countPosts=Post::all()->count();
        $messages=Message::where('type','prog')->get();
        
        return view('admin.dash',['countUsers'=> $countUsers,'messages'=> $messages,'countGroups'=>$countGroups,'countPosts'=>$countPosts]);
    }
    function addMemberPage($id=null){
        // $groups=Group::all();
        $groups=Group::join('courses', 'courses.id', '=', 'groups.course_id')
        ->select('groups.id as groups_id','groups.name  as group_name','days','courses.name as course' )
        ->orderBy('groups_id')->get();
 
      
        return view('admin.addMember',['groups'=>$groups]);
    }
    function addMember(Request $req){
        
        $validatedData=$req->validate([
            "email"=>"required|email",
        ]);
        $group=Group::where( 'name',$req->groupName)->first();
        $user=User::where( 'email',$req->email)->first();
        
        if($user){
            DB::table('group_user')->insert([
                'user_id' => $user->id,
                'group_id' => $group->id
            ]);
        }
       
        return redirect('admin/addMember');
    }

  
    function search(Request $request){
        // dd($request->s);
        $users=DB::table('users')
        ->where('name', 'like', '%'.$request->s.'%')
        ->orWhere('lastname','like', '%'.$request->s.'%')
        ->orWhere('email','like', '%'.$request->s.'%')
        ->offset(0)
        ->limit(20)
        
        ->get();

        $groups=DB::table('groups')
        ->where('name', 'like', '%'.$request->s.'%')
        ->offset(0)
        ->limit(20)
        ->get();
        // $result=array_merge( $users, $groups)
        return view('/admin/search',['users'=> $users,'groups'=> $groups]);
    }
   function addUser(){

   }
       
}


