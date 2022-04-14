@extends('admin.layouts.app')
@section('title')
<title>Admin | Manage Html</title>
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
					<h4 class="pull-left page-title">Html Management</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active">Html Management</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					@include('admin.include.message')
					<div class="add-btn " style="float: left"><a href="{{route('admin.add.html.page')}}"><i class="icofont-plus-circle"></i> Add</a></div>
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
													<th>Html Name</th>
													<th>Temp Name</th>
													<th>Temp front Image</th>
													<th>Temp back Image</th>
													<th>Html Status</th>
													
													
													<th class="rm07">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($htmls as $key=> $value)
												<tr>
													<td>{{@$key+ @$htmls->firstItem() }}</td>
													<td>{{@$value->name}}</td>
													<td>{{@$value->temp_details->name}}</td>
													<td><img src="{{url('/')}}/storage/app/public/template_front/{{@$value->temp_details->image}}" style="width: 150px;height: 150px"></td>
													<td><img src="{{url('/')}}/storage/app/public/template_back/{{@$value->temp_details->back_image}}" style="width: 150px;height: 150px"></td>
													<td>
														@if($value->status=="A")
														Active
														@else
														Inactive
														@endif
													</td>
													
													
													
													
													
													<td class="rm07">
														<a href="javascript:void(0);" class="action-dots"  id="action{{$value->id}}"><img src="{{url('/')}}/public/adminasset/assets/images/action-dots.png" alt="" onclick="fun({{$value->id}})"></a>
														<div class="show-actions" id="show-action{{$value->id}}" style="display: none;"> <span class="angle"><img src="{{url('/')}}/public/adminasset/assets/images/angle.png" alt=""></span>
														<ul>
															
															
															<li><a href="{{route('admin.html.view',$value->id)}}">View</a></li>
															<li><a href="{{route('admin.html.edit',$value->id)}}">Edit</a></li>
															@if($value->status=="A")
															<li><a onclick="return confirm('are you sure want to deactive this html?')" href="{{route('admin.html.inactive',$value->id)}}">Deactive</a></li>
															@else
															<li><a onclick="return confirm('are you sure want to Active this html?')" href="{{route('admin.html.active',$value->id)}}">Active</a></li>
															@endif
															<li><a onclick="return confirm('are you sure want to delete?')" href="{{route('admin.html.del',$value->id)}}">delete</a></li>
															
															
															
															
														</ul>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								
								{!!$htmls->links()!!}
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