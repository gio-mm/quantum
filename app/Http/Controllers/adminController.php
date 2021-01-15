<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Group;
use App\Models\Message;
use Illuminate\Support\Facades\DB;



use PhpParser\Node\Stmt\Foreach_;

class adminController extends Controller
{
    
    function index(){
        
    
        $countUsers=User::all()->count();
        $messages=Message::where('type','prog')->get();
        
        return view('admin.dash',['countUsers'=> $countUsers,'messages'=> $messages]);
    }
    function addMemberPage($id=null){
        $groups=Group::all();
      
 
      
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
    function addGroupPage(){
        $courses=Course::all();
        return view('admin.groups',['courses'=>$courses]);
    }
    function addCourse(Request $request){
        // $countUsers=User::all()->count();
       if( $request->courseType){
        $course= new Course;
        $course->name=$request->courseName;
        $course->type=$request->courseType;
        $course->save();
       }
     
        if($request->groupName){
            $this->addGroup($request);
            
        }
        
        return redirect('/admin')->with("messageAction","'".$request->courseName."'   was successfully set up ");
    }
   function addUser(){

   }
    function addGroup(Request $request){
         
            $arr = array(
                'su' => $request->su, 
                'mo' => $request->mo, 
                'tu' => $request->tu, 
                'we' => $request->we, 
                'th' => $request->sth,
                'fr' => $request->fr,
                'sa' => $request->sa);

            $days= json_encode($arr);
        
            $group=new Group;
            $group->name=$request->groupName;
            $group->course_id=$request->course_id;
            $group->days= $days;
            $group->save();
           if(!$request->courseType) {
            return redirect('/admin/addGroup')->with("messageAction","'".$request->groupName."'   was successfully created ");
           }
        
    }
    function allgroups(Request $request){
        $groups=Group::join('courses', 'courses.id', '=', 'groups.course_id')
        ->select('groups.id as groups_id','groups.name  as group_name','days','courses.name as course' )
        ->orderBy('groups_id')->get();
        // dd($groups);
        foreach ($groups as  $key=>$value) {
            # code...
            $groupInfo[$key]=['group'=>$value,
            'users'=>( Group::find($value->groups_id)->user()->orderBy('name')->get())];
        
        }
       


        return view('/admin/allGroups',['groupInfo'=> $groupInfo]);
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

}


