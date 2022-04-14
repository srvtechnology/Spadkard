@extends('admin.layouts.app')
@section('title')
<title>Admin | Corporate Print Request</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<style>
	#example_length{
		display: none;
	}
	#example_filter{
		display: none;
	}
	#example_info{
		display: none;
	}
</style>
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
					<h4 class="pull-left page-title">Corporate Print Request list</h4>
					<ol class="breadcrumb pull-right">
                                <li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
                                <li class="active">Corporate Print Request list</li>
                     </ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					@include('admin.include.message')
					{{-- <div class="add-btn " style="float: left"><a href="{{route('admin.manage.template.add.view')}}"><i class="icofont-plus-circle"></i> Add</a></div> --}}
					<div class="clearfix"></div>
					<div class="panel panel-default">
						<div class="panel-heading rm02 rm04">
						
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="table-responsive">
										<table  id="example" class="table">
											<thead>
												<tr>
													<th>S.NO</th>
													<th>Master User</th>
													<th>Template Type</th>
													<th>Price</th>
													<th>Total Buy</th>
													<th>Total Print Request</th>
													<th>Print pending</th>
													<th>Print Completed</th>
													<th>Request Time</th>
													
													<th class="rm07">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($print_req_users as $key=> $value)
												<tr>
													<td>{{-- {{@$key+ @$print_req_users->firstItem() }} --}}</td>
													<td>{{@$value->userDetails->name}}</td>
													@php
													$type=DB::table('template')->where('id',$value->template_id)->first();
													@endphp
													<td>
														@if($type->added_by=="U")
                                                              Customized
														@else
														Pre defined

														@endif
													</td>
													<td>{{@$value->amount}}</td>
													<td>{{@$value->total_order}}</td>
													
														@php
														$total_req_pending=DB::table('corporate_added_user')->where('admin_status','I')->where('user_to_temp_id',$value->id)->count();
														$req_time=DB::table('corporate_added_user')->where('admin_status','I')->where('user_to_temp_id',$value->id)->orWhere('admin_status','C')->where('user_to_temp_id',$value->id)->first();
														$total_completed=DB::table('corporate_added_user')->where('admin_status','C')->where('user_to_temp_id',$value->id)->count();
														@endphp
                                                        <td>{{@$total_req_pending +$total_completed }}</td>
														<td>{{@$total_req_pending}}</td>
														<td>{{@$total_completed}}</td>


														<td>{{@$req_time->updated_at}}</td>


													
													
													

													
													
													<td class="rm07">
														<a href="javascript:void(0);" class="action-dots"  id="action{{$value->id}}"><img src="{{url('/')}}/public/adminasset/assets/images/action-dots.png" alt="" onclick="fun({{$value->id}})"></a>
														<div class="show-actions"  id="show-action{{$value->id}}" style="display: none;width: 200px;"> <span class="angle"><img src="{{url('/')}}/public/adminasset/assets/images/angle.png" alt=""></span>
														<ul>

															
															
															
															<li><a href="{{route('admin.corp.all.print.req.card.list',$value->id)}}">Print Pending List <span class="badge"style="color: white; background-color: orange">{{$total_req_pending}}</span></a></li>

															<li><a href="{{route('admin.corp.completed.print',$value->id)}}">Print Completed List <span class="badge" style="color: white; background-color: green">{{$total_completed}}</span></a></li>

															
														
															
														</ul>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							
								{!!$print_req_users->links()!!}
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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
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
<script>
	$(document).ready(function() {
    var t = $('#example').DataTable( {
    	 "pageLength":10,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        // "columnDefs": [
            
        //     { "width": "15%", "targets": 1 },
        //     { "width": "15%", "targets": 4 },
        //     { "width": "15%", "targets": 5 },

       
        //  ],
        "order": [[ 5, 'desc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>
@endsection