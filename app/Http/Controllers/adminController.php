<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Group;
use PhpParser\Node\Stmt\Foreach_;

class adminController extends Controller
{
    
    function index(){
        
    
        $countUsers=User::all()->count();
        return view('admin.dash',['countUsers'=> $countUsers]);
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
            $group->course=$request->courseName;
            $group->days= $days;
            $group->save();
           if(!$request->courseType) {
            return redirect('/admin/addGroup')->with("messageAction","'".$request->groupName."'   was successfully created ");
           }
        
    }
    function allgroups(Request $request){
        $groups=Group::all();
        foreach ($groups as  $key=>$value) {
            # code...
            $groupInfo[$key]=['group'=>$value,
            'users'=>( Group::find($value->id)->user()->orderBy('name')->get())];
        
        }

        return view('/admin/allGroups',['groupInfo'=> $groupInfo]);
    }

}


