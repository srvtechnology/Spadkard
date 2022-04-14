@extends('layouts.app')
@section('title')
<title>User |  Corporate Card list</title>
@endsection
@include('frontend.include.head')
@section('content')
<div class="body-container">
	@include('frontend.include.nav')
	<div class="main-container bgc-white">
		@include('frontend.include.left_part')
		<div role="main" class="main-content">
			<div class="page-content container container-plus">
				<div class="card acard mt-2 mt-lg-3">
					<div class="card-header">
							<a href="{{route('corporate.card.add.page',@$id)}}" class="btn btn-info btn-bold px-4" style="float: left;" >Add Corporate Card</a>
						<h3 class="card-title text-125 text-primary-d2" style="text-align: center;">
						 Corporate Card list
						</h3>
					
						<a href="{{route('corp.list')}}" class="btn btn-info btn-bold px-4" >Back</a>
					</div>
					@include('frontend.include.message')
					<div class="card-box brc-blue-m2">
						<div class="card-box-body">
							<table id="example2" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>SL.NO</th>
										{{-- <th>Card Id</th> --}}
										<th>Name</th>
										
										<th>Email</th>
										<th>Ph</th>
										<th>Profile Name</th>
										
									
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($all_corp_users as $key=> $value)
									<tr>
										<td></td>
										{{-- <td>{{@$value->id}}</td> --}}
										<td>
											{{$value->name}}
										</td>
										<td>
											{{$value->email}}
										</td>
										<td>{{$value->ph}}</td>
										<td>{{$value->ProfileDetails->profile_name}}</td>
										{{-- <td>@if($value->admin_status=="I")
											Pending
											@else
											Complete
											@endif
										</td> --}}
										<td>
                                            

                                         <a href="{{route('corp.user.edit.page',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
											<i class="fas fa-edit"></i>
										</a>

										<a onclick="return confirm('Are you sure want to delete this user?')"  href="{{route('corp.user.delete',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
											<i class="fas fa-trash"></i>
										</a>

										<a href="{{route('single.corp.card.view',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
												<i class="fas fa-eye"></i>
										</a>

										 <a href="{{route('corp.user.card.link',["id"=>$value->id,"name"=>$value->ProfileDetails->profile_name])}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
											Card Link
										</a>
											
										
										
											
										</td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
						</div>
					</div>
</div>

				<a href="{{route('corp.printed.list',$id)}}" class="btn btn-info btn-bold px-4" style="width: 30%; float: left;">Printed card history</a>





					@if(count($all_corp_users)>0)

					<a  onclick="return confirm('Are you sure want to sent request for above listed user for print card?');" href="{{route('corporate.printed.request',$id)}}" class="btn btn-info btn-bold px-4" style="width: 30%; float: right;">Request for print</a>
					@endif
					<!-- /.card-body -->
				
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