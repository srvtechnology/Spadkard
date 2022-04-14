@extends('layouts.app')
@section('title')
<title>User | Edit Profile</title>
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
						Edit Profiles
						</h3>
						<a href="{{route('added.profile.list',$profiles->user_to_temp_id)}}" class="btn btn-info btn-bold px-4" >Back</a>

					</div>
					@include('frontend.include.message')
					<div class="card-box brc-blue-m2">
						<div class="card-box-body">
							<form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data" id="frm">
								@csrf
								<input type="hidden" name="profile_id" value="{{$profiles->id}}">
								
								

								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Profile Name
											</label>
											<input type="text" placeholder="Enter Profile Name" name="name" class="form-control" id="" value="{{$profiles->profile_name}}" />
										</div>
									</div>
									
									
									<div class="clearfix"></div>
							
									<div class="col-lg-12">
										<hr>
										<div class="form-group mb-0">
											<button class="btn btn-info btn-bold px-4" type="submit">
											EDIT
											</button>
											
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
		

$('#frm').validate({
rules:{
name:{
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