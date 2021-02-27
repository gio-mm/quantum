@extends('admin/master')
@section('content')


<div class="row">
    
    @foreach ($posts as $item)
    {{-- @dd($item) --}}
    <div class="col-sm-4 my-2">
        <div class="card " data-id={{$item->id}} >
            <div class="card-body">
                <h5 class="card-title" id="{{$item->id}}"> {{$item->title}}</h5>
                <p class="card-text">{{$item->description}} </p>
                <div class="d-flex justify-content-between">
                    <a href="{{url('admin/posts/'.$item->id.'/edit')}}" class="btn btn-primary">Edit</a>

                    <button type="button" class="btn btn-danger delete" data-id={{$item->id}} data-title={{$item->title}} data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
    
    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header  border-0">
          <h5 class="modal-title text-warning" id="exampleModalLabel">Warning</h5>
          <button type="button" class="btn-close bg-dark border-0 text-success" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
        <div class="modal-body border-0 text-light" id="modal-body" >
          do you want delete ?
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <form id="delform" class="delform"   method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger">yes</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
    
    
</div>
<script>


  document.querySelectorAll('.delete').forEach(item => {
  item.addEventListener('click', event => {
    //handle click
    // console.log(document.getElementsByClassName('modal-body')[0]);

    let title=document.getElementById(event.target.dataset.id).textContent;
    document.getElementsByClassName('modal-body')[0].innerHTML =`Do you want delete post - ${title} ?`;
    // document.getElementsByClassName('delform')[0].setAttribute('action',`admin/posts/${event.target.dataset.id}`);
    document.getElementById('delform').setAttribute('action',`posts/${event.target.dataset.id}`);

    console.log(event.target.dataset.id);
    
    // $('#delform').attr('action',`admin/posts/${event.target.dataset.id}`);
 


  })
})
</script>
@endsection