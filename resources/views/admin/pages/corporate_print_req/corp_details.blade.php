@extends('admin.layouts.app')
@section('title')
<title>Admin | View Corporate Card Details</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
{{-- for datepicker --}}
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
					<h4 class="pull-left page-title">Corporate Card Details Page</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active">Corporate Card Details Page</li>
					</ol>
				</div>
			</div>
			<div class="add-btn "><a href="{{ url()->previous() }}"><i class="icofont-minus-circle"></i> back</a></div>
			
			<div class="row">
				<div class="col-lg-12">
					
					<div>
						
						<div class="row">
							<div class="col-md-6">
								<!-- Personal-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">Corporate Card Information</h3>
									</div>
									<div class="panel-body">
										<div class="about-info-p">
											<strong> Card No</strong>
											<br>
											<p class="text-muted">{{@$details->id}}</p>
										</div>
										<div class="about-info-p">
											<strong> Name</strong>
											<br>
											<p class="text-muted">{{@$details->name}}</p>
										</div>
										<div class="about-info-p">
											<strong>Email </strong>
											<br>
											<p class="text-muted">{{@$details->email}}</p>
										</div>
										<div class="about-info-p">
											<strong> Mobile</strong>
											<br>
											<p class="text-muted">{{@$details->ph}}</p>
										</div>
										
										<div class="about-info-p m-b-0">
											<strong> Company</strong>
											<br>
											<p class="text-muted">{{@$details->company}}</p>
										</div>
										<div class="about-info-p">
											<strong> Address</strong>
											<br>
											<p class="text-muted">{{@$details->address}}</p>
										</div>
										<div class="about-info-p">
											<strong> Tag </strong>
											<br>
											<p class="text-muted">{{@$details->tag}}</p>
										</div>
										<div class="about-info-p">
											<strong> Profile </strong>
											<br>
											<p class="text-muted">{{$details->ProfileDetails->profile_name}}</p>
										</div>
										<div class="about-info-p">
											<strong>Time</strong>
											<br>
											<p class="text-muted">{{@$details->created_at}}</p>
										</div>
									</div>
								</div>
								<!-- Personal-Information -->
								<!-- Languages -->
								
								<!-- Languages -->
							</div>
							<div class="col-md-6">
								<!-- Personal-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">Card Information</h3>
									</div>
									<div class="panel-body">
										<div class="about-info-p">
											<strong>Logo </strong>
											<br>
											@if(@$details->logo)
											<img src="{{url('/')}}/public/logo_for_user/{{@$details->logo}}" style="width: 100px;height: 100px">
											@else
											@php
											$master=DB::table('user_to_template')->where('id',$details->user_to_temp_id)->first();
											@endphp
											<img src="{{url('/')}}/public/logo/{{@$master->logo}}" style="width: 100px;height: 100px">
											@endif
										</div>
										
										
										<div class="about-info-p m-b-0">
											<strong> status</strong>
											<br>
											@if(@$details->admin_status=="I")
											<p class="text-muted">Pending</p>
											@elseif(@$details->admin_status=="C")
											<p class="text-muted">Printed</p>
											@else
											Not initiated
											@endif
										</div>
										<div class="about-info-p m-b-0">
											<strong> Template Front Image</strong>
											@php
											
											$temp_image=DB::table('template')->where('id',$details->template_id)->first();
											@endphp
											
											<br>
											<img src="{{url('/')}}/storage/app/public/template_front/{{$temp_image->image}}">
										</div>
										
										<div>
											@php
											$type=DB::table('template')->where('id',$details->template_id)->first();
											@endphp
											@if($type->added_by=="U")
											<div class="form-group">
												<a class="btn btn-info" href="{{route('admin.temp.download.one',$type->image)}}">Download</a>
											</div>
											@else
											
											@endif
										</div>

										<div class="about-info-p m-b-0">
											<strong> Template Back Image</strong>
											@php
											
											$temp_image=DB::table('template')->where('id',$details->template_id)->first();
											@endphp
											
											<br>
											<img src="{{url('/')}}/storage/app/public/template_back/{{$temp_image->back_image}}">
										</div>
										
										<div>
										
											@if($type->added_by=="U")
											<div class="form-group">
												<a class="btn btn-info" href="{{route('admin.temp.download.two',$type->back_image)}}">Download</a>
											</div>
											@else
											
											@endif
										</div>
										
									</div>
								</div>
								<!-- Personal-Information -->
								<!-- Languages -->
								{{--  <div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">Languages</h3>
									</div>
									<div class="panel-body">
										<ul>
											<li>English</li>
											<li>Franch</li>
											<li>Greek</li>
										</ul>
									</div>
								</div> --}}
								<!-- Languages -->
							</div>
							
						</div>
						<div class="row">
							
							<div class="col-md-12" style="background: white;">
								<p>Card Front Design</p>
								@php
								$design=DB::table('html')->where('id',$details->html_id)->first();
								@endphp
								{!!$design->html!!}
							</div>
						</div>
						<div class="row">
							
							<div class="col-md-12" style="background: white;">
								<p>Card Back Design</p>
								
								{!!$design->html_back!!}
							</div>
						</div>
						
						
						
						
					</div>
				</div>
			</div>
			</div> <!-- container -->
			
			</div> <!-- content -->
			
		</div>
		<!-- ============================================================== -->
		<!-- End Right content here -->
		<!-- ============================================================== -->
		<!-- End Right content here -->
		@section('footer')
		@include('admin.include.footer')
		@endsection
		@endsection
		{{-- end content --}}
		@section('script')
		@include('admin.include.script')
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
		$(".unq-name").css("font-size","{{$master_table->name_size}}"+"px");


		$(".unq-email").text("{{@$details->email}}");
		$(".unq-email").css("color","{{$font_color}}");
		$(".unq-email").css("font-size","{{$master_table->email_size}}"+"px");


		$(".unq-company").text("{{@$details->company}}");
		$(".unq-company").css("color","{{$font_color}}");
		$(".unq-company").css("font-size","{{$master_table->company_size}}"+"px");


		$(".unq-ph").text("{{@$details->ph}}");
		$(".unq-ph").css("color","{{$font_color}}");
		$(".unq-ph").css("font-size","{{$master_table->ph_size}}"+"px");


		$(".unq-address").text("{{@$details->address}}");
		$(".unq-address").css("color","{{$font_color}}");
		$(".unq-address").css("font-size","{{$master_table->address_size}}"+"px");


		$(".unq-tag").text("{{@$details->tag}}");
		$(".unq-tag").css("color","{{$font_color}}");
		$(".unq-tag").css("font-size","{{$master_table->tag_size}}"+"px");


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
		$(".unq-name").css("font-size","{{$master_table->name_size}}"+"px");
		

		$(".unq-email").text("{{@$details->email}}");
		$(".unq-email").css("font-size","{{$master_table->email_size}}"+"px");
		

		$(".unq-company").text("{{@$details->company}}");
		$(".unq-company").css("font-size","{{$master_table->company_size}}"+"px");
	

		$(".unq-ph").text("{{@$details->ph}}");
		$(".unq-ph").css("font-size","{{$master_table->ph_size}}"+"px");
	

		$(".unq-tag").text("{{@$details->tag}}");
		$(".unq-address").css("font-size","{{$master_table->tag_size}}"+"px");
		
		$(".unq-address").text("{{@$details->address}}");
		$(".unq-tag").css("font-size","{{$master_table->address_size}}"+"px");


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