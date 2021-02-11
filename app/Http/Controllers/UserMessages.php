<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserMessages extends Controller
{
    //
    function basicCourse($type,$group,Request $req){
        
        $user=$req->session()->get('user');
        $requestedGroup=Group::where('name',$group)->get();
        
        if($type==='prog' && count($requestedGroup)){
          
            $message=new Message;
            $message->user_id= $user->id;
            $message->message=$user->name.' '.$user->lastname.' wants join basic programing group';
            $message->type=$type;
            $message->group_request=$group;
            $message->save();
           
            return redirect('/');
           
        }


    }
            
    function addUserToGroup($id=null){
        $user=User::find($id);
        $group_requested=Message::where('user_id',$id)->first();
        if(!$group_requested){
            return redirect('admin/addMember');
        }
        
        $group=Group::join('courses', 'courses.id', '=', 'groups.course_id')
        ->select('groups.id as groups_id','groups.name  as name','groups.days','courses.name as course_name' )
        ->orderBy('groups_id')->where('groups.name',$group_requested->group_request)->first();
      
        // $group=Group::where('name',$group_requested->group_request)->first();
        
        return view('admin.addUserToGroup',['user'=>$user,'group_requested'=>$group_requested,'group'=> $group]);
    }

    function reply(Request $request){
        // dd($request->all());
        $userMessage= Message::where('user_id',$request->id)->where('group_request',$request->groupName)->first();
        $sendUser=new Message;
        $sendUser->user_id=$request->id;
        $sendUser->type='un';	
        $sendUser->group_request=$request->groupName;	
        if($request->action==='denied'){
            $sendUser->message='Your request to join the group '.$request->groupName.' has been denied';
            $alert='denied';
        }else{
            $group=Group::where( 'name',$request->groupName)->first();
            $user=User::find($request->id);
            
            if($user){
                DB::table('group_user')->insert([
                    'user_id' => $user->id,
                    'group_id' => $group->id,
                    'status'=>'active'
                ]);
            }
            $sendUser->message='Your request to join the group '.$request->groupName.' has been approved';
            $alert=' approved';

        }
      
   
        Message::where('user_id',$request->id)->delete();
        $sendUser->save();
        return redirect('admin/')->with("messageAction","You ".$alert."  request ");
    }
    
}
