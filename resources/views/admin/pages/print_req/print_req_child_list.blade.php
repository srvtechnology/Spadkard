@extends('admin.layouts.app')
@section('title')
<title>Admin | Print Pending List</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
@endsection
@section('content')



<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="pull-left page-title">Print Pending List</h4>
					<ol class="breadcrumb pull-right">
                                <li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
                                <li class="active">Print Pending List</li>
                     </ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					@include('admin.include.message')
					{{-- <div class="add-btn " style="float: left"><a href="{{route('admin.manage.template.add.view')}}"><i class="icofont-plus-circle"></i> Add</a></div> --}}
					<div class="add-btn "><a href="{{route('admin.print.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>

					<div class="clearfix"></div>
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
													<th>Card Id</th>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile</th>
													<th>Company</th>
													<th>Address</th>
													
													<th class="rm07">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($print_req as $key=> $value)
												<tr>
													<td>{{@$key+ @$print_req->firstItem() }}</td>
													<td>{{@$value->id}}</td>
													<td>{{@$value->name}}</td>
													<td>{{@$value->email}}</td>									
     												<td>{{@$value->ph}}</td>
													<td>{{@$value->company}}</td>
													<td>{{@$value->address}}</td>

																										
													
													<td class="rm07">
														<a href="javascript:void(0);" class="action-dots"  id="action{{$value->id}}"><img src="{{url('/')}}/public/adminasset/assets/images/action-dots.png" alt="" onclick="fun({{$value->id}})"></a>
														<div class="show-actions" id="show-action{{$value->id}}" style="display: none;"> <span class="angle"><img src="{{url('/')}}/public/adminasset/assets/images/angle.png" alt=""></span>
														<ul>

															
															
															
															<li><a href="{{route('admin.print.card',$value->id)}}">Print</a></li>

															<li><a href="{{route('admin.view.print.details',$value->id)}}">View Details</a></li>

															<li><a href="{{route('admin.per.card.link',["id"=>$value->id,"name"=>$value->name])}}">Card Link</a></li>

															
														
															
														</ul>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							
								{!!$print_req->links()!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End row -->
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