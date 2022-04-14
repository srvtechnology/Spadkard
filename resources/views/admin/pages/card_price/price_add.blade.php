@extends('admin.layouts.app')
@section('title')
<title>Admin | Add Card Price</title>
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
					<h4 class="pull-left page-title">Card Price Add </h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active"> Card Price Add </li>
					</ol>
				</div>
			</div>
			@include('admin.include.message')
			<div class="add-btn "><a href="{{route('admin.price.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>
			<div class="row">
				<div class="col-lg-12">
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
							<h3 class="panel-title">Add Card Price</h3> </div>
							<div class="panel-body rm02 rm04">
								<form role="form" action="{{route('admin.insert.card.price')}}" id="frm" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group rm50">
										<label for="title">Card No From</label>
										<input type="number"  class="form-control"  placeholder="Enter card no from"  name="card_no_from" id="from" min="0" >
									</div>
									<div class="clearfix"></div>
								<div class="form-group rm50">
										<label for="title">Card No To</label>
										<input type="number"  class="form-control"  placeholder="Enter card no to"  name="card_no_to" id="to"  min="0">
									</div>
									<div class="clearfix"></div>
									<div class="form-group rm50">
										<label for="title">Card Price (Per card price)</label>
										<input type="text"  class="form-control"  placeholder="Enter price per card"  name="price" >
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
card_no_from:{
	required:true,
	
},	
card_no_to:{
required:true,
},
price:{
required:true,
min:1,
},
},
messages:{
//  link:{
//     required:" social link is mandatory",
//     min:"Enter valid links"
// }
},
submitHandler:function(form){
  var from = parseInt($('#from').val());
  var to = parseInt($('#to').val());
  //console.log(from);
  //console.log(to);
  //return false;
  if (from>to) {
    alert('Card From No. should be less than Card to No. ');
    return false;
  } else if(from == to){
        alert('Card From No. should be less than to Card to No. ');
        return false;
  }
  else{
    form.submit();
  }
} 
});
});
</script>

@endsection