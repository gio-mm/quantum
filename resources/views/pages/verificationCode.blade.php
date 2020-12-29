

@extends('details/master')
@section('content')

<form action="/verificationCode" method="post" class="d-flex justify-content-center">
    @csrf
    <div class="forminputs w-25 text-light ">
        <div class="">
            <label for="name">Mail Verification Code:</label>

            <input type="text" class="form-control name"name="verifyCode" placeholder="First name">    
        </div>
        <button type="submit" class="btn mt-4 mb-2 btn-dark d-block m-auto">Submit</button>
    </div>

</form>
@endsection