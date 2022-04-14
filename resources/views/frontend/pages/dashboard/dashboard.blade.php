@extends('layouts.app')
@section('title')
<title>User | Dashboard</title>
@endsection
      @include('frontend.include.head')
      <!-- "Basic Elements" page styles, specific to this page for demo only -->
@section('content')
      <div class="body-container">
          @include('frontend.include.nav')
         <div class="main-container bgc-white">
            @include('frontend.include.left_part')
           {{--  <div role="main" class="main-content">
               <div class="page-content container container-plus">
                  <div class="card acard mt-2 mt-lg-3">
                     <div class="card-header">
                        <h3 class="card-title text-125 text-primary-d2">
                           Form Elements
                        </h3>
                     </div>
                     <div class="card-box brc-blue-m2">
                        <div class="card-box-body">
                           <div class="row">
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label for="">
                                    Default field
                                    </label>
                                    <input type="text" placeholder="Enter here" class="form-control" id="" />
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label for="">
                                    Default field
                                    </label>
                                    <select class="form-control">
                                       <option>--Select option--</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label for="">
                                    Default field
                                    </label>
                                    <input type="text" placeholder="Enter here" class="form-control" id="" />
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="">
                                    Default field
                                    </label>
                                    <textarea class="form-control" rows="5"></textarea>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="">
                                    Default field
                                    </label>
                                    <div class="clearfix"></div>
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                       <label class="form-check-label" for="inlineCheckbox1">Default field</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                       <label class="form-check-label" for="inlineCheckbox2">Default field</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2">
                                       <label class="form-check-label" for="inlineCheckbox3">Default field</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="">
                                    Default field
                                    </label>
                                    <div class="clearfix"></div>
                                    <div class="form-check form-check-inline ml-4">
                                       <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                       <label class="custom-control-label" for="customRadio1">Toggle this other custom radio</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <hr>
                                 <div class="form-group mb-0">
                                    <button class="btn btn-info btn-bold px-4" type="button">
                                    Save
                                    </button>
                                    <button class="btn btn-outline-lightgrey btn-bgc-white btn-bold ml-2 px-4" type="reset">
                                    Cancel
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
               </div>
               <footer class="footer d-none d-sm-block">
                  <div class="footer-inner bgc-white-tp1">
                     <div class="pt-3 border-none border-t-3 brc-grey-l2 border-double">
                        <span class="text-grey">© 2022 Daimler India Commercial Vehicles Pvt. Ltd. All rights reserved.</span>
                     </div>
                  </div>
                  <!-- .footer-inner -->
                  <!-- `scroll to top` button inside footer (for example when in boxed layout) -->
                  <div class="footer-tools">
                     <a href="#" class="btn-scroll-up btn btn-dark mb-2 mr-2">
                     <i class="fa fa-angle-double-up mx-2px text-95"></i>
                     </a>
                  </div>
               </footer>
               <!-- footer toolbox for mobile view -->
            </div> --}}
             <h1 style=" margin: auto;"> welcome {{auth::user()->name}} </h1>

         </div>

         
       
      </div>
      @endsection
      <!-- include common vendor scripts used in demo pages -->
 @section('script')
@include('frontend.include.script')
@endsection
 