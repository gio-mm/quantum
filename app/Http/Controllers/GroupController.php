<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\Course;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        return view('admin.groups',['courses'=>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
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
        return redirect('/admin')->with("messageAction","'".$request->groupName."'   was successfully created ");
       }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
