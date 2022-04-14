@extends('admin.layouts.app')
@section('title')
<title>Admin | Banner management</title>
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
					<h4 class="pull-left page-title">Banner Management</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active">Banner Management</li>
					</ol>
				</div>
			</div>
			{{-- <div class="add-btn "><a href="{{route('schedule.list')}}"><i class="icofont-minus-circle"></i> Back</a></div> --}}
			<div class="row">
				<div class="col-lg-12">
					@include('admin.include.message')
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
							<h3 class="panel-title">Current banner image</h3> </div>
							<div class="panel-body rm02 rm04">
								@if($banner)
								<img src="{{url('/')}}/storage/app/public/banner_image/{{$banner->image}}" alt="Banner" style="width: 900px; height: 400px;display: block;margin-left: auto;margin-right: auto;  ">
								@else
								<p>No image</p>
								@endif
								
								
								
								<div class="clearfix"></div>
								
								
							</div>
						</div>
						<!-- Personal-Information -->
					</div>
				</div>
			</div>
			{{-- for upload --}}
			<div class="row">
				<div class="col-lg-12">
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
							<h3 class="panel-title">Edit banner</h3> </div>
							<div class="panel-body rm02 rm04">
								<form role="form" id="frm" method="post" action="{{route('admin.upload.banner')}}" enctype="multipart/form-data">
									@csrf
									<div class="form-group rm50">
										<label for="title">Banner Title</label>
										<input type="text"  class="form-control" id="AboutMe" placeholder="Enter name"  name="title"  value="{{@$banner->title}}">
									</div>
									<div class="clearfix"></div>
									<div class="form-group rm50">
										<label for="title">Banner Text</label>
										<textarea  name="text" id="description" style="width :500px;height: 100px"></textarea>
									</div>
									<div class="clearfix"></div>
									
									{{-- <div class="form-group rm50">
										<label for="FullName">Banner Description</label>
										
										<textarea id="mytextarea" name="desc" id="description">{!!@$banner->description!!}</textarea>
										<style>
										
										.tox.tox-tinymce {
										height: 300px !important;
										width: 400% !important;
										}
										
										</style>
									</div> --}}
									{{--   <div class="form-group rm03">
										<label for="FullName">Banner Description</label>
										<textarea id="mytextarea2" style="width: 95%;height: 300px" name="desc"  >{!!@$banner->description!!}</textarea>
									</div> --}}
									<div class="clearfix"></div>
									
									
									<div class="form-group">
										<label for="image">Image</label>
										<div class="fileUpload btn btn-primary cust_file clearfix">
											<span class="upld_txt"><i class="fa fa-upload upld-icon" aria-hidden="true"></i>Upload Image</span>
											<input type="file"  id="file-1" class="upload" name="img" accept="image/*" onChange="fun();">
										</div>
										<label for="image" style="margin-top: 10px;margin-bottom: 10px">Image dimension should be (700-2000 width) x (500-1000 height)</label>
									</div>
									<div class="clearfix"></div>
									<div class="review_img rmm_001" style="display: none">
										<em><img src="" alt=""id="img2" style="width: 700px; height: 350px;display: block;margin-left: auto;margin-right: auto;  "></em>
									</div>
									
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

	{{-- text table part --}}
	<div class="row container">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading rm02 rm04">
					
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>S.NO</th>
											<th>Text</th>
											
											
											<th class="rm07">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($text as $key=> $value)
										<tr>
											<td>{{@$key+ @$text->firstItem() }}</td>
											<td>{{@$value->text}}</td>
											
											<td class="rm07">
												<a href="javascript:void(0);" class="action-dots"  id="action{{$value->id}}"><img src="{{url('/')}}/public/adminasset/assets/images/action-dots.png" alt="" onclick="fun({{$value->id}})"></a>
												<div class="show-actions" id="show-action{{$value->id}}" style="display: none;"> <span class="angle"><img src="{{url('/')}}/public/adminasset/assets/images/angle.png" alt=""></span>
												<ul>
													<li><a onclick="return confirm('Are you sre want to delete?')" href="{{route('admin.banner.texr.del',$value->id)}}">Delete</a></li>
													
												</ul>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						
						{{-- {!!$text->links()!!} --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

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
$('#frm').validate({
rules:{
desc:{
required:true,
minlength:3,
},
title:{
required:true,
minlength:3,
},
text:{
required:true,
minlength:3,
},
},
messages:{
/*   old_password:{
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
},*/
},
submitHandler: function(form){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': "{{csrf_token()}}"
}
});
var fd= new FormData;
var im=document.getElementById("file-1").files[0];
fd.append("img",im);
//alert(im);
if(im==null){
	form.submit();
}
else{
	//alert("nio");
$.ajax({
url:"{{route('admin.check.img')}}",
method:"POST",
data: fd,
contentType: false,
processData: false,
success: function(res) {
	console.log(res);
	if(res.w<700){
		alert("Image dimention range (width:700px-2000px & height:500-1000; Uploaded size "+res.w + " x " +res.h);
		return false;
	}
	else if(res.w>2000){
		alert("Image dimention range (width:700px-2000px & height:500-1000; Uploaded size "+res.w + " x " +res.h);
		return false;
	}
	else if(res.h<500){
		alert("Image dimention range (width:700px-2000px & height:500-1000; Uploaded size "+res.w + " x " +res.h);
		return false;
	}
	else if(res.h>1000){
		alert("Image dimention range (width:700px-2000px & height:500-1000; Uploaded size "+res.w + " x " +res.h);
		return false;
	}
	else{
		//alert("k");
	form.submit();
	}
}
});
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.0/tinymce.min.js" integrity="sha512-XaygRY58e7fVVWydN6jQsLpLMyf7qb4cKZjIi93WbKjT6+kG/x4H5Q73Tff69trL9K0YDPIswzWe6hkcyuOHlw==" crossorigin="anonymous"></script>
<script>
initTineMce();
function initTineMce(selector) {
if(selector == undefined){selector = 'textarea';}
tinymce.init({
content_css : "{{asset('public/frontend/css/style.css')}},{{asset('public/frontend/css/responsive.css')}},{{asset('public/frontend/css/bootstrap.css')}}",
content_style: "@import url('https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Roboto&display=swap'); body { font-family: 'Roboto'; }",
selector:"#mytextarea2",
extended_valid_elements: 'span',
menubar:false,
statusbar: false,
auto_focus : "elm1",
height: "350px",
plugins: "autoresize lists textcolor advlist table link media code image charmap fullpage  ",
file_picker_types: 'file image media',
advlist_bullet_styles: 'disc',
image_caption: true,
inline_boundaries: false,
relative_urls : false,
remove_script_host : false,
convert_urls : true,
font_formats:"Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago;Roboto=roboto; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
toolbar: 'code | insertfile undo redo | styleselect | fontselect | fontsizeselect | forecolor backcolor | bold italic underline | superscript subscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
lists_indent_on_tab: false,
// plugins: 'table',
// menubar: 'table',
setup: function (editor) {
editor.ui.registry.addButton('customInsertButton', {
text: 'Add Button',
onAction: function (_) {
editor.insertContent('&nbsp; <a href="_BTNLINK_" class="save_all_changes_btn">Button</a>&nbsp;');
}
});
},
});
}
</script> --}}

<script>
var resizefunc = [];
</script>
<script>
function fun(id){
$('.show-actions').slideUp();
$("#show-action"+id).show();
}
function Cancel(id){
$("#show-action"+id).hide();
}
$(document).mouseup(function(e)
{
var container = $(".show-actions");
// if the target of the click isn't the container nor a descendant of the container
if (!container.is(e.target) && container.has(e.target).length === 0)
{
container.hide();
}
});
</script>
@endsection