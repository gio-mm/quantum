<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    //
    function groupInfo($category,Request $req){
        if($category==='basicCourse'){
             $type='1';
        }elseif($category==='courses'){
              $type='2';
        }else{
              $type='3';
        }
        
         $userId=$req->session()->get('user')->id;
 
         $groups=DB::table('groups')
         ->join('courses', 'courses.id', '=', 'groups.course_id')
         ->where('courses.type',$type)
         ->select('groups.name','days')
         ->get();
         
         
         $userHasCourse= User::find($userId)->group() 
             ->join('courses', 'courses.id', '=', 'groups.course_id')
             ->where('courses.type',$type)
             ->select('groups.id as groups_id','groups.name  as group_name','days','courses.name as name' )
             ->get();
        
         $userCourseReq=Message::where('user_id',$userId)->where('type','prog')->first();
 
    
        
         if(count($userHasCourse)){
             $hasCourse='hasCourse';
         }elseif($userCourseReq){
             $hasCourse='requested';
         }else{
             $hasCourse='';
         }
     
         return view('basicCourse',['groups'=>$groups,'hasCourse'=>$hasCourse,'userCourseReq'=>$userCourseReq]);
         
     }

}
