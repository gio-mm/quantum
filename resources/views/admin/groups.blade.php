@extends('admin/master')

@section('content')
@if (Session::has('messageAction'))
<div class="alert alert-success" role="alert">
    {{Session::get('messageAction')}}
</div>
@endif
<form action="/admin/addGroup" method="post">
    @csrf
<div class="container ">
    
  
    
    <div class="input-group mx-auto col-6 mb-3">
        <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">course</label>
        </div>
        <select name='courseName'class="custom-select" id="inputGroupSelect02">
            @foreach ($courses as $item)
                <option {{$item->id==1?'selecded':''}} value="{{$item->name}}">{{$item->name}} </option>
            @endforeach
           
            
        </select>
        
    </div>
    
<div class="input-group mx-auto col-6 mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text"  id="basic-addon1">Group Name</span>
    </div>
    <input name="groupName" type="text" class="form-control"  placeholder="group name" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="days">
    <div class="input-group mx-auto col-3 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Su</span>
        </div>
        <input name="su" type="text" class="form-control"  placeholder="example 15:30" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mx-auto col-3 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Mo</span>
        </div>
        <input name="mo" type="text" class="form-control"   aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Tu</span>
        </div>
        <input name="tu" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">We</span>
        </div>
        <input name="we" type="text" class="form-control"   aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Th</span>
        </div>
        <input name="th" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Fr</span>
        </div>
        <input name="fr" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Sa</span>
        </div>
        <input name="sa" type="text" class="form-control"   aria-label="Username" aria-describedby="basic-addon1">
</div>
<input type="hidden" name="group" id="">
<div class="input-group mx-auto col-6">
    <button type="submit" class="btn btn-dark " style="width: 150px; border: 2px solid rgb(248, 246, 217);
    border-radius: 10px; margin:20px auto 0 auto">Add Group</button>
</div>
    
</div>      

</form>
@endsection