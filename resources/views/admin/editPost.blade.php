@extends('admin/master')

@section('content')
<img src="{{asset('images/eY1GYvlW76oq3s2nueQ21GXlDsgVbswccgdQEUw0.png')}}" alt="" srcset="">
<form action="{{url('admin/posts/'.$post->id)}}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="d-flex  mb-3">

        <img src="{{Storage::url($post->img)}}" style="height: 100px" class="rounded float-start" alt="...">
        <div class=" col-6 mx-auto">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">title</span>
                <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        
    </div>
    <div class="input-group justify-content-between">
        <div class="input-group mb-3 col-10">
                <span class="input-group-text">img</span>
                <input name="file" value={{Storage::url($post->img)}} class="form-control form-control-lg" id="formFileLg" type="file">
        </div>
        <div class="col-1 input-group mb-3  "><P class="input-group-text"">OR</P></div>

    </div>
    <div class="d-flex justify-content-between my-4">
        @foreach ($images as $item)
    
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio"{{($post->img==$item->img) ? "checked":""}} value="{{$item->img}}" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    <img src="{{Storage::url($item->img)}}" alt="" style='height:30px' srcset="">
                </label>
            </div>
            
        @endforeach
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">description</span>
        <textarea name='description'  class="form-control"  aria-label="With textarea">{{$post->description}}</textarea>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">content</span>
        <textarea name="content"  class="form-control" rows="10" aria-label="With textarea">{{$post->content}}</textarea>
    </div>

    <div class="input-group mb-3">
        <button type="submit" class="btn col-6 btn-primary mx-auto ">Update</button>
    </div>
</form>

@endsection