@extends('layouts.app')
@section('title')
<title>User | Re-Print User</title>
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
						 Re-Print User
						</h3>
						<a href="{{-- {{route('request.card.list')}} --}}" class="btn btn-info btn-bold px-4" >Back</a>

					</div>
					@include('frontend.include.message')
					<div class="card-box brc-blue-m2">
						<div class="card-box-body">
							<form action="{{route('insert.reprint.card')}}" method="post" enctype="multipart/form-data" id="frm">
								@csrf
								<input type="hidden" name="user_to_temp_id" value="{{$datas->user_to_temp_id}}">
								<input type="hidden" name="master_added_user_id" value="{{$datas->id}}">
								<input type="hidden" name="temp_id" value="{{$datas->template_id}}">
								<input type="hidden" name="design_id" value="{{$datas->html_id}}">
								

								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												User Name
											</label>
											<input type="text" placeholder="Enter Name" name="name" class="form-control" id="" value="{{$datas->name}}" />
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
											<input type="text" placeholder="Enter Email" name="email" class="form-control" id="" value="{{$datas->email}}"/>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Mobile
											</label>
											<input type="text" placeholder="Enter Mobile Number" name="ph" class="form-control" id="" value="{{$datas->ph}}" />
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Address
											</label>
											<input type="text" placeholder="Enter Address" name="address" class="form-control" id="" value="{{$datas->address}}"/>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Company Name
											</label>
											<input type="text" placeholder="Enter Comapny Name" name="company" class="form-control" id="" value="{{$datas->company}}" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Tag Line
											</label>
											<input type="text" placeholder="Enter TagLine" name="tag" class="form-control" id="" value="{{$datas->tag}}" />
										</div>
									</div>
									
									<div class="clearfix"></div>
									<br>
									{{-- <div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Logo (optioal)
											</label>
											<input type="file" accept="image/*" class="form-control" onChange="fun();" id="img" name="logo">
										</div>
										<label for="image">Uploaded image dimention should be within (10-150 width) x (10-150 height)</label>
									</div>
									<div class="clearfix"></div>
									<div class="review_img rmm_001" style="display: none">
										<em><img src="" alt=""id="img2" style="width: 200px; height: 150px"></em>
									</div> --}}

									<br>
									
									

									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												By default logo
											</label>
											@if(@$datas->logo)
										<img src="{{url('/')}}/public/logo_for_user/{{@$datas->logo}}" style="width: 100px;height: 100px;">
										@else
										@php
										$master=DB::table('user_to_template')->where('id',$datas->user_to_temp_id)->first();
										@endphp
										<img src="{{url('/')}}/public/logo/{{@$master->logo}}" style="width: 100px;height: 100px;">
										@endif
										</div>
									</div>
									
									
									<div class="col-lg-12">
										<hr>
										<div class="form-group mb-0">
											<button class="btn btn-info btn-bold px-4" type="submit">
											Re Print Request
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
function fun(){
var i=document.getElementById('img').files[0];
//console.log(i);
var b=URL.createObjectURL(i);
$(".review_img").show();
$("#img2").attr("src",b);
}
</script>
<script>
$(document).ready(function(){
		jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
	return true;
	} else {
	return false;
	}
	}, "Please enter a valid email address.");

	 jQuery.validator.addMethod("mobileonly", function(value, element) {
	    return this.optional(element) ||  /^[+]?\d+$/.test(value.toLowerCase());
	}, "Enter valid number");


$('#frm').validate({
rules:{
name:{
required:true,
minlength:3,
},
email:{
required:true,
validate_email:true,
},
ph:{
required:true,
mobileonly:true,
minlength:10,
},
company:{
required:true,
minlength:3,
},
address:{
required:true,
minlength:3,
},
tag:{
required:true,
minlength:3,
},
},
// messages:{
// name:{
// required:'Please enter template name',
// },
// image:{
// required:'Please upload template image',
// },
// }
});
});
</script>
@endsection