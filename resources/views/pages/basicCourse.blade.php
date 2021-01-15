@extends('details/master')

@section('content')

<div class="container">
    <div class="jumbotron text-dark bg-light my-4">
        <h1 class="display-4 text-black">Basic course ( C )</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        
        @if ($hasBasic==='hasCourse')
        @elseif($hasBasic==='requested')
        <a class="btn btn-dark btn-lg" href="" role="button">requested</a>
        @else
        <a class="btn btn-dark btn-lg" href="{{url('basicCourse/join/prog')}}" role="button">Join</a>

        @endif
        
    </div>
</div>

@endsection