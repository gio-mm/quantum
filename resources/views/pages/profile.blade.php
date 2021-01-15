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
              {{-- @dd($groupInfo) --}}
              <h1>{{$userInfo->name}} {{$userInfo->lastname}}</h1>
              <p>{{$userInfo->email}}</p>
          </div>
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
<div class="d-flex flex-wrap mt-4">
    @if ($groupInfo)
    @foreach ($groupInfo as $info)
    
    <div class="col-lg-6">
 
          <div class="d-flex justify-content-between w-100 text-white">
                
              @foreach (json_decode($info['group']->days) as $key=>$item)
                <div class="{{$item?'bg-warning':'bg-secondary'}} flex-even w-100 text-center">
              
                    {{$key.' '.$item}}
                </div> 
              @endforeach
           
           
           
          </div>
        <div class=" easion-card border-0 ">
            <div class="card-header  ">
              
                <div>
                      <div class="easion-card-title">Group : {{$info['group']->group_name}} </div>
                    <div class="easion-card-title">Course:{{$info['group']->name}} </div>
                </div>
            </div>
            <div class="card-body  bg-dark">
                <table class="table table-dark  bg-dark table-hover table-in-card">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($info['users'] as $key=>$user)
                        <tr>
                            <th scope="row">{{$key+1}} </th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
 
                        </tr>
                        @endforeach
                        
             
                    </tbody>
                    
                </table>

            </div>
        </div>
    </div>
    
    
    @endforeach
    @else
     <div class="h1 mx-auto my-3"> You have no any current course </div>
    @endif

</div>
@endsection