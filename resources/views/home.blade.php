
@extends('details/master')
@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <h1>hi</h1>
    <div class="carousel-inner">
            @foreach ($posts as $item)
        
            <div class="carousel-item {{$loop->first ?'active':''}}">
                <img src="{{Storage::url($item->img)}}" class="d-block h-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$item->title}}</h5>
                    <p>{{$item->description}}</p>
                </div>
            </div>
            @endforeach
        {{-- <div class="carousel-item active">
            <img src="https://www.allianceplast.com/wp-content/uploads/2017/11/no-image.png" class="d-block h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
              </div>
        </div> --}}
     

    </div>
    <div class="carousel-item">
        <img src="..." alt="...">
        
      </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
{{-- <div class="container d-flex "> --}}
    <div class="card-group">
        
        <div class="card border" >
            <div class="card-body">
                <h5 class="card-title">საბაზისო კურსი</h5>
                <p class="card-text"></p>
                <a href="c/basicCourse" class="btn btn-light">ნახვა</a>
            </div>
        </div>
        <div class="card border" >
            <div class="card-body">
                <h5 class="card-title">სპეც. კურსები</h5>
                <p class="card-text"></p>
                <a href="c/courses" class="btn btn-light">ნახვა</a>
            </div>
        </div>
        
        <div class="card border" ">
            <div class="card-body">
                <h5 class="card-title">ტრეინინგები</h5>
                <p class="card-text"></p>
                <a href="c/trainings" class="btn btn-light">ნახვა</a>
            </div>  
            
        </div>
    </div>
    {{-- </div> --}}

    
    @endsection    