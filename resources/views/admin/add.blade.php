@extends('admin/master')

@section('content')
<h1 class="text-center my-1"> create a  course</h1>
<form action="/admin/add" method="post">
    @csrf
<div class="container d-flex flex-wrap">
    
    <div class="input-group col-6 mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">name</span>
        </div>
        <input type="text" name="courseName" class="form-control" value='პროგრამირების საბაზისო კურსი' placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    
    <div class="input-group col-6 mb-2">
        <select name='courseType'class="custom-select" id="inputGroupSelect02">
            <option selected value="1">საბაზისო</option>
            <option value="2">სპეც კურსი</option>
            <option value="3">ტრეინინგი</option>
        </select>
        <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">type</label>
        </div>
    </div>
    
</div>      
<h2 class="text-center my-2">You can also create a group with the course</h2>
<div class="input-group mx-auto col-6 mb-1">
    <div class="input-group-prepend">
        <span class="input-group-text"  id="basic-addon1">Group Name</span>
    </div>
    <input name="groupName" type="text" class="form-control"  placeholder="group name" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="days">
    <div class="input-group mx-auto col-3 mb-1">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Su</span>
        </div>
        <input name="su" type="text" class="form-control"  placeholder="example 15:30" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mx-auto col-3 mb-1">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Mo</span>
        </div>
        <input name="mo" type="text" class="form-control"   aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-1">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Tu</span>
        </div>
        <input name="tu" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-1">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">We</span>
        </div>
        <input name="we" type="text" class="form-control"   aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-1">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Th</span>
        </div>
        <input name="th" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-1">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Fr</span>
        </div>
        <input name="fr" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
    </div><div class="input-group mx-auto col-3 mb-1">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1">Sa</span>
        </div>
        <input name="sa" type="text" class="form-control"   aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mx-auto col-6">
    <button type="submit" class="btn btn-dark " style="width: 150px; border: 2px solid rgb(248, 246, 217);
    border-radius: 10px; margin:10px auto 0 auto">Create</button>
</div>
</form>
@endsection