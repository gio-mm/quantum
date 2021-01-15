@extends('admin/master')

@section('content')
<img src="{{asset('images/eY1GYvlW76oq3s2nueQ21GXlDsgVbswccgdQEUw0.png')}}" alt="" srcset="">
<form action="{{url('admin/posts')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="input-group mb-3 col-6 mx-auto">
        <span class="input-group-text" id="basic-addon1">title</span>
        <input type="text" name="title"class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group justify-content-between">
        <div class="input-group mb-3 col-10">
                <span class="input-group-text">img</span>
                <input name="file" class="form-control form-control-lg" id="formFileLg" type="file">
        </div>
        <div class="col-1 input-group mb-3  "><P class="input-group-text"">OR</P></div>
        
        {{-- <div class="input-group mb-3 col-5">
                <label class="input-group-text "  for="inputGroupSelect01">Options</label>
                <select name="select" class="fa form-select" style="flex:1;color:grey;font-size:20px" id="inputGroupSelect01">
                    
                
                    @foreach ($images as $item)

                    <option value="">{{$item->name}}</option>  
                    
                    @endforeach
                 
                  
                </select>

              
        </div> --}}
    </div>
    <div class="d-flex justify-content-between my-4">
        @foreach ($images as $item)
    
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio" value="{{$item->img}}" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    <img src="{{Storage::url($item->img)}}" alt="" style='height:30px' srcset="">
                </label>
            </div>
            
    
     
        @endforeach
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">description</span>
        <textarea name='description' class="form-control"  aria-label="With textarea"></textarea>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">content</span>
        <textarea name="content" class="form-control" rows="10" aria-label="With textarea"></textarea>
    </div>
    
    <div class="input-group mb-3">
        <button type="submit" class="btn col-6 btn-primary mx-auto ">Upload</button>
    </div>
</form>


@endsection