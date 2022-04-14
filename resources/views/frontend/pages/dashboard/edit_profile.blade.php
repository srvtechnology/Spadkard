@extends('layouts.app')
@section('title')
<title>User | Dashboard</title>
<style type="text/css">
	.error{
		color: red;
	}
</style>
@endsection
@include('frontend.include.head')
<!-- "Basic Elements" page styles, specific to this page for demo only -->
@section('content')
<div class="body-container">
	@include('frontend.include.nav')
	<div class="main-container bgc-white">
		@include('frontend.include.left_part')
		<div role="main" class="main-content">
			<div class="page-content container container-plus">
				<div class="card acard mt-2 mt-lg-3">
					<div class="card-header">
						<h3 class="card-title text-125 text-primary-d2">
						Edit Profile
						</h3>
						{{-- <a href="{{route('request.card.list')}}" class="btn btn-info btn-bold px-4" >Back</a> --}}

					</div>
					@include('frontend.include.message')
					<div class="card-box brc-blue-m2">
						<div class="card-box-body">
							<form action="{{route('update.user')}}" method="post" enctype="multipart/form-data" id="frm">
								@csrf
							
								
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Name
											</label>
											<input type="text" placeholder="Enter Name" name="name" class="form-control" id="" value="{{$user->name}}" />
										</div>
									</div>
									{{--    <div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Default field
											</label>
											<select class="form-control">
												<option>--Select option--</option>
											</select>
										</div>
									</div> --}}
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Email
											</label>
											<input type="text" placeholder="Enter Email" name="email" class="form-control" id="" value="{{$user->email}}" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Mobile
											</label>
											<input type="text" placeholder="Enter Mobile Number" name="ph" class="form-control" id="" value="{{$user->mobile}}" />
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Old Password
											</label>
											<input type="password" placeholder="Enter old password"  id="pass" class="form-control"  name="old_password">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												New Password
											</label>
											<input type="password" placeholder="Enter new password"   class="form-control" name="newPassword" id="new">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Confirm Password
											</label>
										<input type="password" placeholder=" Enter confirm password"   class="form-control" name="confirm" id="conf">
										</div>
									</div>
									
									<div class="clearfix"></div>
									
									
									

									
									
									
									<div class="col-lg-12">
										<hr>
										<div class="form-group mb-0">
											<button class="btn btn-info btn-bold px-4" type="submit">
											Save
											</button>
											{{--  <button class="btn btn-outline-lightgrey btn-bgc-white btn-bold ml-2 px-4" type="reset">
											Cancel
											</button> --}}
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<footer class="footer d-none d-sm-block">
				<div class="footer-inner bgc-white-tp1">
					<div class="pt-3 border-none border-t-3 brc-grey-l2 border-double">
						<span class="text-grey">© 2022 Daimler India Commercial Vehicles Pvt. Ltd. All rights reserved.</span>
					</div>
				</div>
				<!-- .footer-inner -->
				<!-- `scroll to top` button inside footer (for example when in boxed layout) -->
				<div class="footer-tools">
					<a href="#" class="btn-scroll-up btn btn-dark mb-2 mr-2">
						<i class="fa fa-angle-double-up mx-2px text-95"></i>
					</a>
				</div>
			</footer>
			<!-- footer toolbox for mobile view -->
		</div>
		
	</div>
</div>
@endsection
<!-- include common vendor scripts used in demo pages -->
@section('script')
@include('frontend.include.script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

                $('#frm').validate({

                    rules:{
                        // old_password:{
                        //     required:true,
                        //    // minlength:6,                           
                        // },
                         email:{
                            required:true,
                            minlength:6,
                             validate_email:true                           
                        },
                         name:{
                            required:true,
                            minlength:2,
                             maxlength:20,                          
                        },
                         ph:{
                            required:true,
                            minlength:10,
                             maxlength:10,                          
                        },
                        // newPassword:{
                        //     required:true,
                        //     minlength:6,                           
                        // },
                        // confirm:{
                        //     required:true,
                        //     minlength:6,
                        //      equalTo : '[name="newPassword"]'                           
                        // },

                    },
                    messages:{
                         old_password:{
                            required:" Old password is mandatory",
                            min:"Enter minimum 6 characters"
                        },
                         newPassword:{
                            required:" New password is mandatory",
                            min:"Enter minimum 6 characters"
                        },
                         confirm:{
                            required:" Confirm password is mandatory",
                            min:"Enter minimum 6 characters",
                            equalTo :"New password and confirm password are not matching"
                        },

                    },submitHandler: function(form){
               
                
                
                var old = $('#pass').val().length;
                var newpass = $('#new').val().length;
                var conf = $('#conf').val().length;
                

                if(old>0  || newpass>0 || conf>0){
                  //alert("h");
                  if(old<1){
                  	alert("enter old password.");
                  	return false;
                  }
                  else if(newpass<1){
                   alert("enter new password.");
                   return false;
                  }
                  else if(conf<1){
                  	 alert("enter Confirm password.");
                  	 return false;
                  }/**/
                  else if(old<8){
                  	 alert("enter 8 character old password.");
                  	 return false;
                  }
                  else if(newpass<8){
                  	 alert("enter 8 character new password.");
                  	 return false;
                  }
                  else if(conf<8){
                  	 alert("enter 8 character confirm password.");
                  	 return false;
                  }/**/
                  else if( $('#new').val()!= $('#conf').val()){
                  	 alert("New password and confirm password not matching.");
                  	 return false;
                  }
                  else{
                  	form.submit()

                  }



                }
                else{
                	form.submit()
                }
               // return false;
            
               
                },


                });

            });
        </script>
@endsection