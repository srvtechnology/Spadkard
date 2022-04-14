@extends('admin.layouts.app')
@section('title')
<title>SPADE KARD | Admin | Login</title>
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
        <div class="panel-heading rm08"> <img src="{{url('/')}}/assets/img/logo-d-long.png" alt=""> </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}" class="form-horizontal m-t-20">
                @csrf
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ @Cookie::get('card_admin_user_email') == null ? old('email'): @Cookie::get('card_admin_user_email')}}" required autofocus placeholder="Username">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password" type="password" class="form-control input-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password" value="{{ @Cookie::get('card_admin_user_password') }}">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input class="form-check-input" name="remember" id="checkbox-signup" type="checkbox" {{ old('remember') ? 'checked' : '' }} @if(@Cookie::get('card_admin_user_email') != null) checked @endif>
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <a href="index.html">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light rm01" type="submit">Log In</button>
                        </a>
                    </div>
                </div>
                <div class="form-group m-t-30">
                    <div class="col-sm-12"> <a href="{{route('admin.enter.mail.page')}}" class="rm01"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a> </div>
                    <!--<div class="col-sm-5 text-right">
                        <a href="register.html">Create an account</a>
                    </div>--></div>
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
    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
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
    {{-- script section end --}}
    {{-- <div class="card-body">
        <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                    </button>
                    @if (Route::has('admin.password.request'))
                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div> --}}
    {{--
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('admin.logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div> --}}