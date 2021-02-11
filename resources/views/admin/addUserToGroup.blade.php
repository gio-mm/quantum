@extends('admin/master')
@section('content')


@section('content')
@if (Session::has('messageAction'))
<div class="alert alert-success" role="alert">
    {{Session::get('messageAction')}}
</div>
@endif
<form action="/admin/userRequest/reply" method="post">
    @csrf
<div class="container ">
    
    <div class="bg-light text-center form-control col-6 mx-auto my-4" style="word-spacing: 10px">
        {{ $user->name.' '.$user->lastname}}
    </div>
    
    <div class="input-group mx-auto col-6 mb-3">
       
        <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">Group</label>
        </div>
        <select name='groupName'class="custom-select" id="inputGroupSelect02">
             
            @if ($group)
            <option selected value="{{$group->name}}">{{$group->name.' ('. $group->course_name.')  '}} </option>

            @endif
           
        </select>
        
    </div>
    
<div class="input-group mx-auto col-6 mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text"  id="basic-addon1">User</span>
    </div>
    <input name="email" type="email" class="form-control" value=" {{ $user->email}} "  placeholder="user email" aria-label="Username" aria-describedby="basic-addon1">
</div>
<input type="hidden" name="id" value="{{ $user->id}}" id="">
<div class="input-group mx-auto col-6">
    
    <button name='action' value="denied" type="submit" class="btn btn-danger " style="width: 150px; border: 2px solid rgb(248, 246, 217);
    border-radius: 10px; margin:20px auto 0 auto">Denied</button>
    <button name='action' value="acept" type="submit" class="btn btn-success " style="width: 150px; border: 2px solid rgb(248, 246, 217);
    border-radius: 10px; margin:20px auto 0 auto">Acept</button>
</div>
    
</div>      

</form>

@endsection
    
@endsection  