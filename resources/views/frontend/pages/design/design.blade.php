<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- -- bootstrap --  -->
  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      .back-header {
        background: black;
        padding: 15px 0;
      }
      .back-header .back {
        display: flex;
        justify-content: right;
      }
      .back-header .back a {
        color: #fff;
        text-decoration: none;
        background: #0022e1;
        padding: 7px 15px;
        border-radius: 5px;
        border: 1px solid #0022e1;
      }
      .back-header .back a:hover {
        background: #000;
        border: 1px solid #0022e1;
      }
      .grand-div {
        width: 100%;
        min-height: 100vh;
        background: #ffc107;
      }
      form img {
        width: 100%;
        height: auto;
      }
      form .btns {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
      }
      form .btns > div a {
        background: #484848;
        color: #fff;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #484848;
        border-radius: 5px;
      }
      form .btns > div a:hover {
        background: none;
        color: #000;
      }
    </style>
  </head>
  <body>
    <header class="back-header">
      <div class="container">
        <div class="back">
          <h3 style="color: white; margin-right:450px"> Availabale Designs </h3>

          <a href="{{url()->previous()}}">Back</a>
        </div>
      </div>
    </header>
    <div class="grand-div">
      <div class="container">
        <div class="row">

          @foreach($htmls as $key=> $val)
          <div class="col-md-6 col-12 my-3">
            <form method="post" action="{{route('buy.card')}}">
            	@csrf
            	<input type="hidden" id="user_id" name="user_id" value="{{$user_id}}">

				<input type="hidden" id="template_id" name="template_id" value="{{@$template_id}}">

				<input type="hidden" id="name" name="name" value="{{@$name}}">

				<input type="hidden" id="email" name="email" value="{{@$email}}">

				<input type="hidden" id="ph" name="ph" value="{{@$ph}}">

				<input type="hidden" id="company" name="company" value="{{@$company}}">

				<input type="hidden" id="address" name="address" value="{{@$address}}">

				<input type="hidden" id="tag" name="tag" value="{{@$tag}}">

				<input type="hidden" id="material_id" name="material_id" value="{{@$material_id}}">

				<input type="hidden" id="amount" name="amount" value="{{@$amount}}">

				<input type="hidden" id="font_color" name="font_color" value="{{@$font_color}}">

				<input type="hidden" id="order_type" name="order_type" value="{{@$order_type}}">

				<input type="hidden" id="logo" name="logo" value="{{@$logo}}">

				<input type="hidden" id="total_order" name="total_order" value="{{@$total_order}}">

				<input type="hidden" id="design_id" name="design_id" value="{{$val->id}}">

              <img src="{{url('/')}}/storage/app/public/design/{{$val->image}}">
              <div class="btns">
                <div class="buy-btns">
                  <input type="submit" class="btn btn-primary" value="buy">
                </div>
                <div class="prev-btns">
                  <a onclick="preview({{$val->id}})" href="#">Preview</a
                  >
                </div>
              </div>
            </form>
          </div>
         @endforeach
         


        </div>
      </div>
    </div>

  
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 150%;">
      <div class="modal-header" style="background: #edbb38">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Preview Of Design</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


 
    <script>
	function preview(id){
		// alert('j');
		var user_id=$("#user_id").val();
		var template_id=$("#template_id").val();
		var name=$("#name").val();
		var email=$("#email").val();
		var ph=$("#ph").val();
		var address=$("#address").val();
		var company=$("#company").val();
		var tag=$("#tag").val();
		var material_id=$("#material_id").val();
		var amount=$("#amount").val();
		var font_color=$("#font_color").val();
		var order_type=$("#order_type").val();
		var logo=$("#logo").val();
		var total_order=$("#total_order").val();
		var design_id=id;
		//alert(design_id);
			
	
	// alert(subject);
	//ajax
	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': "{{csrf_token()}}"
	}
	});
	var fd= new FormData;
	fd.append('user_id',user_id);
	fd.append('template_id',template_id);
	fd.append('name',name);
	fd.append('email',email);
	fd.append('ph',ph);
	fd.append('address',address);
	fd.append('company',company);
	fd.append('tag',tag);
	fd.append('material_id',material_id);
	fd.append('amount',amount);
	fd.append('font_color',font_color);
	fd.append('order_type',order_type);
	fd.append('logo',logo);
	fd.append('total_order',total_order);
	fd.append('design_id',design_id);
	$.ajax({
	url:'{{route('preview.card')}}',
	type:'POST',
	data: fd,
	contentType: false,
	processData: false,
	
	success:function(res){
	// console.log(res);
	//alert("j");
	$('#myModal').modal('show');
	$('.modal-body').html(res);
	//console.log(res);

	}
	});
	}
</script>

  </body>
</html>
