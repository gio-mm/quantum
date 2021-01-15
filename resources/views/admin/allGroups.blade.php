@extends('admin/master')

@section('content')
<div class="d-flex flex-wrap">
    @foreach ($groupInfo as $info)
    
    <div class="col-lg-6">
 
          <div class="d-flex justify-content-between w-100 text-white">
                
              @foreach (json_decode($info['group']->days) as $key=>$item)
                <div class="{{$item?'bg-warning':'bg-secondary'}} flex-fill text-center">
              
                    {{$key.' '.$item}}
                </div> 
              @endforeach
           
           
           
          </div>
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div>
                      <div class="easion-card-title">Group : {{$info['group']->group_name}} </div>
                    <div class="easion-card-title">Course:{{$info['group']->course}} </div>
                </div>
            </div>
            <div class="card-body ">
                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            {{-- <th scope="col">Status</th> --}}
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($info['users'] as $key=>$user)
                        <tr>
                            <th scope="row">{{$key+1}} </th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            {{-- <td></td> --}}
                            <td>
                                <a href="">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-user-edit"></i>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                        {{-- <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr> --}}
                    </tbody>
                    
                </table>

 
                {{-- <a href="#" class="btn btn-primary btn-sm mt-4 "  role="button" aria-disabled="true">Add Member</a> --}}
            </div>
        </div>
    </div>
    
    
    @endforeach
</div>
@endsection
