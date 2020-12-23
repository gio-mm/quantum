

@extends('details/master')
@section('content')

<form class="d-flex justify-content-center">
    
    <div class="forminputs ">
        <div class="">
            <label for="name">name:</label>

            <input type="text" class="form-control name" placeholder="First name">
        </div>
        <div class="">
            <label for="lastname">Last Name:</label>

            <input type="text" class="form-control lastname" placeholder="Last name">
        </div>
        
        <div class="form-group ">
            <div class="">
                <label for="birthday">Birthday:</label>
                <input type="date"class="form-control" id="birthday" name="birthday"> 
            </div>
            <div class=" ">
                <label for="birthday">phone:</label>
                <input type="" class="form-control"id="phone" name="phonenumber" placeholder="+995 589 12 12 12"> 
            </div>
        </div>
        <div class="">
            <label for="birthday">email:</label>
            <input type="email"class="form-control" id="birthday" name="birthday"> 
        </div>
        
        
        
        <div class="">
            <label for="birthday">password:</label>
            
            <input type="password" class="form-control" placeholder="phone number">
        </div>
        <div class="">
            <label for="birthday">confirm password:</label>
            
            <input type="password" class="form-control" placeholder="Last name">
        </div>
        <button type="submit" class="btn mt-4 mb-2 btn-dark d-block m-auto">registration</button>
    </div>
</form>
@endsection