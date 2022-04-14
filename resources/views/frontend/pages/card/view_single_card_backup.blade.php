@extends('layouts.app')
@section('title')
<title>User | Card | Details</title>
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
						<a href="{{ url()->previous() }}" class="btn btn-info btn-bold px-4" >Back</a>
					</div>
					@include('frontend.include.message')
					<div class="card-box brc-blue-m2">
						<div class="card-box-body">
							
							
							
							
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="">
											Card Id : {{$details->id}}
										</label>
										
									</div>
								</div>
								
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
											Status : @if(@$details->admin_status=="I")
											Pending
											@elseif(@$details->admin_status=="C")
											Printed
											@else
											Not initiated
											@endif
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
								<div class="col-xs-6">
									<div class="form-group" style="float: left">
										<label for="">
											Template Image
										</label>
										<img src="{{url('/')}}/storage/app/public/template/{{$details->temp_img->image}}" >
										
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<label for="">
											Logo
										</label>
										@if(@$details->logo)
										<img src="{{url('/')}}/public/logo_for_user/{{@$details->logo}}">
										@else
										@php
										$master=DB::table('user_to_template')->where('id',$details->user_to_temp_id)->first();
										@endphp
										<img src="{{url('/')}}/public/logo/{{@$master->logo}}">
										@endif
										
									</div>
								</div>
								
								
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					
					<!-- include common vendor scripts used in demo pages -->
					@section('script')
					@include('frontend.include.script')
					@endsection