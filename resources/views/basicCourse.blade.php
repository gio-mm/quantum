@extends('details/master')
@section('content')
<div class="list  d-block ">
  <h2 class="text-center mt-4 text-white">Lorem ipsum dolor </h2>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias perferendis iure illum perspiciatis deleniti ullam porro, nemo qui repellat provident quibusdam. Animi inventore, molestias numquam fuga quia harum? Laboriosam, hic!
    Dignissimos reprehenderit cum deserunt nobis tempore! Minus quod praesentium doloremque voluptatibus magnam! Fuga soluta voluptatem modi quia possimus illum? Est quam ex iure magnam asperiores nam quia quas possimus velit!
    Corrupti molestias laboriosam enim numquam eius inventore, perspiciatis, quae hic mollitia ab officia quo nobis veritatis tempore alias praesentium in, excepturi ex eos dicta consequatur eligendi soluta odio magnam. Expedita.
    Eaque non repellat recusandae quae exercitationem possimus mollitia, ex hic magnam! Rerum incidunt quibusdam tenetur soluta maiores, nostrum nobis exercitationem necessitatibus cumque eum! Magnam praesentium atque repellendus natus corporis aspernatur!
  </p>
  <div class="d-flex flex-wrap mt-4">
    
{{-- @dd($groups); --}}
    @foreach ($groups as $group)
    
    <div class="col-lg-6 mb-4">
      <div class=" easion-card border-0 ">
        <div class="card-header  ">
          
          <div>
            <div class="easion-card-title"><h4>Group : {{$group->name}}</h4>  </div>
            
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between w-100   text-white" style="">
        
        @foreach (json_decode($group->days) as $key=>$item)
        <div class="{{$item?'bg-primary':'bg-secondary'}} flex-even w-100 text-center " style="display: table; height:70px; overflow: hidden;">
          <div style="display: table-cell; vertical-align: middle;">
           <p>{{$key.' '.$item}}</p> 
          </div>
          
        </div> 
        @endforeach
        

        
      </div>
      <div class="card-header  ">
          
        <div class="d-flex">
         
          
          @if ($hasCourse==='hasCourse')

          @elseif($hasCourse==='requested')
          
            @if ($userCourseReq->group_request===$group->name)
            <a class="btn btn-primary stretched-link ml-auto" href="" role="button">requested</a>
            @endif
            
          @else
          <a class="btn btn-primary stretched-link ml-auto" href='{{url("basicCourse/join/prog/$group->name")}}' role="button">Join</a>
  
          @endif
        </div>
      </div>
    </div>
    
    
    @endforeach

    
  </div>
</div> 
  @endsection