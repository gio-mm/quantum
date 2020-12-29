@extends('details/master')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="https://icon-library.com/images/default-profile-icon/default-profile-icon-1.jpg" alt="">
              </a>
              <h1>{{$userInfo->name}} {{$userInfo->lastname}}</h1>
              <p>{{$userInfo->email}}</p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li><a href="#"> <i class="fa fa-edit"></i> Edit profile</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">

      <div class="panel">

          <div class="panel-body bio-graph-info">
              <h1>Bio Graph</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>First Name </span>: {{$userInfo->name}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>: {{$userInfo->lastname}}</p>
                  </div>
                  
                  <div class="bio-row">
                      <p><span>Birthday</span>: {{$userInfo->birthday}}</p>
                  </div>
            
                  <div class="bio-row">
                      <p><span>Email </span>: {{$userInfo->email}}</p>
                  </div>
                  
                  <div class="bio-row">
                      <p><span>Phone </span>: {{$userInfo->phone}}</p>
                  </div>
              </div>
          </div>
      </div>
      <div>
          <div class="row ">
            
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                        
                          <div class="bio-desk">
                              <h4 class="terques">Current Courses </h4>
                              <p>Started : 15 July</p>
                              <p>Deadline : 15 August</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-desk">
                              <h4 class="green">Finished Courses</h4>
                              <p>Started : 15 July</p>
                              <p>Deadline : 15 August</p>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
</div>
</div>
@endsection