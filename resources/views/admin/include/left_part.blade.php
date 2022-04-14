@section('head')
@include('admin.include.head')
@endsection
<style>
#sidebar-menu > ul > li > a.active {
background: #FF6347 !important;
color: #FFF;
}
#sidebar-menu ul ul a {
/* color: #75798B; */
color: #597884;
display: block;
padding:15px 33px 9px 11px;
}
.abc{
background-color:#FF6347 !important;
color:white !important;
}
.abc span{
color: white !important;
}
</style>
{{-- <body class="fixed-left"> --}}
  <!-- Begin page -->
  <div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
      <!-- LOGO -->
      <div class="topbar-left">
        <div class="text-center">
          <a href="index.html" class="logo"><img src="{{url('/')}}/assets/img/logo-d-long.png" alt=""></a>
        </div>
      </div>
      <!-- Button mobile view to collapse sidebar menu -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="">
            <div class="pull-left">
              <button class="button-menu-mobile open-left"> <i class="fa fa-bars"></i> </button> <span class="clearfix"></span> </div>
              <!--<form class="navbar-form pull-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                </div>
                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
              </form>-->
              <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">@if(@Auth::guard('admin')->user()->image)
                  <img src="{{url('/')}}/storage/app/public/admin/{{Auth::guard('admin')->user()->image}}" alt="" class="thumb-md img-circle">@else<i class='fas fa-user-tie' style='font-size:36px;color: black;'  ></i> @endif </a>
                  <ul class="dropdown-menu">
                    {{--  <li><a href="javascript:void(0)"><i class="fas fa-user-circle"></i> Profile</a></li> --}}
                    {{--  <li><a href="{{route('change.password')}}"><i class="fas fa-cog"></i> Change Password</a></li> --}}
                    <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <!--/.nav-collapse -->
          </div>
        </div>
      </div>
      <!-- Top Bar End -->
      <!-- ========== Left Sidebar Start ========== -->
      <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
          <div class="user-details">
            <div class="pull-left"> @if(@Auth::guard('admin')->user()->image)
            <img src="{{url('/')}}/storage/app/public/admin/{{Auth::guard('admin')->user()->image}}" alt="" class="thumb-md img-circle">@else<i class='fas fa-user-tie' style='font-size:36px;color: black;'  ></i> @endif </div>
            <div class="user-info">
              <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Admin Panel<span class="caret"></span></a>
              <ul class="dropdown-menu">
                {{-- <li><a href="javascript:void(0)"><i class="fas fa-user-circle"></i> Profile</a></li> --}}
                {{--  <li><a href="{{route('change.password')}}"><i class="fas fa-cog"></i> Change Password</a></li> --}}
                <li> <a class="dropdown-item" href="{{ route('admin.logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i>
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
          <p class="text-muted m-0">{{@Auth::guard('admin')->user()->name}}</p>
        </div>
      </div>
      <!--- Divider -->
      <div id="sidebar-menu">
        <ul>
          <li> <a href="{{route('admin.dashboard.home')}}" class="{{request()->segment(2)=='dashboard'?'waves-effect active':''}}" ><i class="fas fa-cog ri5"></i><span> Dashboard </span></a> </li>
          
          
          <li><a href="{{route('admin.edit.view')}}" class="{{request()->segment(2)=='edit-profile'?'waves-effect active':''}}"><i class="fas fa-edit"></i><span>Edit Profile </span></a></li>
          <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.temp.list')}}" class="{{request()->segment(2)=='manage-template'?'waves-effect active abc':''}}"><i class="fas fa-expand"></i><span>Template Management  </span></a></li>

           <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.html.list')}}" class="{{request()->segment(2)=='manage-html'?'waves-effect active abc':''}}"><i class="far fa-id-card"></i><span>Design Management </span></a></li>



           {{--   <li><a href="{{route('admin.user.added.temp')}}" class="{{request()->segment(2)=='user-added-template'?'waves-effect active abc':''}}"><i class="far fa-id-badge"></i><span>User Added Template</span></a></li> --}}

           <li><a href="{{route('admin.price.list')}}" class="{{request()->segment(2)=='card-price'?'waves-effect active abc':''}}"><i class="fas fa-dollar"></i><span>Card Price Management  </span></a></li>


          <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.mat.list')}}" class="{{request()->segment(2)=='manage-material-type'?'waves-effect active abc':''}}"><i class="fas fa-magic"></i><span>Material Management  </span></a></li>

          <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.print.list')}}" class="{{request()->segment(2)=='print-request'?'waves-effect active abc':''}}"><i class="far fa-id-card"></i><span>Print Personal Card </span></a></li>

          <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.corp.print.list')}}" class="{{request()->segment(2)=='corporate-print-request'?'waves-effect active abc':''}}"><i class="far fa-id-card"></i><span>Print Corporate Card </span></a></li>

          
           <li><a href="{{route('admin.reprint.list')}}" class="{{request()->segment(2)=='manage-reprint'?'waves-effect active abc':''}}"><i class="far fa-id-card"></i><span>Re-Print Card Management </span></a></li>






          <li > <a href="#" id="abcd" class="nav-link" ><i class="fas fa-flag-checkered"></i>   <span id="plus" style="" onclick="plus()">CMS Management ⇩ </span> </a>






          <ul class="nav nav-treeview" >
            <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.banner.page')}}" class="{{request()->segment(2)=='banner-management'?'waves-effect active abc':''}}"><i class="fas fa-flag"></i><span>Banner Management </span></a></li>
            <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.content.page')}}" class="{{request()->segment(2)=='per-business-management'?'waves-effect active abc':''}}"><i class="fas fa-file"></i><span> Per Busn. Management </span></a></li>
            
            
            <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.cat.list')}}" class="{{request()->segment(2)=='punch-lines-management'?'waves-effect active abc':''}}"><i class="fas fa-icons"></i><span>Punch Lines Management </span></a></li>
            <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.content.two.list')}}" class="{{request()->segment(2)=='advantage-digital-card-management'?'waves-effect active abc':''}}"><i class="fas fa-file"></i><span>Advantage Of Digital Card </span></a></li>
            
            <li {{-- class="{{request()->segment(2)=='banner-management'?'abc':''}}" --}}><a href="{{route('admin.logo.list')}}" class="{{request()->segment(2)=='manage-industry-logo'?'waves-effect active abc':''}}"><i class="fas fa-splotch"></i><span>Industry Logo Mang </span></a></li>

             <li ><a href="{{route('admin.footer.page')}}" class="{{request()->segment(2)=='footer-management'?'waves-effect active abc':''}}"><i class="fas fa-sliders-h"></i><span>Footer Management </span></a></li>
            
            
            
            
          </ul>
        </li>
        
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Left Sidebar End -->
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
@if(Route::is('admin.dashboard.home') || Route::is('admin.edit.view') || Route::is('admin.temp.list') || Route::is('admin.mat.list') || Route::is('admin.temp.add.page') || Route::is('admin.temps.edit') || Route::is('admin.temp.view') || Route::is('admin.mat.add.page') || Route::is('admin.print.list') || Route::is('admin.mat.edit') || Route::is('admin.all.print.req.card.list') || Route::is('admin.completed.print') || Route::is('admin.view.print.details')  || Route::is('admin.user.added.temp') || Route::is('admin.html.list') || Route::is('admin.add.html.page') || Route::is('admin.html.edit') || Route::is('admin.reprint.list') || Route::is('admin.view.reprint')  || Route::is('admin.corp.print.list')  || Route::is('admin.corp.all.print.req.card.list')  || Route::is('admin.corp.completed.print') || Route::is('admin.corp.view.print.details') || Route::is('admin.price.list') || Route::is('admin.price.add.page') || Route::is('admin.card.price.edit') )

$("#plus").text("CMS Management ⇩ ");
//$("#minus").hide();
@else
$("#plus").text("CMS Management ⇨ ");
// $("#minus").show();
$("#abcd").trigger('click');
@endif
});

$("#abcd").click(function(){

if ($('#plus').text() == "CMS Management ⇩ ") {
$("#plus").text("CMS Management ⇨ ");
}
else {
$("#plus").text("CMS Management ⇩ ")
}
});
</script>