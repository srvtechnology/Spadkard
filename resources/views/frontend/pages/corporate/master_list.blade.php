@extends('layouts.app')
@section('title')
<title>User | Corporate Card List</title>
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
						<h3 class="card-title text-125 text-primary-d2">
						Corporate Card Buy list
						</h3>
						
					</div>
					@include('frontend.include.message')
					<div class="card-box brc-blue-m2">
						<div class="card-box-body">
							<table id="example2" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>SL.NO</th>
										<th>Card Type</th>
										<th>Price</th>
										<th>Total Profiles</th>
										<th>Total Card Buy</th>
										
										<th>Buy Time</th>
										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($corporates as $key=> $value)
									<tr>
										<td>{{-- {{@$key+ @$printed->firstItem() }} --}}</td>
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
										<td>{{@$value->total_profile}}</td>
										<td>
											{{$value->total_order}}
										</td>
										<td>
											{{$value->created_at}}
										</td>
										
										
										<td>

											{{-- calculate for add card or list of profiles --}}
											@php
											$ProfileCount=DB::table('user_to_profiles')->where('user_id',Auth::user()->id)->where('user_to_temp_id',$value->id)->count();
											@endphp
                                            
                                           @if(@$value->total_profile>$ProfileCount)
                                           {{-- add profile  --}}
                                           <a href="{{route('add.profile',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success" style="margin-top: 5px">
												Add Profile
											</a>

											<a href="{{route('added.profile.list',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success" style="margin-top: 5px">
												Edit Profiles
											</a>
                                              {{-- profile list --}}
											<a href="{{route('corp.card.list',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success" style="margin-top: 5px">
											 Corporate Card List
											</a>

											@else
											 <a href="{{route('added.profile.list',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
												Edit Profiles
											</a>
                                              {{-- profile list --}}
											<a href="{{route('corp.card.list',$value->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
											 Corporate Card List
											</a>

                                           @endif
                                            

											
											
											
										
										
											
										</td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
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