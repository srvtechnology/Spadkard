@extends('admin.layouts.app')
@section('title')
<title>Admin | Edit Indistry Logo</title>
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
					<h4 class="pull-left page-title">Indistry Logo Edit </h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active"> Indistry Logo Edit </li>
					</ol>
				</div>
			</div>
			@include('admin.include.message')
			<div class="add-btn "><a href="{{route('admin.logo.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>
			<div class="row">
				<div class="col-lg-12">
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
							<h3 class="panel-title">Edit Industry Logo</h3> </div>
							<div class="panel-body rm02 rm04">
								<form role="form" action="{{route('admin.update.logo')}}" id="frm" method="post" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="id" value="{{@$logo->id}}">
									<div class="form-group rm50">
										<label for="title">Logo name</label>
										<input type="text"  class="form-control" id="AboutMe" placeholder="Enter name"  name="name"  value="{{@$logo->name}}">
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label for="image">Logo</label>
										<div class="fileUpload btn btn-primary cust_file clearfix">
											<span class="upld_txt"><i class="fa fa-upload upld-icon" aria-hidden="true"></i>Upload Logo</span>
											<input type="file"  id="img" class="upload" name="image" accept="image/*" onChange="fun();">
										</div>
										<label for="image">Uploaded image dimention should be within (10-150 width) x (10-150 height)</label>
									</div>
									<div class="clearfix"></div>
									<div class="review_img rmm_001" style="display: none">
										<em><img src="" alt=""id="img2"></em>
									</div>
									 <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label for="Email">Previous Image</label>
                                        <div class="uplodimgfilimgs">
                                            <em><img src="{{url('/')}}/storage/app/public/industry_logo/{{@$logo->image}}" alt="" style="width: 150px !important; height: 150px !important"></em>
                                        </div>
                                    </div>
                                    
									
									
									<div class="clearfix"></div>
									<div class="col-lg-12" style="margin-top: 10px;">
										<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Add</button>
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
@endsection