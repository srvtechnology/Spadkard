@extends('admin.layouts.app')
@section('title')
<title>Admin | Edit Html</title>
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
					<h4 class="pull-left page-title">Html Edit </h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active"> Html Edit </li>
					</ol>
				</div>
			</div>
			@include('admin.include.message')
			<div class="add-btn "><a href="{{route('admin.html.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>
			<div class="row">
				<div class="col-lg-12">
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
							<h3 class="panel-title">Add Industry Logo</h3> </div>
							<div class="panel-body rm02 rm04">
								<form role="form" action="{{route('admin.update.html')}}" id="frm" method="post" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="id" value="{{@$htmls->id}}">
									<div class="form-group rm50">
										<label for="title">Html name</label>
										<input type="text"  class="form-control" id="AboutMe" placeholder="Enter name"  name="name"  value="{{@$htmls->name}}">
									</div>

									<div class="form-group rm50">
										<label for="title">Template name</label>
										<input type="text"  class="form-control" id="AboutMe" placeholder="Enter name"  name="name"  value="{{@$htmls->temp_details->name}}" disabled>
									</div>


									<div class="clearfix"></div>
									<div class="form-group rm03">
										<label for="FullName">Html Front</label>
										<textarea id="mytextarea1" style="width: 95%;height: 300px" name="html"  >{!!@$htmls->html!!}</textarea>
									</div>


									<div class="clearfix"></div>
									<div class="form-group rm03">
										<label for="FullName">Html Back</label>
										<textarea id="mytextarea2" style="width: 95%;height: 300px" name="html_back" >{!!@$htmls->html_back!!}</textarea>
									</div>





									{{-- <input type="hidden" name="image" id="image" value=""> --}}
									<div class="clearfix"></div>
									{{-- <p>Previous Image</p>
									<img src="{{url('/')}}/storage/app/public/design/{{$htmls->image}}">--}}
									<div class="clearfix"></div>
									<div class="col-lg-12" style="margin-top: 10px;">
										<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Edit</button>
									</div> 
								</form>
								{{-- <h3>Preview :</h3>
								<div id="previewImg">
								</div> 
								<div class="form-group rm03" id="xyz" style=" z-index: -5;
									position: relative;
									top: -999999999999px;
									left: -999999999999px;" >
								</div> --}}
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
	$('#frm').validate({
	rules:{
	name:{
		required:true,
		minlength:3,
		},
	},
	messages:{
	//  link:{
	//     required:" social link is mandatory",
	//     min:"Enter valid links"
	// }
	}
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>{{-- for html2canva --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.0/tinymce.min.js" integrity="sha512-XaygRY58e7fVVWydN6jQsLpLMyf7qb4cKZjIi93WbKjT6+kG/x4H5Q73Tff69trL9K0YDPIswzWe6hkcyuOHlw==" crossorigin="anonymous"></script>
	<script>
	initTineMce();
	function initTineMce(selector) {
	if(selector == undefined){selector = 'textarea';}
	tinymce.init({
		cleanup : false,
    verify_html : false,
	content_css : "{{asset('public/frontend/css/style.css')}},{{asset('public/frontend/css/responsive.css')}},{{asset('public/frontend/css/bootstrap.css')}}",
	content_style: "@import url('https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Roboto&display=swap'); body { font-family: 'Roboto'; }",
	selector:"#mytextarea1",
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
	// setup: function (ed) {
	// ed.on('change', function(e) {
	// 	//alert(',khkjh');
	// //tinyMceChange(ed);
	// $("#previewImg").html('');
	// // console.log(tinyMCE.get('mytextarea1').getContent());
	// // alert("j");
	
	// $("#xyz").html(tinyMCE.get('mytextarea1').getContent());
	// 			html2canvas(document.getElementById("xyz"),{
	// 			 width: 1000,
 //                 height: 400,
	// 			}).then(function (canvas) {
	// 			var anchorTag = document.createElement("a");
	// 			document.body.appendChild(anchorTag);
	// 			document.getElementById("previewImg").appendChild(canvas);
	// 			anchorTag.download = "filename.jpg";
	// 			canvas.setAttribute('crossorigin', 'anonymous');
	// 			canvas.setAttribute('id', 'canvas');
	// 			anchorTag.href = canvas.toDataURL();
	// 			console.log(canvas.toDataURL());
	// 			$("#image").val(canvas.toDataURL());
				
	// });
	// });
	// },
	});
	}
	</script>


	<script>
	initTineMce();
	function initTineMce(selector) {
	if(selector == undefined){selector = 'textarea';}
	tinymce.init({
			cleanup : false,
    verify_html : false,
	content_css : "{{asset('public/frontend/css/style.css')}},{{asset('public/frontend/css/responsive.css')}},{{asset('public/frontend/css/bootstrap.css')}}",
	content_style: "@import url('https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Roboto&display=swap'); body { font-family: 'Roboto'; }",
	selector:"#mytextarea2",
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
	// setup: function (ed) {
	// ed.on('change', function(e) {
	// 	//alert(',khkjh');
	// //tinyMceChange(ed);
	// $("#previewImg").html('');
	// // console.log(tinyMCE.get('mytextarea1').getContent());
	// // alert("j");
	
	// $("#xyz").html(tinyMCE.get('mytextarea1').getContent());
	// 			html2canvas(document.getElementById("xyz"),{
	// 		     width: 1000,
 //                 height: 400,
	// 			}).then(function (canvas) {
	// 			var anchorTag = document.createElement("a");
	// 			document.body.appendChild(anchorTag);
	// 			document.getElementById("previewImg").appendChild(canvas);
	// 			anchorTag.download = "filename.jpg";
	// 			canvas.setAttribute('crossorigin', 'anonymous');
	// 			anchorTag.href = canvas.toDataURL();
	// 			console.log(canvas.toDataURL());
	// 			$("#image").val(canvas.toDataURL());
				
	// });
	// });
	// },
	});
	}
	</script>
	@endsection