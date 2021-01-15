@extends('admin/master')
@section('content')


<div class="row">
    
    @foreach ($posts as $item)
    {{-- @dd($item) --}}
    <div class="col-sm-4 my-2">
        <div class="card ">
            <div class="card-body">
                <h5 class="card-title"> {{$item->title}}</h5>
                <p class="card-text">{{$item->description}} </p>
                <div class="d-flex justify-content-between">
                    <a href="{{url('admin/posts/'.$item->id.'/edit')}}" class="btn btn-primary">Edit</a>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
    
    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Do you want delete post?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger">yes</button>
        </div>
      </div>
    </div>
  </div>
    
    
</div>

@endsection