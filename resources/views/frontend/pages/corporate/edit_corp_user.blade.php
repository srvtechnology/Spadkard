@extends('layouts.app')
@section('title')
<title>User | Edit Corporate Card</title>
<style type="text/css">
	.error{
		color: red;
	}
</style>
<link href="{{ URL::asset('public/frontend/croppie/croppie.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('public/frontend/croppie/croppie.min.css') }}" rel="stylesheet" />
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
						Edit Corporate card
						</h3>
						<a href="{{route('corp.card.list',$master->id)}}" class="btn btn-info btn-bold px-4" >Back</a>
					</div>
					@include('frontend.include.message')
					<div class="card-box brc-blue-m2">
						<div class="card-box-body">
							<form action="{{route('update.corp.user.card')}}" method="post" enctype="multipart/form-data" id="frm">
								@csrf
								<input type="hidden" name="id" value="{{@$datas->id}}">
								
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												User Name
											</label>
											<input type="text" placeholder="Enter Name" name="name" class="form-control" id="" value="{{@$datas->name}}" />
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
											<input type="text" placeholder="Enter Email" name="email" class="form-control" id="" value="{{@$datas->email}}" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Mobile
											</label>
											<input type="text" placeholder="Enter Mobile Number" name="ph" class="form-control" id=""  value="{{@$datas->ph}}" />
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Address
											</label>
											<input type="text" placeholder="Enter Address" name="address" class="form-control" id="" value="{{@$datas->address}}" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Company Name
											</label>
											<input type="text" placeholder="Enter Comapny Name" name="company" class="form-control" id="" value="{{@$datas->company}}" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Tag Line
											</label>
											<input type="text" placeholder="Enter TagLine" name="tag" class="form-control" id="" value="{{@$datas->tag}}" />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="">
												Choose Profile
											</label>
											<select name="profile_id">
												<option value="">Chose Proile</option>
												@foreach($profiles as $val)
												<option value="{{$val->id}}" @if($val->id == $datas->profile_id)  selected @endif>{{$val->profile_name}}</option>
												@endforeach
											</select>
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
									</div>
									--}}
									<div class="col-lg-6" style="margin-top: 20px">
										<div class="form-group">
											<label for="">
												Logo (optioal)
											</label>
											<input type="file" class="form-control"   name="temp" accept="image/*"  id="icon">
											<input type="hidden" name="profile_picture" id="profile_picture">
										</div>
										<label for="image">Uploaded image dimention should be within (10-150 width) x (10-150 height)</label>
									</div>
									<div class="clearfix"></div>
									<div class="uplodimgfilimg">
										<em><img id="custom_temp" src="" alt="" ></em>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label for="">
											Previous logo
										</label>
										@if(@$datas->logo)
										<img src="{{url('/')}}/public/logo_for_user/{{@$datas->logo}}">
										@else
										<img src="{{url('/')}}/public/logo/{{@$master->logo}}">
										@endif
									</div>
									
									
									<div class="col-lg-12">
										<hr>
										<div class="form-group mb-0">
											<button class="btn btn-info btn-bold px-4" type="submit">
											Edit
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
				<div class="modal" tabindex="-1" role="dialog" id="croppie-modal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Crop Image</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-12">
										<div class="croppie-div" style="width: 100%;"></div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" id="crop-img">Save changes</button>
								<button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
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
maxlength:10,
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
profile_id:{
required:true,
//minlength:3,
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
<script src="{{ URL::asset('public/frontend/croppie/croppie.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
function dataURLtoFile(dataurl, filename) {
var arr = dataurl.split(','),
mime = arr[0].match(/:(.*?);/)[1],
bstr = atob(arr[1]),
n = bstr.length,
u8arr = new Uint8Array(n);
while(n--){
u8arr[n] = bstr.charCodeAt(n);
}
return new File([u8arr], filename, {type:mime});
}
var uploadCrop;
$(document).ready(function(){
$(".js-example-basic-multiple").select2();
if($('.type').val()=='C'){
$(".s_h_hids").slideDown(0);
} else{
$(".s_h_hids").slideUp(0);
}
$(".ccllk02").click(function(){
$(".s_h_hids").slideDown();
});
$(".ccllk01").click(function(){
$(".s_h_hids").slideUp();
$('.cmpy').val('');
});
$(".type-radio").change(function(){
var t= $("input[name=type]:checked").val();
if(t=="I"){
$(".comany_name").css('display','none');
}else{
$(".comany_name").css('display','block');
}
});
$('#croppie-modal').on('hidden.bs.modal', function() {
uploadCrop.croppie('destroy');
});
$('#croppie-modal .close, #croppie-modal .close_btn').on('click', function() {
$('#icon').val('');
});
$('#crop-img').click(function() {
uploadCrop.croppie('result', {
type: 'base64',
format: 'png'
}).then(function(base64Str) {
$("#croppie-modal").modal("hide");
//  $('.lds-spinner').show();
let file = dataURLtoFile('data:text/plain;'+base64Str+',aGVsbG8gd29ybGQ=','hello.png');
console.log(file.mozFullPath);
console.log(base64Str);
// $('#file').val(base64Str);
$('#profile_picture').val(base64Str);
// $.each(file, function(i, f) {
var reader = new FileReader();
reader.onload = function(e){
$('.uplodimgfilimg').append('<em><img id="custom_temp" src="' + e.target.result + '"  style="width: 100px ; height: 100px;margin-top:5px"><em>');
$(".unq-background-image-front").css("background-image","url(' "+e.target.result+"' )");
$(".unq-background-image-front").css("background-size","cover");
$(".unq-background-image-front").css("background-position-x","inherit");
};
reader.readAsDataURL(file);
//  });
$('.uplodimgfilimg').show();
});
});
});
$("#icon").change(function () {
$('.uplodimgfilimg').html('');
let files = this.files;
console.log(files);
let img  = new Image();
if (files.length > 0) {
let exts = ['image/jpeg', 'image/png', 'image/gif'];
let valid = true;
$.each(files, function(i, f) {
if (exts.indexOf(f.type) <= -1) {
valid = false;
return false;
}
});
if (! valid) {
alert('Please choose valid image files (jpeg, png, gif) only.');
$("#icon").val('');
return false;
}
// img.src = window.URL.createObjectURL(event.target.files[0])
// img.onload = function () {
//     if(this.width > 250 || this.height >160) {
//         flag=0;
//         alert('Please upload proper image size less then : 250px x 160px');
//         $("#file").val('');
//         $('.uploadImg').hide();
//         return false;
//     }
// };
$("#croppie-modal").modal("show");
uploadCrop = $('.croppie-div').croppie({
viewport: { width: 450, height: 300, type: 'square' },
boundary: { width: $(".croppie-div").width(), height: 400 }
});
var reader = new FileReader();
reader.onload = function (e) {
$('.upload-demo').addClass('ready');
// console.log(e.target.result)
uploadCrop.croppie('bind', {
url: e.target.result
}).then(function(){
console.log('jQuery bind complete');
});
}
reader.readAsDataURL(this.files[0]);
//  $('.uploadImg').append('<img width="100"  src="' + reader.readAsDataURL(this.files[0]) + '">');
//  $.each(files, function(i, f) {
//      var reader = new FileReader();
//      reader.onload = function(e){
//          $('.uploadImg').append('<img width="100"  src="' + e.target.result + '">');
//      };
//      reader.readAsDataURL(f);
//  });
//  $('.uploadImg').show();
}
});
</script>
@endsection