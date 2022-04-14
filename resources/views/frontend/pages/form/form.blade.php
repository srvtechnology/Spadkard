
@include('frontend.include.message')
<form role="form" id="frm" method="post" action="{{route('ins.user.form')}}" enctype="multipart/form-data">
	@csrf
	{{-- <p>name</p>
	<input type="text" name="name" value="{{@$icon->id}}"> --}}
	<p>Template id</p>
	<input type="text"  class="form-control" id="AboutMe"  name="template_id" required  value="5">
	<p>Name</p>
	
	<input type="text"  class="form-control" id="AboutMe"  name="name" required  value="jeet">
	<p>Email</p>
	<input type="text"  class="form-control" id="AboutMe"  name="email" required  value="j@m.com" >
	<p>ph</p>
	<input type="text"  class="form-control" id="AboutMe"  name="ph" required value="8799008830" >
	<p>company</p>
	<input type="text"  class="form-control" id="AboutMe"  name="company" required value="abc company">
	<p>Address</p>
	<input type="text"  class="form-control" id="AboutMe"  name="address" required  value="30 mkjjb road">
	<p>tag</p>
	<input type="text"  class="form-control" id="AboutMe"  name="tag" required  value=" tag30">
	@php

	$mat=DB::table('material_type')->where('status','A')->get();

	@endphp
	<p>material_id</p>
	<select required name="material_id">
		<option value="">select</option>
		@foreach($mat as $val)
		<option value="{{$val->id}}">{{$val->name}}</option>
		@endforeach
	</select>
	<p>color</p>
	<input type="text"  class="form-control" id="AboutMe"  name="color" required value="red">
	<p>order type</p>
	<select required name="ordertype">
		<option value="">select</option>
		 <option value="S">Single</option>
		<option value="M" selected>Multiple</option>
		
	</select>
	<p>total no of card</p>
	<input type="text"  class="form-control" id="AboutMe"  name="total_order" required value="30" >
	<p>logo</p>
	<input type="file"  class="form-control" id="AboutMe"  name="logo" accept="image/*" required >
	
	<div class="clearfix"></div>
	
	
	<button class="btn btn-primary waves-effect waves-light w-md" type="submit">save</button>
	
</form>