@extends('layouts.app')

<title>User | Re-Print Card | Details</title>
<style type="text/css">
	.error{
		color: red;
	}
</style>

@include('frontend.include.head')
<!-- "Basic Elements" page styles, specific to this page for demo only -->
@section('content')
<div class="body-container">
	@include('frontend.include.nav')
	<div class="main-container bgc-white">
		@include('frontend.include.left_part')9
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
								<div class="col-md-6">

									<div class="form-group">
										<label for="">
											Master Card Id : {{$details->master_added_user_id}}
										</label>
									</div>

									<div class="form-group">
										<label for="">
											Re-printCard Id : {{$details->id}}
										</label>
									</div>
									
									<div class="form-group">
										<label for="">
											Name : {{$details->name}}
										</label>
									</div>
									<div class="form-group">
										<label for="">
											Email : {{$details->email}}
										</label>
										
									</div>
									<div class="form-group">
										<label for="">
											ph : {{$details->ph}}
										</label>
										
									</div>
									<div class="form-group">
										<label for="">
											company : {{$details->company}}
										</label>
										
									</div>
									<div class="form-group">
										<label for="">
											address : {{$details->address}}
										</label>
										
									</div>
									<div class="form-group">
										<label for="">
											TagLine : {{$details->tag}}
										</label>
										
									</div>
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
									<div class="form-group">
										<label for="">
											Time : {{$details->created_at}}
										</label>
										
									</div>
								</div>
								<div class="col-md-6">
									
								{{-- 	<label for="">
											Template Image
										</label>
										<br>
									<div class="form-group" >
										
										<img src="{{url('/')}}/storage/app/public/template/{{$details->temp_img->image}}" >
										
									</div> --}}
									<div class="clearfix"></div>
									<label for="">
											Logo
										</label>
									<div class="form-group">
										
										@if(@$details->logo)
										<img src="{{url('/')}}/public/logo_for_user/{{@$details->logo}}" style="width: 100px;height: 100px;">
										@else
										@php
										$master=DB::table('user_to_template')->where('id',$details->user_to_temp_id)->first();
										@endphp
										<img src="{{url('/')}}/public/logo/{{@$master->logo}}" style="width: 100px;height: 100px;">
										@endif
										
									</div>
									
								</div>
							</div>
							<!-- /.card-body -->
							<div class="row">
								<div class="col-md-12">
									@php
									$design=DB::table('html')->where('id',$details->html_id)->first();
									@endphp

									{!!$design->html!!}
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									
									{!!$design->html_back!!}
								</div>
							</div>
						</div>
						
						<!-- include common vendor scripts used in demo pages -->
						@section('script')
						@include('frontend.include.script')


<script>
	@php
	$temp=DB::table('template')->where('id',$details->template_id)->first();
	$master_table=DB::table('user_to_template')->where('id',$details->user_to_temp_id)->first();
	@endphp
	@if($temp->added_by=="U")
	@php
	$fontColor=DB::table('user_to_template')->where('id',$details->user_to_temp_id)->first();
	$font_color=$fontColor->font_color;
	@endphp
	$(document).ready(function(){
		$(".unq-name").text("{{@$details->name}}");
		$(".unq-name").css("color","{{$font_color}}");
		$(".unq-name").css("font-size","{{$master_table->name_size}}");


		$(".unq-email").text("{{@$details->email}}");
		$(".unq-email").css("color","{{$font_color}}");
		$(".unq-email").css("font-size","{{$master_table->email_size}}");


		$(".unq-company").text("{{@$details->company}}");
		$(".unq-company").css("color","{{$font_color}}");
		$(".unq-company").css("font-size","{{$master_table->company_size}}");


		$(".unq-ph").text("{{@$details->ph}}");
		$(".unq-ph").css("color","{{$font_color}}");
		$(".unq-ph").css("font-size","{{$master_table->ph_size}}");


		$(".unq-address").text("{{@$details->address}}");
		$(".unq-address").css("color","{{$font_color}}");
		$(".unq-address").css("font-size","{{$master_table->address_size}}");


		$(".unq-tag").text("{{@$details->tag}}");
		$(".unq-tag").css("color","{{$font_color}}");
		$(".unq-tag").css("font-size","{{$master_table->tag_size}}");


		$(".unq-background-image-front").css("background","white");
		$(".unq-background-image-front").css("background-image","url(' {{url('/')}}/storage/app/public/template_front/{{$details->temp_img->image}} ')");
		$(".unq-background-image-front").css("background-repeat","no-repeat");
         $(".unq-background-image-front").css("background-size","cover");

         $(".unq-background-image-back").css("background","white");
		$(".unq-background-image-back").css("background-image","url(' {{url('/')}}/storage/app/public/template_back/{{$details->temp_img->back_image}} ')");
		$(".unq-background-image-back").css("background-repeat","no-repeat");
         $(".unq-background-image-back").css("background-size","cover");

         @if(@$details->logo)
         $(".logo").html('<img id="theImg" style="width:50px;height:31px; border-radius:80px" src="{{url('/')}}/public/logo_for_user/{{@$details->logo}}" />')
		
		@else
	       $(".logo").html('<img id="theImg" style="width:50px;height:31px; border-radius:80px" src="{{url('/')}}/public/logo/{{@$master->logo}}" />')
		
		@endif  
		
		

	
	});
	@else

	$(document).ready(function(){
		$(".unq-name").text("{{@$details->name}}");
		$(".unq-name").css("font-size","{{$master_table->name_size}}");
		

		$(".unq-email").text("{{@$details->email}}");
		$(".unq-email").css("font-size","{{$master_table->email_size}}");
		

		$(".unq-company").text("{{@$details->company}}");
		$(".unq-company").css("font-size","{{$master_table->company_size}}");
	

		$(".unq-ph").text("{{@$details->ph}}");
		$(".unq-ph").css("font-size","{{$master_table->ph_size}}");
	

		$(".unq-tag").text("{{@$details->tag}}");
		$(".unq-address").css("font-size","{{$master_table->tag_size}}");
		
		$(".unq-address").text("{{@$details->address}}");
		$(".unq-tag").css("font-size","{{$master_table->address_size}}");


		$(".unq-background-image-front").css("background","white");
		$(".unq-background-image-front").css("background-image","url(' {{url('/')}}/storage/app/public/template_front/{{$details->temp_img->image}} ')");
		$(".unq-background-image").css("background-repeat","no-repeat");
         $(".unq-background-image").css("background-size","cover");

         $(".unq-background-image-back").css("background","white");
		$(".unq-background-image-back").css("background-image","url(' {{url('/')}}/storage/app/public/template_back/{{$details->temp_img->back_image}} ')");
		$(".unq-background-image").css("background-repeat","no-repeat");
         $(".unq-background-image").css("background-size","cover");

         @if(@$details->logo)
         $(".logo").html('<img id="theImg" style="width:50px;height:31px; border-radius:80px" src="{{url('/')}}/public/logo_for_user/{{@$details->logo}}" />')
		
		@else
	       $(".logo").html('<img id="theImg" style="width:50px;height:31px; border-radius:80px" src="{{url('/')}}/public/logo/{{@$master->logo}}" />')
		
		@endif  
		
		

	
	});

	@endif
</script>
	@endsection