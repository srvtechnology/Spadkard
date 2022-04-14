@extends('admin.layouts.app')
@section('title')
<title>Sideline | Admin | Forget password</title>
@endsection
@section('head')
@include('admin.include.head')
<style type="text/css">
body {
overflow: hidden;
}
</style>
@endsection
@section('content')

<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
    	@include('admin.include.message')
        <div class="panel-heading rm08"> <img src="{{url('/')}}/assets/img/logo-d-long.png" alt=""> </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('admin.email.entered.code.generate') }}" aria-label="{{ __('Login') }}" class="form-horizontal m-t-20" id="login_form">
                @csrf
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="email" type="text" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  required autofocus placeholder="Enter email">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>



                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <a href="index.html">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light rm01" type="submit">Sent Code</button>
                        </a>
                    </div>
                </div>
               {{--  <div class="form-group m-t-30">
                    <div class="col-sm-12"> <a href="{{route('enter.mail.page')}}" class="rm01"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a> </div>
                </div> --}}
                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    @include('admin.include.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
    jQuery.validator.addMethod("validate_email", function(value, element) {
    if (/^([A-Za-z0-9_\-\.]+)@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$/.test(value)) {
    return true;
    } else {
    return false;
    }
    }, "Please enter a valid email address.");
    $('#login_form').validate({
    rules:{
    email:{
    required:true,
    validate_email:true
    },
    password:{
    required:true,
    }
    },
    messages:{
    email:{
    required:"Please enter a email address.",
    },
    password:{
    required:"Please enter a password. ",
    }
    }
    });
    });
    </script>
    @endsection
   