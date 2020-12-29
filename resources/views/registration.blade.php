

@extends('details/master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/register" method="post" class="d-flex justify-content-center">
    @csrf
    <div class="forminputs w-25 text-light ">
        <div class="">
            <label for="name">name:</label>

            <input type="text" class="form-control name"name="name" placeholder="First name">
            @error('name')
            
            <div class="alert alert-danger mt-2" role="alert">
                {{$message}}
              </div>
            @enderror
            
        </div>
        <div class="">
            <label for="lastname">Last Name:</label>

            <input type="text" name="lastname"class="form-control lastname" placeholder="Last name">
            @error('lastname')
            
            <div class="alert alert-danger mt-2" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group ">
            <div class="">
                <label for="birthday">Birthday:</label>
                <input type="date"class="form-control"  id="birthday" name="date"> 
                @error('date')
            
            <div class="alert alert-danger mt-2" role="alert">
                {{$message}}
              </div>
            @enderror
            </div>
            <div class=" ">
                <label for="phone">phone:</label>
                <input type="" class="form-control"id="phone" name="phonenumber" placeholder="+995 589 12 12 12"> 
                @error('phonenumber')
            
            <div class="alert alert-danger mt-2" role="alert">
                {{$message}}
              </div>
            @enderror
            </div>
        </div>
        <div class="">
            <label >email:</label>
            <input type="email"class="form-control"  name="email"> 
            @error('birthday')
            
            <div class="alert alert-danger mt-2" role="alert">
                {{$message}}
              </div>
            @enderror
            @if (session()->get('codeerror'))
            <div class="alert alert-danger mt-2" role="alert">
               
              </div>

            @endif
        </div>
        
        
        
        <div class="">
            <label >password:</label>
            
            <input type="password" name="password" class="form-control" placeholder="phone number">
            @error('password')
            
            <div class="alert alert-danger mt-2" role="alert">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="">
            <label >confirm password:</label>
            
            <input type="password" name="confpassword" class="form-control" placeholder="confirm password">
            @error('confpassword')
            
            <div class="alert alert-danger mt-2" role="alert">
                {{$message}}
              </div>
            @enderror
        </div>
        <button type="submit" class="btn mt-4 mb-2 btn-dark d-block m-auto">registration</button>
    </div>
</form>
@endsection