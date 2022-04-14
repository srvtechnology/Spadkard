@extends('admin.layouts.app')
@section('title')
<title>Admin | Add Material</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<style>
	#AboutMe{
		width: 200px !important;
		margin-left: 10px !important;
		margin-right: 10px !important;
	}
</style>
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
					<h4 class="pull-left page-title">Template Add </h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active"> Template Add </li>
					</ol>
				</div>
			</div>
			@include('admin.include.message')
			<div class="add-btn "><a href="{{route('admin.mat.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>
			<div class="row">
				<div class="col-lg-12">
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
								<h3 class="panel-title">Add Template</h3>
							</div>
							<div class="panel-body rm02 rm04">
								<form role="form" action="{{route('admin.insert.mat')}}" id="frm" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group rm50">
										<label for="title">Materail name</label>
										<input type="text"  class="form-control"  placeholder="Enter name"  name="name" >
									</div>
									<div class="clearfix"></div>
								<div class="form-group rm50">
										<label for="title">Materail Price</label>
										<input type="number"  class="form-control"  placeholder="Enter price"  name="price" >
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
	jQuery.validator.addMethod("emailonly", function(value, element) {
return this.optional(element) || /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value.toLowerCase());
}, "Enter valid email");
jQuery.validator.addMethod("mobileonly", function(value, element) {
return this.optional(element) ||  /^[+]?\d+$/.test(value.toLowerCase());
}, "Enter valid number");
$('#frm').validate({
rules:{
name:{
required:true,
minlength:3,
},
price:{
required:true,
 min:10,
 max:5000,    
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

@endsection