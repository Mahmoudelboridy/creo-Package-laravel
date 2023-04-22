@extends('styles.bootstrap')
@section('title','login')
@section('content')
<form action="{{ route('for_get') }}" method="POST">
@csrf
<div class="row mt-5 d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
        <form action="" method="POST">
            <div class="form-outline mb-4">
                <label class="mb-1">user email</label> <input type="text" class="form-control"
                    placeholder="Enter u email"  required="required"
                    name="email" />
            </div>
           
            
            <div class="text-center">
                <button class=" bg-info mb-3 py-2 px-3 border-0" name="login">send</button>
                <p class="fw-bold mb-0 text-center" style="font-size:18pt">After click send check u email</p>
            </div>
        </form>
    </div>
</div>
</form>
@endsection