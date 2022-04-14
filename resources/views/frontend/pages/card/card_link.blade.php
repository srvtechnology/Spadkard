@extends('layouts.app')
@section('title')
<title>User | Card | Link</title>
<style type="text/css">
	.error{
		color: red;
	}
</style>
@endsection

@section('content')

<a href="{{ url()->previous() }}" class="btn btn-info btn-bold px-4" style="float: right;">Back</a>
</div>




@if(@$details->logo)

@else
@php
$master=DB::table('user_to_template')->where('id',$details->user_to_temp_id)->first();
@endphp

@endif

<!-- /.card-body -->
<div class="row">
<div class="col-md-12">
	<strong>Card Front View</strong>
	@php
	$design=DB::table('html')->where('id',$details->html_id)->first();
	@endphp
	{!!$design->html!!}
</div>
</div>
<div class="row">
<div class="col-md-12">
	<strong>Card Back View</strong>
	
	{!!$design->html_back!!}
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