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
            <form action="{{route('admin.reset.new.password')}}" class="signin-form" id="login_form" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{@$data->id}}">
                        <div class="login-top-img">
                           

                        </div>
                         <p class="text-center f-16">Please fill the following for new password</p>
                        <div class="form-group">
                           <input type="password" class="form-control" placeholder="Enter your password"  name="password" >
                        </div>

                        <div class="form-group">
                           <input type="password" class="form-control" placeholder="Re enter password"  name="confirm_password" >
                        </div>
                        
                        <div class="form-group">
                           <button type="submit" class="btn-block btn btn-primary submit px-3">Change Password</button>
                        </div>
                        
                     </form>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    @include('admin.include.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <script type="text/javascript">
              $(function(){
                $('#login_form').validate({
                    rules:{
                        password:{
                            required:true,
                            
                        },
                        confirm_password : {
                          required:true,
                          equalTo : '[name="password"]'
                     }
                    },
                    messages:{
                      password:{
                        required:'Please enter your new password',
                    },
                    confirm_password:{
                       required:'Please enter your confirm password',
                    }
                    }
                    
                })
              })
          </script> 
    @endsection
   