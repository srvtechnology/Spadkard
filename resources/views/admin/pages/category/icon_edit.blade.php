@extends('admin.layouts.app')
@section('title')
<title>Admin | Edit Punch Lines</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
{{-- for datepicker --}}
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
.uplodimgfilimg {
margin-left: 20px;
padding-top: 20px;
}
.uplodimgfilimg em {
width: 58px;
height: 58px;
position: relative;
display: inline-block;
overflow: hidden;
border-radius: 4px;
}
.uplodimgfilimg em img{
position: absolute;
max-width: 100%;
max-height: 100%;
}
</style>
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
                    <h4 class="pull-left page-title"> Edit Punch Lines </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
                        
                        <li class="active">Edit Punch Lines </li>
                    </ol>
                </div>
            </div>
            @include('admin.include.message')
            <div class="add-btn "><a href="{{route('admin.cat.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                            <h3 class="panel-title">Edit Punch Lines</h3> </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" id="frm" method="post" action="{{route('admin.cat.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{@$icon->id}}">
                                    <div class="form-group rm50">
                                        <label for="title">Category title (line 1)</label>
                                        <input type="text"  class="form-control" id="AboutMe" placeholder="Enter Category"  name="title"  value="{{@$icon->title}}">
                                    </div>
                                    <div class="form-group rm50">
                                        <label for="title">Category title (line 2)</label>
                                        <input type="text"  class="form-control" id="AboutMe" placeholder="Enter Category"  name="title_two"  value="{{@$icon->title_two}}">
                                    </div>
                                   
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="fileUpload btn btn-primary cust_file clearfix">
                                            <span class="upld_txt"><i class="fa fa-upload upld-icon" aria-hidden="true"></i>Upload Image</span>
                                            <input type="file"   class="upload" name="image" {{-- onmouseout ="vdo_img()" onkeyup="vdo_img()"  --}}id="img" accept="image/*"  onChange="fun();" >
                                        </div>
                                        <label for="image">Uploaded image dimention should be within (10-150 width) x (10-150 height)</label>
                                        <label id="img-error" class="error" for="img"></label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="review_img rmm_001" style="display: none">
                                        <em><img src="" alt=""id="img2" style="width: 300px; height: 300px"></em>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label for="Email">Previous Image</label>
                                        <div class="uplodimgfilimgs">
                                            <em><img src="{{url('/')}}/public/category_icon/{{@$icon->image}}" alt="" style="width: 150px !important; height: 150px !important"></em>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="clearfix"></div>
                                    
                                    
                                    
                                    
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Personal-Information -->
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
    </div>
    <!-- Service -->
    
</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
function fun(){
var i=document.getElementById('img').files[0];
//console.log(i);
var b=URL.createObjectURL(i);
$(".review_img").show();
$("#img2").attr("src",b);
}
</script>
<script>
$(document).ready(function(){
$('#frm').validate({
rules:{
title:{
required:true,
minlength:2,
},

// image:{
//     required:true,
// }
},
// messages:{
// name:{
// required:'Please enter template name',
// },
// image:{
// required:'Please upload template image',
// },
// }
});
});
</script>
@endsection