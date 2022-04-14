@extends('admin.layouts.app')
@section('title')
<title>Admin | Footer management</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="pull-left page-title">Footer Management</h4>
					<ol class="breadcrumb pull-right">
						   <li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active">Change profile</li>
					</ol>
				</div>
			</div>
			
			{{-- for upload --}}
			@include('admin.include.message')
			<div class="row">
				<div class="col-lg-12">
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
							<h3 class="panel-title">Edit Footer</h3> </div>
							<div class="panel-body rm02 rm04">
								<form role="form" id="frm" method="post" action="{{route('admin.upload.footer')}}" enctype="multipart/form-data">
									@csrf
									
									<input type="hidden" name="id" value="{{$footer->id}}">
									<div class="form-group rm50">
										<label for="FullName">Footer Text </label>
										
										<textarea class="form-control" name="text" id="text" style="width: 300px;height: 100px">{{$footer->text}}</textarea>
									</div>
									<div class="clearfix"></div>
									<div class="form-group rm50">
										<label for="FullName">Footer Address</label>
										<input type="text" placeholder="Address"  class="form-control" name="address" value="{{@$footer->address}}">
									</div>
									<div class="clearfix"></div>
									{{-- <div class="form-group rm50">
										<label for="FullName">Footer Address line two</label>
										<input type="text" placeholder="Address"  class="form-control" name="address_2" value="{{@$footer->address_2}}">
									</div> --}}
									<div class="clearfix"></div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="image">Address Image</label>
												<div class="fileUpload btn btn-primary cust_file clearfix">
													<span class="upld_txt"><i class="fa fa-upload upld-icon" aria-hidden="true"></i>Address Image</span>
													<input type="file"  id="file-1" class="upload" name="img" accept="image/*" onChange="fun();">
												</div>
												
											</div>
											<div class="clearfix"></div>
											<div class="review_img rmm_001" style="display: none">
												<em><img src="" alt=""id="img2" style="width: 30px; height: 30;display: block; "></em>
											</div>
											<label for="image" style="margin-top:0px;margin-bottom: 50px">Image dimension should be (10-100 width) x (10-100 height)</label>
										</div>
										<div class="col-md-6">
											<label for="meta description">Previous Address Image</label>
											<div class="rm50 vdo-class">
												
												<img src="{{url('/')}}/storage/app/public/footer/address/{{@$footer->address_img}}" style="width: 20px; background-color: #212b33">
											</div>
										</div>
									</div>
									
									
									<div class="clearfix"></div>
									{{--  <div class="form-group rm50 vdo-class">
										<label for="meta description">Previous Address Image</label>
										<br>
										<img src="{{url('/')}}/storage/app/public/footer/address/{{@$footer->address_img}}" style="width: 20px;">
									</div> --}}
									<div class="clearfix"></div>
									<div class="form-group rm50">
										<label for="FullName">Footer Email</label>
										<input type="text" placeholder="Email"  class="form-control" name="email" value="{{@$footer->email}}">
									</div>
									<div class="clearfix"></div>
									
									
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="image">Email Image</label>
												<div class="fileUpload btn btn-primary cust_file clearfix">
													<span class="upld_txt"><i class="fa fa-upload upld-icon" aria-hidden="true"></i>Email Image</span>
													<input type="file"  id="file-2" class="upload" name="img2" accept="image/*" onChange="fun2();">
												</div>
												<div class="clearfix"></div>
												<div class="review_img2 rmm_001" style="display: none">
													<em><img src="" alt=""id="img22" style="width: 20px; height: 20px;display: block; "></em>
												</div>
												
											</div>
											<label for="image" style="margin-top:0px;margin-bottom: 10px">Image dimension should be (10-100 width) x (10-100 height)</label>
										</div>
										<div class="col-md-6">
											<label for="meta description">Previous Email Image</label>
											<div class="rm50 vdo-class">
												
												<img src="{{url('/')}}/storage/app/public/footer/email/{{@$footer->email_image}}" style="width: 20px;background-color: #212b33">
											</div>
										</div>
									</div>
									
									<div class="clearfix"></div>
									{{-- <div class="form-group rm50 vdo-class">
										<label for="meta description">Previous Email Image</label>
										<br>
										<img src="{{url('/')}}/storage/app/public/footer/email/{{@$footer->email_image}}" style="width: 20px;">
									</div> --}}
									
									<div class="clearfix"></div>
									<div class="col-lg-12" style="margin-top: 10px;">
										<button class="btn btn-primary waves-effect waves-light w-md" type="submit">SAVE</button>
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
text:{
required:true,
minlength:3,
},
address:{
required:true,
minlength:3,
maxlength:50,
},
email:{
required:true,
validate_email:true,
},
address_2:{
required:true,
minlength:3,
},
},
submitHandler: function(form){
var textareas = $('#text').val();
var words = $.trim(textareas).length ? textareas.match(/\S+/g).length : 0;
if(words >14 && words <21 ) {
// alert(words);
// return false;
form.submit();
}
else {
alert("Words range should be within 15 to 20.");
//$("#about_err").html('Please enter maximum 200 words');
return false;
}
},
});
});
</script>
<script>
function fun(){
var i=document.getElementById('file-1').files[0];
//console.log(i);
var b=URL.createObjectURL(i);
$(".review_img").show();
$("#img2").attr("src",b);
}
</script>
<script>
function fun2(){
var i2=document.getElementById('file-2').files[0];
//console.log(i);
var b2=URL.createObjectURL(i2);
$(".review_img2").show();
$("#img22").attr("src",b2);
}
</script>
@endsection