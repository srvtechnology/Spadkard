<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>

<input type="hidden" name="user_id" value="{{$user_id}}">

<input type="hidden" name="template_id" value="{{@$template_id}}">

<input type="hidden" name="name" value="{{@$name}}">

<input type="hidden" name="email" value="{{@$email}}">

<input type="hidden" name="ph" value="{{@$ph}}">

<input type="hidden" name="company" value="{{@$company}}">

<input type="hidden" name="address" value="{{@$address}}">

<input type="hidden" name="tag" value="{{@$tag}}">

<input type="hidden" name="material_id" value="{{@$material_id}}">

<input type="hidden" name="amount" value="{{@$amount}}">

<input type="hidden" name="font_color" value="{{@$font_color}}">

<input type="hidden" name="order_type" value="{{@$order_type}}">

<input type="hidden" name="logo" value="{{@$logo}}">

<input type="hidden" name="total_order" value="{{@$total_order}}">

<input type="hidden" name="design_id" value="{{@$design_id}}">
@php
$design=DB::table('html')->where('id',$design_id)->first();
@endphp

{!!$design->html!!}

<script>
	$(document).ready(function(){
		$(".unq-name").text("{{@$name}}");
		$(".unq-name").css("color","{{$font_color}}");

		$(".unq-email").text("{{@$email}}");
		$(".unq-email").css("color","{{$font_color}}");

		$(".unq-company").text("{{@$company}}");
		$(".unq-company").css("color","{{$font_color}}");

		$(".unq-ph").text("{{@$ph}}");
		$(".unq-ph").css("color","{{$font_color}}");

		$(".unq-tag").text("{{@$tag}}");
		$(".unq-tag").css("color","{{$font_color}}");

		$(".unq-address").text("{{@$address}}");
		$(".unq-address").css("color","{{$font_color}}");

		@php
		$template_details=DB::table('template')->where('id',$template_id)->first();
		@endphp
		$(".unq-background-image").css("background","white");
		$(".unq-background-image").css("background-image","url(' {{url('/')}}/storage/app/public/template/{{@$template_details->image}} ')");
		$(".unq-background-image").css("background-repeat","no-repeat");
		$(".unq-background-image").css("background-size","cover");

		   
         $(".logo").html('<img id="theImg" style="width:50px;height:31px; border-radius:80px" src="{{url('/')}}/public/logo/{{@$logo}}" />')
		
		


	
	});
</script>



</body>
</html>