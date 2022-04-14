<style>
   .sidebar-light .nav>.nav-item>.nav-link:hover{
      background-color: blue !important;
      color: white !important;
   }
   .active{
      background-color: blue !important;
      color: white !important;
   }
</style>

<div id="sidebar" class="sidebar sidebar-fixed expandable sidebar-light">
               <div class="sidebar-inner">
                  <div class="ace-scroll flex-grow-1">
                     <ul class="nav has-active-border active-on-right">
                        <li  class="{{request()->segment(2)=='dashboard'?'nav-item active':'nav-item'}}">
                           <a href="{{route('user.dashboard')}}" class="nav-link">
                           <i class="nav-icon fa fa-home"></i>
                           <span class="nav-text fadeable">
                           <span>Home</span>
                           </span>
                           </a>
                        </li>

                        <li  class="{{request()->segment(2)=='request-card'?'nav-item active':'nav-item'}}">
                           <a href="{{route('request.card.list')}}" class="nav-link">
                           <i class="nav-icon fa fa-info-circle"></i>
                           <span class="nav-text fadeable">
                           <span>My Personal Card</span>
                           </span>
                           </a>
                        </li>

                        <li  class="{{request()->segment(2)=='corporate-card'?'nav-item active':'nav-item'}}">
                           <a href="{{route('corp.list')}}" class="nav-link">
                           <i class="nav-icon fa fa-info-circle"></i>
                           <span class="nav-text fadeable">
                           <span>My Corporate Card</span>
                           </span>
                           </a>
                        </li>

                         <li  class="{{request()->segment(2)=='re-print-card'?'nav-item active':'nav-item'}}">
                           <a href="{{route('re.print.cards.list')}}" class="nav-link">
                           <i class="nav-icon fa fa-info-circle"></i>
                           <span class="nav-text fadeable">
                           <span>Re-Print Request</span>
                           </span>
                           </a>
                        </li>
                        {{-- <li class="nav-item">
                           <a href="#" class="nav-link dropdown-toggle collapsed">
                           <i class="nav-icon fa fa-microphone"></i>
                           <span class="nav-text fadeable">
                           <span>Speaking Services</span>
                           </span>
                           <b class="caret fa fa-angle-left rt-n90"></b>
                           </a>
                           <div class="hideable submenu collapse">
                              <ul class="submenu-inner">
                                 <li class="nav-item">
                                    <a href="html/dashboard-2.html" class="nav-link">
                                    <span class="nav-text">
                                    <span>Speaking</span>
                                    </span>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="html/dashboard-2.html" class="nav-link">
                                    <span class="nav-text">
                                    <span>Seminars & Workshops</span>
                                    </span>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <b class="sub-arrow"></b>
                        </li> --}}
                        {{-- <li class="nav-item">
                           <a href="#" class="nav-link dropdown-toggle collapsed">
                           <i class="nav-icon fa fa-users"></i>
                           <span class="nav-text fadeable">
                           <span>Coaching Services</span>
                           </span>
                           <b class="caret fa fa-angle-left rt-n90"></b>
                           </a>
                           <div class="hideable submenu collapse">
                              <ul class="submenu-inner">
                                 <li class="nav-item">
                                    <a href="html/dashboard-2.html" class="nav-link">
                                    <span class="nav-text">
                                    <span>Group Coaching</span>
                                    </span>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="html/dashboard-2.html" class="nav-link">
                                    <span class="nav-text">
                                    <span>Individual Coaching</span>
                                    </span>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <b class="sub-arrow"></b>
                        </li> --}}
                        {{-- <li class="nav-item">
                           <a href="html/dashboard.html" class="nav-link">
                           <i class="nav-icon fa fa-mobile"></i>
                           <span class="nav-text fadeable">
                           <span>Contact</span>
                           </span>
                           </a>
                        </li> --}}
                     </ul>
                  </div>
                  <!-- /.sidebar scroll -->
               </div>
            </div>