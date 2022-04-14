<!DOCTYPE html>
<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title></title>
</head>
<body>
  <div id="html-content-holder" style="background-color: #F0F0F1; color: #00cc65; width: 500px;
        padding-left: 25px; padding-top: 10px;">
        <strong>Codepedia.info</strong><hr />
        <h2 style="color: #3e4b51;">
            Html to canvas, and canvas to proper image
        </h2>
        <p style="color: #3e4b51;">
            <b>Codepedia.info</b> is a programming blog. Tutorials focused on Programming ASP.Net,
            C#, jQuery, AngularJs, Gridview, MVC, Ajax, Javascript, XML, MS SQL-Server, NodeJs,
            Web Design, Software</p>
        <p style="color: #3e4b51;">
            <b>html2canvas</b> script allows you to take "screenshots" of webpages or parts
            of it, directly on the users browser. The screenshot is based on the DOM and as
            such may not be 100% accurate to the real representation as it does not make an
            actual screenshot, but builds the screenshot based on the information available
            on the page.
        </p>
    </div>
    <input id="btn_convert1" type="button" value="Preview" />
    <a id="btn-Convert-Html2Image" href="#">Download</a>
    <input type="button" value="Preview & Convert" id="btnConvert" >
    <br />
    <h3>Preview :</h3>
    <div id="previewImg">
    </div>

    <script>
       document.getElementById("btn_convert1").addEventListener("click", function() {
  html2canvas(document.getElementById("html-content-holder")).then(function (canvas) {    
    var anchorTag = document.createElement("a");
      document.body.appendChild(anchorTag);
      document.getElementById("previewImg").appendChild(canvas);
      // anchorTag.download = "filename.jpg";
      // anchorTag.href = canvas.toDataURL();
      // anchorTag.target = '_blank';
      // anchorTag.click();
    });
 });
    </script>

</body>
</html>











<!DOCTYPE html>
<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title></title>
</head>
<body>
  <div id="html-content-holder" style="background: url('https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg'); color: #00cc65; width: 500px;
        padding-left: 25px; padding-top: 10px;">
        <strong>Codepedia.info</strong><hr />
        <h2 style="color: #3e4b51;">
            Html to canvas, and canvas to proper image
        </h2>
        <p style="color: #3e4b51;">
            <b>Codepedia.info</b> is a programming blog. Tutorials focused on Programming ASP.Net,
            C#, jQuery, AngularJs, Gridview, MVC, Ajax, Javascript, XML, MS SQL-Server, NodeJs,
            Web Design, Software</p>
        <p style="color: #3e4b51;">
            <b>html2canvas</b> script allows you to take "screenshots" of webpages or parts
            of it, directly on the users browser. The screenshot is based on the DOM and as
            such may not be 100% accurate to the real representation as it does not make an
            actual screenshot, but builds the screenshot based on the information available
            on the page.
        </p>
    </div>
    <input id="btn_convert1" type="button" value="Preview" />
    
    
    <br />
    <h3>Preview :</h3>
    <div id="previewImg">
    </div>

    <script>
       document.getElementById("btn_convert1").addEventListener("click", function() {
  html2canvas(document.getElementById("html-content-holder"),{
    allowTaint:true,
  }).then(function (canvas) {    
    var anchorTag = document.createElement("a");
      document.body.appendChild(anchorTag);
      document.getElementById("previewImg").appendChild(canvas);
      anchorTag.download = "filename.jpg";
      anchorTag.href = canvas.toDataURL();
      anchorTag.target = '_blank';
      anchorTag.click();
    });
 });
    </script>

</body>
</html>










@extends('admin.layouts.app')
@section('title')
<title>Admin | Add Html</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
{{-- for datepicker --}}
{{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
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
                    <h4 class="pull-left page-title">Html Add </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
                        <li class="active"> Html Add </li>
                    </ol>
                </div>
            </div>
            @include('admin.include.message')
            <div class="add-btn "><a href="{{route('admin.html.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                            <h3 class="panel-title">Add Industry Logo</h3> </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" action="{{route('admin.insert.html')}}" id="frm" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group rm50">
                                        <label for="title">Html name</label>
                                        <input type="text"  class="form-control" id="AboutMe" placeholder="Enter name"  name="name" >
                                    </div>
                                    <div class="clearfix"></div>

                                      <div class="form-group rm03">
                                        <label for="FullName">Html</label>
                                        <textarea id="mytextarea1" style="width: 95%;height: 300px" name="html"  ></textarea>
                                    </div>
                                    <input type="text" name="immm" value="">

                                      
                                       
                                    </div>
                                
                                    
                                    
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12" style="margin-top: 10px;">
                                        <button class="btn btn-primary waves-effect waves-light w-md" type="button" id="btn_convert1">Save</button>
                                    </div>


                                    {{--  <div class="col-lg-12" style="margin-top: 10px;">
                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit" >Add</button>
                                    </div> --}}
                                </form>
                                 <div class="form-group rm03" id="xyz" >
          <br>
                            </div>
                        </div>
                        <!-- Personal-Information -->
                    </div>
                </div>
            </div>
        </div>
       
        <h3>Preview :</h3>
    <div id="previewImg">
    </div>
        <!-- container -->
    </div>
    <!-- content -->
    
</div>
 <
<!-- ============================================================== -->
<!-- End Right content here -->
@section('footer')
@include('admin.include.footer')
@endsection
@endsection
{{-- end content --}}
@section('script')
@include('admin.include.script')
{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}} {{-- for datepicker --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
$('#frm').validate({
rules:{
name:{
    required:true,
    minlength:3,
},  

},
messages:{
//  link:{
//     required:" social link is mandatory",
//     min:"Enter valid links"
// }
}
});
});
</script>
<script>
function fun(){
var i=document.getElementById('img').files[0];
//console.log(i);
var b=URL.createObjectURL(i);
$(".review_img").show();
$("#img2").attr("src",b);
}
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.0/tinymce.min.js" integrity="sha512-XaygRY58e7fVVWydN6jQsLpLMyf7qb4cKZjIi93WbKjT6+kG/x4H5Q73Tff69trL9K0YDPIswzWe6hkcyuOHlw==" crossorigin="anonymous"></script>
<script>
initTineMce();
function initTineMce(selector) {
if(selector == undefined){selector = 'textarea';}
tinymce.init({

content_css : "{{asset('public/frontend/css/style.css')}},{{asset('public/frontend/css/responsive.css')}},{{asset('public/frontend/css/bootstrap.css')}}",

content_style: "@import url('https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Roboto&display=swap'); body { font-family: 'Roboto'; }",
selector:"#mytextarea1",
menubar:false,
statusbar: false,
auto_focus : "elm1",
height: "350px",
plugins: "autoresize lists textcolor advlist table link media code image charmap fullpage  ",
file_picker_types: 'file image media',
advlist_bullet_styles: 'disc',
image_caption: true,
inline_boundaries: false,
relative_urls : false,
remove_script_host : false,
convert_urls : true,
font_formats:"Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago;Roboto=roboto; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
toolbar: 'code | insertfile undo redo | styleselect | fontselect | fontsizeselect | forecolor backcolor | bold italic underline | superscript subscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
lists_indent_on_tab: false,
// plugins: 'table',
// menubar: 'table',
setup: function (editor) {
editor.ui.registry.addButton('customInsertButton', {
text: 'Add Button',
onAction: function (_) {
editor.insertContent('&nbsp; <a href="_BTNLINK_" class="save_all_changes_btn">Button</a>&nbsp;');
}
});
},

});


}
</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
     
       document.getElementById("btn_convert1").addEventListener("click", function() {
        console.log(tinyMCE.get('mytextarea1').getContent());
        alert("j");

     
        $("#xyz").html(tinyMCE.get('mytextarea1').getContent());

  html2canvas(document.getElementById("xyz"),{
    allowTaint:true,
    useCORS: true,
  }).then(function (canvas) {    
     var anchorTag = document.createElement("a");
       document.body.appendChild(anchorTag);
      document.getElementById("previewImg").appendChild(canvas);
      anchorTag.download = "filename.jpg";
      canvas.setAttribute('crossorigin', 'anonymous');
      anchorTag.href = canvas.toDataURL();
      anchorTag.target = '_blank';
     anchorTag.click();
      //form.submit();
    });
 });
    </script>

@endsection