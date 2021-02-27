@extends('admin.master')
@section('content')
<h1 class="text-center">{{$post->title}} </h1>
    {{-- <div class="head d-flex  bg-success"> --}}
        <div class="row ">
            <div class="col-4 bg-warrning">
                <img src="{{Storage::url($post->img)}}" class="" style="height: 200px" alt="">
            </div>
            <div class="col-8 text-center">
                {{$post->description}}
            </div>
        </div>
    {{-- </div> --}}
    <div class="content">
        <p>
            {{$post->content}}
        </p>
    </div>
    <div class="buttons d-flex justify-content-between">
        <a href="{{url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-primary"  style="height:50px; width:150px">edit</a>
        <a href="" class="btn btn-danger delete" style="height:50px; width:150px"
        data-id={{$post->id}} data-title={{$post->title}} data-bs-toggle="modal" data-bs-target="#exampleModal"
        >delete</a>
    </div>

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
    
    
     let delItem=document.querySelector('.delete')
     delItem.addEventListener('click', event => {
        //handle click
        // console.log(document.getElementsByClassName('modal-body')[0]);
    
        let title=document.getElementById(event.target.dataset.id).textContent;
        document.getElementsByClassName('modal-body')[0].innerHTML =`Do you want delete post - ${title} ?`;
        // document.getElementsByClassName('delform')[0].setAttribute('action',`admin/posts/${event.target.dataset.id}`);
        document.getElementById('delform').setAttribute('action',`posts/${event.target.dataset.id}`);
    
        console.log(event.target.dataset.id);
     
    
    
      })

    </script>
@endsection