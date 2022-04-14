@extends('admin.layouts.app')
@section('title')
<title>Admin | Edit Per Business</title>
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
					<h4 class="pull-left page-title">Per Business </h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">SPADE KARD</a></li>
						<li class="active">Per Business</li>
					</ol>
				</div>
            </div>
            @include('admin.include.message')
            {{-- <div class="add-btn "><a href="{{route('content.list')}}"><i class="icofont-minus-circle"></i> Back</a></div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                            <h3 class="panel-title">Edit content ( Below Banner )</h3> </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" id="frm" method="post" action="{{route('admin.upload.content')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$content->id}}">
                                   

                                    

                                     <div class="form-group rm03">
                                        <label for="FullName">Content One Title</label>
                                        <textarea id="mytextarea1" style="width: 95%;height: 300px" name="title"  >{!!$content->title!!}</textarea>
                                    </div>

                                     <div class="form-group rm03">
                                        <label for="FullName">Content One Description</label>
                                        <textarea id="mytextarea2" style="width: 95%;height: 300px" name="text"  >{!!$content->text!!}</textarea>
                                    </div>
                                        
                                         <style>
                                        .tox.tox-tinymce{
                                          height: 300px !important;
                                          width: 95% !important;
                                        }
                                    </style>


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
    <!-- content -->
    
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





<script>
initTineMce();
function initTineMce(selector) {
if(selector == undefined){selector = 'textarea';}
tinymce.init({

content_css : "{{asset('public/frontend/css/style.css')}},{{asset('public/frontend/css/responsive.css')}},{{asset('public/frontend/css/bootstrap.css')}}",

content_style: "@import url('https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Roboto&display=swap'); body { font-family: 'Roboto'; }",
selector:"#mytextarea2",
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






@endsection