@extends('admin/master')

@section('content')
  
<div class="row">
    @if (count($users)||count($groups))
        @if (count($users))
            @foreach ($users as $item)
            {{-- @dd($item) --}}
                <div class="col-sm-4 my-2">
                    <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name.' '. $item->lastname}}</h5>
                        <p class="card-text">{{$item->email}} </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if (count($groups))
        @foreach ($groups as $item)
        {{-- @dd($item) --}}
        <div class="col-sm-4 my-2">
            <div class="card ">
            <div class="card-body">
                <h5 class="card-title">Group: {{$item->name}}</h5>
                {{-- <p class="card-text">{{$item->email}} </p> --}}
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
        @endforeach
   
    
        @endif
        
    @else
        <h1>NO RESULTS</h1>
    @endif

    
  </div>
  @endsection