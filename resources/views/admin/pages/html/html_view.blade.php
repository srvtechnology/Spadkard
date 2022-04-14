@extends('admin.layouts.app')
@section('title')
<title>Admin | View Html design</title>
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
					<h4 class="pull-left page-title">View Html design Page</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						
						<li class="active">View Html design Page</li>
					</ol>
				</div>
			</div>
			<div class="add-btn "><a href="{{route('admin.html.list')}}"><i class="icofont-minus-circle"></i> back</a></div>
			
			<div class="row">
				<div class="col-lg-12">
					
					<div>
						
						<div class="row">
							<div class="col-md-8">
								<!-- Personal-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">Html Information</h3>
									</div>
									<div class="panel-body">
										<div class="about-info-p">
											<strong>Html Name</strong>
											<br>
											<p class="text-muted">{{@$htmls->name}}</p>
										</div>

										<div class="about-info-p">
											<strong>Template Name</strong>
											<br>
											<p class="text-muted">{{@$htmls->temp_details->name}}</p>
										</div>
										
										<div class="about-info-p">
											<strong>Last Edit</strong>
											<br>
											<p class="text-muted">{{@$htmls->updated_at}}</p>
										</div>
										
										
										
										
									</div>
								</div>
								<!-- Personal-Information -->
								<!-- Languages -->
								
								<!-- Languages -->
							</div>
							{{-- 	<div class="col-md-6">
								<!-- Personal-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">Design Information</h3>
									</div>
									<div class="panel-body">
										<div class="about-info-p">
											<strong>Design </strong>
											<br>
											{!!@$htmls->html!!}
										</div>
										
									</div>
								</div>
								
							</div> --}}
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="about-info-p">
									<strong>Html front Image </strong>
									<br>
									<td><img src="{{url('/')}}/storage/app/public/template_front/{{@$htmls->temp_details->image}}" >
								</div>
							</div>

							<div class="col-md-6">
								<div class="about-info-p">
									<strong>Html Back Image </strong>
									<br>
									<img src="{{url('/')}}/storage/app/public/template_back/{{@$htmls->temp_details->back_image}}" >
								</div>
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
		@endsection