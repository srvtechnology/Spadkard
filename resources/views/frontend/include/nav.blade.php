<nav class="navbar navbar-expand-lg navbar-fixed navbar-blue">
            <div class="navbar-inner">
               <div class="navbar-intro justify-content-xl-between">
                  <button type="button" class="btn btn-burger burger-arrowed static collapsed ml-2 d-flex d-xl-none" data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
                  <span class="bars"></span>
                  </button><!-- mobile sidebar toggler button -->
                  <a class="navbar-brand text-white" href="{{route('welcome')}}">
                 {{--  <img src="{{url('/')}}/public/frontend/asset/images/logo.png" style="max-height: 28px;"> --}}
                 <span>SPADE KARD</span>
                  </a><!-- /.navbar-brand -->
                  <button type="button" class="btn btn-burger mr-2 d-none d-xl-flex" data-toggle="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar">
                  <span class="bars"></span>
                  </button><!-- sidebar toggler button -->
               </div>
               <div class="navbar-content">
                  <button class="navbar-toggler py-2" type="button" data-toggle="collapse" data-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle navbar search">
                  <i class="fa fa-search text-white text-90 py-1"></i>
                  </button><!-- mobile #navbarSearch toggler -->
                  <div class="collapse navbar-collapse navbar-backdrop" id="navbarSearch">
                   {{--   <form class="d-flex align-items-center ml-lg-4 py-1" data-submit="dismiss">
                        <i class="fa fa-search text-white d-none d-lg-block pos-rel"></i>
                        <input type="text" class="navbar-input mx-3 flex-grow-1 mx-md-auto pr-1 pl-lg-4 ml-lg-n3 py-2 autofocus" placeholder="SEARCH ..." aria-label="Search" />
                     </form> --}}
                  </div>
               </div>
               <!-- .navbar-content -->
               <!-- mobile #navbarMenu toggler button -->
               <button class="navbar-toggler ml-1 mr-2 px-1" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navbar menu">
               <span class="pos-rel">
               <i class="fa fa-user" aria-hidden="true"></i>
               <span class="bgc-warning radius-round border-2 brc-white p-1 position-tr mr-n1px mt-n1px"></span>
               </span>
               </button>
               <div class="navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">
                  <div class="navbar-nav">
                     <ul class="nav">
                        {{-- <li class="nav-item dropdown dropdown-mega">
                           <a class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-bell text-110 icon-animated-bell mr-lg-2"></i>
                              <span class="d-inline-block d-lg-none ml-2">Notifications</span><!-- show only on mobile -->
                              <span id="id-navbar-badge1" class="badge badge-sm bgc-warning-d2 text-white radius-round text-85 border-1 brc-white-tp5">3</span>
                              <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                              <div class="dropdown-caret brc-white"></div>
                           </a>
                           <div class="dropdown-menu dropdown-sm dropdown-animated p-0 bgc-white brc-primary-m3 border-b-2 shadow">
                              <ul class="nav nav-tabs nav-tabs-simple w-100 nav-justified dropdown-clickable border-b-1 brc-secondary-l2" role="tablist">
                                 <li class="nav-item">
                                    <a class="d-style px-0 mx-0 py-3 nav-link active text-600 brc-blue-m1 text-dark-tp5 bgc-h-blue-l4" data-toggle="tab" href="#navbar-notif-tab-1" role="tab">
                                    <span class="d-active text-blue-d1 text-105">Notifications</span>
                                    <span class="d-n-active">Notifications</span>
                                    </a>
                                 </li>
                              </ul>
                              <!-- .nav-tabs -->
                              <div class="tab-content tab-sliding p-0">
                                 <div class="tab-pane mh-none show active px-md-1 pt-1" id="navbar-notif-tab-1" role="tabpanel">
                                    <a href="#" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                    <i class="fab fa-twitter bgc-blue-tp1 text-white text-110 mr-15 p-2 radius-1"></i>
                                    <span class="text-muted">Followers</span>
                                    <span class="float-right badge badge-danger radius-round text-80">- 4</span>
                                    </a>
                                    <a href="#" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                    <i class="fa fa-comment bgc-pink-tp1 text-white text-110 mr-15 p-2 radius-1"></i>
                                    <span class="text-muted">New Comments</span>
                                    <span class="float-right badge badge-info radius-round text-80">+12</span>
                                    </a>
                                    <a href="#" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                    <i class="fa fa-shopping-cart bgc-success-tp1 text-white text-110 mr-15 p-2 radius-1"></i>
                                    <span class="text-muted">New Orders</span>
                                    <span class="float-right badge badge-success radius-round text-80">+8</span>
                                    </a>
                                    <a href="#" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                    <i class="far fa-clock bgc-purple-tp1 text-white text-110 mr-15 p-2 radius-1"></i>
                                    <span class="text-muted">Finished processing data!</span>
                                    </a>
                                    <hr class="mt-1 mb-1px brc-secondary-l2" />
                                    <a href="#" class="mb-0 py-3 border-0 list-group-item text-blue text-uppercase text-center text-85 font-bolder">
                                    See All Notifications
                                    <i class="ml-2 fa fa-arrow-right text-muted"></i>
                                    </a>
                                 </div>
                                 <!-- .tab-pane : notifications -->
                              </div>
                           </div>
                        </li> --}}
                        <li class="nav-item dropdown order-first order-lg-last">
                           <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                           <span class="d-inline-block d-lg-none d-xl-inline-block">
                           <span class="nav-user-name">{{auth::user()->name}}</span>
                           </span>
                           <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                           <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                           </a>
                           <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3 py-1">
                              <div class="d-none d-lg-block d-xl-none">
                                 <div class="dropdown-header">
                                    Welcome, {{auth::user()->name}}
                                 </div>
                                 <div class="dropdown-divider"></div>
                              </div>
                              <a class="mt-1 dropdown-item btn btn-outline-grey bgc-h-primary-l3 btn-h-light-primary btn-a-light-primary" href="{{route('user.change.profile')}}">
                              <i class="fa fa-user text-primary-m1 text-105 mr-1"></i>
                              Edit Profile
                              </a>
                              <div class="dropdown-divider brc-primary-l2"></div>
                              <a class="dropdown-item btn btn-outline-grey bgc-h-secondary-l3 btn-h-light-secondary btn-a-light-secondary" href="{{ route('user.logout') }}">
                              <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                              Logout
                              </a>
                           </div>
                        </li>
                        <!-- /.nav-item:last -->
                     </ul>
                     <!-- /.navbar-nav menu -->
                  </div>
                  <!-- /.navbar-nav -->
               </div>
               <!-- /#navbarMenu -->
            </div>
            <!-- /.navbar-inner -->
         </nav>