@extends('admin.layouts.app')
@section('title')
<title>Admin | Edit profile</title>

@endsection
@section('left_part')
@include('admin.include.left_part')

{{-- for datepicker --}}
{{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
@endsection
@section('content')



	
	       <!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="pull-left page-title">Edit Profile</h4>
					<ol class="breadcrumb pull-right">
						   <li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active">Change profile</li>
					</ol>
				</div>
			</div>
			@include('admin.include.message')
			{{-- <div class="add-btn "><a href="{{route('admin.dashboard.home')}}"><i class="icofont-minus-circle"></i> Back</a></div> --}}
			<div class="row">
				<div class="col-lg-12">
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
							<h3 class="panel-title">Edit Profile</h3> </div>
							<div class="panel-body rm02 rm04">
								<form role="form" action="{{route('admin.update.admin')}}" id="frm" method="post" enctype="multipart/form-data" >
									@csrf
									<div class="form-group">
										<label for="FullName">Name</label>
										<input type="text" placeholder="Enter name"  id="name" class="form-control"  name="name" value="{{Auth::guard('admin')->user()->name}}">
									</div>
									<div class="form-group">
										<label for="FullName">Email</label>
										<input type="text" placeholder="Enter email"  id="email" class="form-control"  name="email" value="{{Auth::guard('admin')->user()->email}}">
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label for="FullName">Old password</label>
										<input type="password" placeholder="Enter old password"  id="pass" class="form-control"  name="old_password">
									</div>
									
									<div class="form-group">
										<label for="FullName">New password </label>
										<input type="password" placeholder="Enter new password"   class="form-control" name="newPassword" id="new">
									</div>
									<div class="form-group">
										<label for="FullName">Confirm new password </label>
										<input type="password" placeholder=" Enter confirm password"   class="form-control" name="confirm" id="conf">
									</div>







									<div class="clearfix"></div>
									<div id="image" >
										<div class="form-group">
											<label for="image">Image <span style="color: red;">*</span></label>
											<div class="fileUpload btn btn-primary cust_file clearfix">
												<span class="upld_txt"><i class="fa fa-upload upld-icon" aria-hidden="true"></i>Upload Image</span>
												<input type="file"   class="upload" name="img" {{-- onmouseout ="vdo_img()" onkeyup="vdo_img()"  --}}id="img" accept="image/*"  onChange="fun();" >
											</div>
											{{-- <label for="image" style="margin-top: 10px;margin-bottom: 10px">Image dimension should be (200-1200 width) x (100-500 height)</label> --}}
											<label id="img-error" class="error" for="img"></label>
										</div>
										<div class="clearfix"></div>
										<div class="review_img rmm_001" style="display: none">
											<em><img src="" alt=""id="img2" style="width: 100px; height: 100px"></em>
										</div>
										<div class="clearfix"></div>
										<div class="form-group rm50 vdo-class">
											<label for="meta description">Previous Image</label>
											<br>
											@if(Auth::guard('admin')->user()->image)
											<img src="{{url('/')}}/storage/app/public/admin/{{Auth::guard('admin')->user()->image}}" style="width: 100px;">
											@else
											No Image
											@endif
										</div>
										
									</div>
									
									
									<div class="clearfix"></div>
									<div class="col-lg-12">
										<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Change</button>
									</div>
								</form>
							</div>
						</div>
						<!-- Personal-Information -->
					</div>
				</div>
			</div>
		</div>
		<!-- container -->
	</div>
	<!-- content -->
	
</div>
<!-- ============================================================== -->
<!-- End Right content here -->



@section('footer')
@include('admin.include.footer')
@endsection
@endsection
{{-- end content --}}


@section('script')
@include('admin.include.script')
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}} {{-- for datepicker --}}

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
        <script>
function fun(){
var i=document.getElementById('img').files[0];
//console.log(i);
var b=URL.createObjectURL(i);
$(".review_img").show();
$("#img2").attr("src",b);
}
</script>
@endsection