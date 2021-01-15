
@extends('details/master')
@section('content')
{{-- <div class="slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="false">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://raw.githubusercontent.com/isocpp/logos/master/cpp_logo.png" class="d-block h-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://tetraxbalance.com/wp-content/uploads/2016/03/js-logo.png" class="d-block h-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-png-transparent.png" class="d-block h-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div> --}}
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
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