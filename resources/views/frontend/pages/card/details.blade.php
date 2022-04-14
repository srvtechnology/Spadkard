@extends('layouts.app')
@section('title')
<title>User | Dashboard</title>
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
						Details
						</h3>
						<a href="{{route('request.card.list')}}" class="btn btn-info btn-bold px-4" >Back</a>
					</div>
					@include('frontend.include.message')
					<div class="card-box brc-blue-m2">
						<div class="card-box-body">
							
							
							
							
							<div class="row">
								

									<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											Name : {{$details->name}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											Email : {{$details->email}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											ph : {{$details->ph}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											company : {{$details->company}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											address : {{$details->address}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											TagLine : {{$details->tag}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											Amount : {{$details->amount}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											material id : {{$details->material_details->name}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											Font color : {{$details->font_color}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											Order Type : @if($details->order_type="M")
											Multiple Cards
											@else
											Single Card
											@endif


										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											Total order : {{$details->total_order}}
										</label>
										
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											Time : {{$details->created_at}}
										</label>
										
									</div>
								</div>

								<div class="col-lg-8">
									<div class="form-group">
										<label for="">
											Template Type: @if($details->temp_img->added_by=="A")
											Pre-Defined
											@else
											Customize
											@endif
										</label>
										
									</div>
								</div>
								
								
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<a href="{{route('printed.list',$details->id)}}" class="btn btn-info btn-bold px-4" style="width: 30%;">Printed card history</a>
					<h3 class="card-title text-125 text-primary-d2" style="margin-top: 30px">
						@php
						$total=DB::table('added_user')->where('user_id',auth::user()->id)->where('user_to_temp_id',$details->id)->where('status','A')->where('print_status','NP')->count();
						@endphp
					Filled cards : {{$total}}
					</h3>

					
					<div class="card-box-body">
						<table id="example2" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>SL.NO</th>
									<th>Card No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Company</th>
									{{-- <th>Status</th> --}}
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($all_added_users as $key=> $value)
								<tr>
									<td>{{-- {{@$key+ @$all_added_users->firstItem() }} --}}</td>
									<td>{{@$value->id}}</td>
									<td>{{@$value->name}}</td>
									<td>{{@$value->email}}</td>
									<td>{{@$value->ph}}</td>
									
									<td>{{@$value->company}}</td>
									{{-- <td>
										@if($value->status=="A")
										<span class="badge badge-sm bgc-green-d1 text-white pb-1 px-25">Active</span>

										@else
 <span class="badge badge-sm bgc-red-d1 text-white pb-1 px-25">Inactive</span>

										@endif 
										</td>
										--}}
									<td>
										
										<a href="{{route('user.edit.page',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
											<i class="fas fa-edit"></i>
										</a>

										<a onclick="return confirm('Are you sure want to delete this user?')"  href="{{route('user.delete',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
											<i class="fas fa-trash"></i>
										</a>

										<a href="{{route('single.card.view',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
												<i class="fas fa-eye"></i>
											</a>

											 <a href="{{route('pers.user.card.link',["id"=>$value->id,"name"=>$value->name])}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
											Card Link
										</a>
										
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
					</div>
					@if(count($all_added_users)>0)

					<a  onclick="return confirm('Are you sure want to sent request for above listed user for print card?');" href="{{route('printed.request',$details->id)}}" class="btn btn-info btn-bold px-4" style="width: 30%;">Request for print</a>
					@endif
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
	<script>
	$(document).ready(function() {
    var t = $('#example2').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>
	@endsection