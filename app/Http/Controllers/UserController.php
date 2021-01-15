<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Message;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Mail\SignupEmail;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;
Use Exception;
use Mockery\Undefined;


class UserController extends Controller
{
 
    //
    function login(Request $req){
       
        $user=User::where(['email'=>$req->email])->first();
       
        if(!$user||!Hash::check( $req->password,$user->password))
        {

           return 'useranme or password not matched';
        }else{
            $req->session()->put('user',$user);

            return redirect('/');
        }
      
   }

   public function sendEmail($to,$name){
    $veficationCode=rand(1000,9999);
    session()->put('veficationCode',$veficationCode);
   
        $data = [
            'name' => $name,
            'verification_code' => $veficationCode
        ];

        Mail::to($to)->send(new SignupEmail($data));
    }
    function register(Request $req){
      
        $validatedData=$req->validate([
            "name"=>"required",
            "lastname"=>"required",
            "date"=>'required|date|date_format:Y-m-d',
            "phonenumber"=>'required',
            "email"=>"required|email",
            "password"=>"required|min:6|max:20",
            "confpassword"=>'required|min:6|max:20|same:password'
        ]);
        $userInputs=$req->all();
        session()->put('userInputs',$userInputs);
        


   
        
        $this->sendEmail($req->email,$req->input('name'));

        return view('pages/verificationCode');

    }

    function verifymail(Request $req){
        if($req->verifyCode!=session()->get('veficationCode')){
            session()->forget("veficationCode");
            return redirect('/register')->with('codeerror', 'email verification is incorrect');
        };
        $inputs=session()->get('userInputs');
        session()->forget("veficationCode");
      
        $user=new User;
        $user->name=$inputs['name'];
        $user->lastname=$inputs['lastname'];
        $user->birthday=$inputs['date'];
        $user->phone=$inputs['phonenumber'];
        $user->email=$inputs['email'];
        $user->password=Hash::make($inputs['password']);
        $user->save();
        return redirect('/')->with('welcome', ' welcome user!');

    }

    function userinfo(Request $req){
        
        $userInfo=User::where(['email'=>$req->session()->get('user')->email])->first();

        $userGroup=User::find($userInfo->id)->group()
        ->join('courses', 'courses.id', '=', 'groups.course_id')
        ->select('groups.id as groups_id','groups.name  as group_name','days','courses.name as name' )
        ->orderBy('name')->get();

        if(count($userGroup)){
       
        foreach ($userGroup as  $key=>$value) {
            # code...
            $groupInfo[$key]=['group'=>$value,
            'users'=>( Group::find($value->groups_id)->user()->orderBy('name')->get())];
        
        }
    }else{
        
        $groupInfo='';
        
        
    }
        return view('pages/profile',['userInfo'=>$userInfo,'groupInfo'=> $groupInfo]);
    }
    function basicCourse($category,Request $req){
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