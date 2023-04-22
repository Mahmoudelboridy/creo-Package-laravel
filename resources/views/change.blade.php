@extends('styles.bootstrap')
@section('title','sign up')
@section('content')
<h2 class="text-center">change password</h2>
<div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
        <form action="{{ route('cha_nge') }}" method="POST" >
            @csrf
            <div class="form-outline mb-4">
                <label class="mb-1">u change code</label> <input type="text" class="form-control"
                    placeholder="Enter change code" autocomplete="off" required="required"
                    name="code" />
            </div>
          
            <div class="form-outline mb-4">
                <label class="mb-1">New password</label> <input type="password" class="form-control"
                    placeholder="Enter u password" autocomplete="off" required="required"
                    name="password" />
            </div>
            <div class="form-outline mb-4">
                <label class="mb-1">Confirm new password</label> <input type="password" class="form-control"
                    placeholder="confirm password" autocomplete="off" required="required"
                    name="conf_password" />
            </div>

            <select style="display:none" class="form-select" name="email">
                <option value="{{ $email }}">{{ $email }}</option>            
            </select>
        
            <div class="text-center">
                <button class="my-2 bg-info mb-3 py-2 px-3 border-0" name="change">change password</button>
            </div>
        </form>
    </div>
</div>

@endsection