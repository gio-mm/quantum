<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('/css/app.css') }}">    
    <title>Quantum</title>
</head>
<body>

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Quantum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @if (!Session::has('user'))
            <li class="nav-item">
              <a class="nav-link" href="/register">Registration</a>
          </li>
            @endif
            
            
           
          </ul>
          @if (Session::has('user'))
          <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Session::get('user')['name']}}
            </a>
            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
              
              <a class="dropdown-item" href="/info">Info </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
          </li>
          </ul>
         @else
          <form class="form-inline my-2  my-lg-0" action="/login" method="post">
            @csrf
            <input type="email" name="email"  class="form-control name" placeholder="email">
            <input type="password"name="password" class="form-control lastname mx-2" placeholder="password">
            
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
          </form>
          @endif
        </div>
      </nav>