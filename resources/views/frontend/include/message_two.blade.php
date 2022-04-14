@if(Session::has('success2'))
{{-- <script>
	window.location="/";
</script> --}}
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>
            {!!Session::get('success2')!!}
        </strong>
    </div>              
@endif


@if(Session::has('error2'))
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>
            {!!Session::get('error2')!!}
        </strong>
    </div>              
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

	$(function() {
	
var timeout = 7000; // in miliseconds (3*1000)
$('.alert').delay(timeout).fadeOut(700);
});
</script>