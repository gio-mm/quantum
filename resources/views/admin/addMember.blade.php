@extends('admin/master')
@section('content')
@extends('admin/master')

@section('content')
@if (Session::has('messageAction'))
<div class="alert alert-success" role="alert">
    {{Session::get('messageAction')}}
</div>
@endif
<form action="/admin/addMember" method="post">
    @csrf
<div class="container ">
    
  
    
    <div class="input-group mx-auto col-6 mb-3">
        <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">Group</label>
        </div>
        <select name='groupName'class="custom-select" id="inputGroupSelect02">
           
            @foreach ($groups as $item)
            <option {{$item->id==1?'selecded':''}} value="{{$item->name}}">{{$item->name.' ('.$item->course.')  '}} </option>
             @endforeach
            
        </select>
        
    </div>
    
<div class="input-group mx-auto col-6 mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text"  id="basic-addon1">User</span>
    </div>
    <input name="email" type="email" class="form-control"  placeholder="user email" aria-label="Username" aria-describedby="basic-addon1">
</div>

<input type="hidden" name="group" id="">
<div class="input-group mx-auto col-6">
    <button type="submit" class="btn btn-dark " style="width: 150px; border: 2px solid rgb(248, 246, 217);
    border-radius: 10px; margin:20px auto 0 auto">Add Member</button>
</div>
    
</div>      

</form>
@endsection
    
@endsection  