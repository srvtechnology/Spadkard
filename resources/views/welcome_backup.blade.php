<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css"
      />
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css"
        />
        <!-- Bootstrap CSS -->
        <link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous"
          />
          <!-- -- Icon CDN --  -->
          <link
            rel="stylesheet"
            href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
            crossorigin="anonymous"
            />
            <title>SPADE KARD</title>
            <link rel="stylesheet" href="{{url('/')}}/public/frontend/indexpage/assets/css/main.css" />
            <link rel="stylesheet" href="{{url('/')}}/public/frontend/indexpage/assets/css/index.css" />
            <link href="{{ URL::asset('public/frontend/croppie/croppie.css') }}" rel="stylesheet" />
            <link href="{{ URL::asset('public/frontend/croppie/croppie.min.css') }}" rel="stylesheet" />
            <style>
            .banner {
            background: url({{url('/')}}/storage/app/public/banner_image/{{$banner->image}});
            }
            .choose-sk div img {
            width: inherit !important;
            }
            </style>
          </head>
          <body class="home-page">
            <header class="max-theme-width">
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                  <img src="{{url('/')}}/public/frontend/indexpage/assets/img/main/nav-logo.png" alt="" width="100" />
                </a>
                <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Service</a></li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Why Spadekard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">compare now</a>
                    </li>
                    <li class="nav-item login-signup">
                      <img src="{{url('/')}}/public/frontend/indexpage/assets/img/main/log.png" alt="" width="20" />
                      @if(!@auth::user()->id)
                    <a href="" data-toggle="modal" data-target="#loginModel" class="link">login/</a
                    ><a href="#" data-toggle="modal" data-target="#signupModel" class="link"
                    >signup</a>
                    @else
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('user.dashboard')}}">Dashboard</a>
                    </li>
                    @endif
                  </li>
                </ul>
              </div>
            </nav>
            <!-- <div class="nav-logo max-theme-width">
                <img src="{{url('/')}}/public/frontend/indexpage/assets/img/main/nav-logo.png" alt="">
            </div> -->
          </header>
          <!-- -- banner --  -->
          @include('frontend.include.message_two')
          @include('frontend.include.message')
          <div class="banner">
            <div class="max-theme-width">
              <div>
                <h4>{{@$banner->title}}</h4>
                <div class="list-main">
                  @foreach($banner_text as $b_text)
                  <div class="list-item">
                    <img src="{{url('/')}}/public/frontend/indexpage/assets/img/home/sk/tick.png" alt="" />
                    <span
                    >{{@$b_text->text}}</span
                    >
                  </div>
                  @endforeach
                  
                </div>
              </div>
            </div>
          </div>
          <!-- -- info --  -->
          <div class="info section-padding">
            <div class="max-theme-width">
              <div class="text-main">
                {{--  <h4 class="main-title title-dark">
                paper business card has been around for more than 100 years
                </h4> --}}
                {!!$content_one->title!!}
                {{--  <p>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem
                  repellat quas optio facilis dignissimos. Ipsum!
                </p>
                <p>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem
                  repellat quas optio facilis dignissimos. Lorem ipsum dolor sit amet
                  consectetur adipisicing elit. Odio, reprehenderit.
                </p>
                <p>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem
                  repellat quas optio facilis dignissimos. Lorem
                </p> --}}
                {!!$content_one->text!!}
              </div>
              {{-- card category --}}
              <div class="info-icon">
                @foreach($card_cat as $val)
                <div>
                  <img src="{{url('/')}}/public/category_icon/{{$val->image}}" alt="" />
                  <p>
                    {{@$val->title}}
                    <br />
                    {{@$val->title_two}}
                  </p>
                </div>
                @endforeach
                
              </div>
            </div>
          </div>
          <!-- why spade kard -->
          <div class="why-sk section-padding">
            <div class="max-theme-width">
              <h4 class="main-title title-dark">why spade kard</h4>
              <div>
                <img src="{{url('/')}}/public/frontend/indexpage/assets/img/home/why/art.png" alt="" class="img-fluid" />
              </div>
            </div>
          </div>
          
          <!-- choose a card -->
          <div class="choose-sk section-padding">
            <div class="max-theme-width">
              <h4 class="main-title title-dark">choose a card</h4>
              <div class="row">
                @foreach($last_4_temp as $val)
                <div class="col-lg-3 col-md-3 col-12 my-3">
                  <div>
                    <img
                    src="{{url('/')}}/storage/app/public/template_front/{{@$val->image}}"
                    alt=""
                    class="img-fluid"
                    />
                  </div>
                  <button class="btn btn-sm btn-outline-warning"  @if(@auth::user()->id) onclick="openModel({{@$val->id}},'{{@$val->image}}')" {{-- data-toggle="modal" data-target="#myModal{{@$val->id}}" --}} @else data-toggle="modal" data-target="#loginModel"  @endif>
                  select a card
                  </button>
                  <button class="btn btn-sm btn-secondary" @if(@auth::user()->id) {{-- data-toggle="modal" data-target="#customize" --}} onclick="customizeModel()" @else data-toggle="modal" data-target="#loginModel"  @endif>
                  customize your own card
                  </button>
                </div>
                <!-- Modal3 -->
                <div
                  class="modal fade"
                  id="myModal{{@$val->id}}"
                  tabindex="-1"
                  aria-labelledby="myModalLabel3"
                  aria-hidden="true"
                  >
                  <div class="modal-dialog">
                    <div class="modal-content" style="width: 90vw;
                    position: fixed;
                      top: 10px;
                      left: 50%;
                      transform: translateX(-50%);
                      max-height: 97vh;
                      overflow-y: auto;
                      overflow-x: hidden;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel3">SUBMIT ALL INFORMATION FOR {{$val->name}}</h5>
                        <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                        >
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <script>
                        
                        function name_fun(id){
                          var name=$("#name"+id).val();
                          $(".unq-name").text(name);
                          // console.log(name);
                        }
                        function comp_fun(id){
                          var company=$("#company"+id).val();
                          $(".unq-company").text(company);
                          // console.log(company);
                        }
                        function ph_fun(id){
                          var ph=$("#ph"+id).val();
                      $(".unq-ph").text(ph);
                          // console.log(ph);
                        }
                        function email_fun(id){
                          var email=$("#email"+id).val();
                          $(".unq-email").text(email);
                          // console.log(email);
                        }
                        function address_fun(id){
                      var address=$("#address"+id).val();
                      $(".unq-address").text(address);
                          // console.log(address);
                        }
                        function tag_fun(id){
                          var tag=$("#tag"+id).val();
                          $(".unq-tag").text(tag);
                          // console.log(tag);
                          
                        }
                      
                      </script>

                      <div class="row">
                        <div class="col-md-6 col-12">
                          <div id="html{{@$val->id}}"></div>
                          <br>
                          <div id="html_back{{@$val->id}}"></div>
                        </div>
                        <div class="col-md-6 col-12">
                        
                      
                      
                      <div class="modal-body form-content">
                        <form role="form"  method="post" action="{{route('ins.user.form')}}" enctype="multipart/form-data" id="frm{{$val->id}}">
                          @csrf
                          <input type="hidden"  class="form-control"  name="template_id" required  value="{{@$val->id}}">
                          @php
                          $html=DB::table('html')->where('temp_id',@$val->id)->first();
                          @endphp
                          <input type="hidden"  class="form-control"  name="design_id" required  value="{{@$html->id}}">
                          
                          
                          <div class="row">
                            <div class="col-md-6 col-12 my-3">
                              <input type="text" class="form-control" placeholder="Your Name" required name="name" onkeyup="name_fun({{@$val->id}})" id="name{{@$val->id}}">
                            </div>
                            <div class="col-md-6 col-12 my-3">
                              <input type="text" class="form-control" placeholder="Your Company Name" name="company" required onkeyup="comp_fun({{@$val->id}})" id="company{{@$val->id}}">
                            </div>
                            <div class="col-md-6 col-12 my-3">
                              <input type="tel" class="form-control" placeholder="Your Phone Number" name="ph" required minlength="10" pattern="^\d{10}$" title="Please enter 10 digit number" onkeyup="ph_fun({{@$val->id}})" id="ph{{@$val->id}}">
                            </div>
                            <div class="col-md-6 col-12 my-3">
                              <input type="email" class="form-control" placeholder="Your Email" name="email" required pattern="^([A-Za-z0-9_\-\.]+)@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$" onkeyup="email_fun({{@$val->id}})" id="email{{@$val->id}}">
                            </div>
                            <div class="col-md-6 col-12 my-3">
                              <input type="text" class="form-control" placeholder="Your Address" name="address" required  onkeyup="address_fun({{@$val->id}})" id="address{{@$val->id}}">
                            </div>
                            <div class="col-md-6 col-12 my-3">
                              <input type="text" class="form-control" placeholder="Your Tagline" name="tag" required   onkeyup="tag_fun({{@$val->id}})" id="tag{{@$val->id}}">
                            </div>
                            @php
                            $mat=DB::table('material_type')->where('status','A')->get();
                            @endphp
                            <div class="col-md-6 col-12 my-3">
                              <select required name="material_id">
                                <option selected value="">Card Material Type</option>
                                @foreach($mat as $val2)
                                <option value="{{$val2->id}}">{{$val2->name}}</option>
                                @endforeach
                              </select>
                            </div>

                            {{-- color --}}
                    {{--  <div class="col-md-6 col-12 my-3">
                        <div class="row">

                          <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Chose color"  required id="color{{$val->id}}" disabled>

                            <input type="hidden" class="form-control" name="color" required id="color_first_hidden{{$val->id}}" >
                          </div>
                          <div class="col-md-2">
                            <input type="color"  onchange="clr_one(this.value,'{{$val->id}}')" onkeyup="clr_one(this.value,'{{$val->id}}')" oninput="clr_one(this.value,'{{$val->id}}')" value="#e00606 ">
                          </div>

                        </div>
                    
                      </div> --}}

                      
                      {{-- <script>
                        function clr_one(v,id){
                                                  //alert(v);
                                                  //console.log(v,id);
                                                   $("#color"+id).val(v);
                                                    $("#color_first_hidden"+id).val(v);
                                                 
                                                   $(".unq-company").css("color",v);
                          $(".unq-name").css("color",v);
                          $(".unq-tag").css("color",v);
                          $(".unq-email").css("color",v);
                          $(".unq-ph").css("color",v);
                          $(".unq-address").css("color",v);
                        }
                      </script> --}}
                              



                            <div class="col-md-6 col-12 my-3">
                              <select required name="ordertype" id="ot{{$val->name}}" onchange="abc(this,{{$val->id}})">
                                <option value="" selected>Card Order Type</option>
                                <option value="S" >Personal</option>
                                <option value="M"  >Corporate</option>
                                
                              </select>
                            </div>
                          <script>
                          function abc(v,id){
                            var value = v.value;
                            var id = id;
                            if(value=="S"){
                              // /alert("hh");
                                 $("#noofprofile"+id).hide();
                                  $("#total_profile_1"+id).val('');
                            }else{
                               $("#noofprofile"+id).show();
                            }
                                //console.log(value,id);
                          }


                            function check_no(v,id){
                              // var total_pro=$("#total_profile_1"+id).val();
                              // var total_card=$("#total_order"+id).val();
                              // console.log(total_pro,total_card);
                              // if(parseInt(total_pro)> parseInt(total_card)){
                              //  alert("no of card can not be less then no of profile.");
                              // }

                            }
                          </script>
                            
                            <div class="col-md-6 col-12 my-3" id="noofprofile{{$val->id}}" >
                              <input type="number" class="form-control" placeholder="No Of Profile" name="total_profile" id="total_profile_1{{$val->id}}" >
                            </div>

                            <div class="col-md-6 col-12 my-3" id="noofcard{{$val->id}}" >
                              <input type="number" class="form-control" placeholder="No Of Card" name="total_order" onchange="check_no(this.value,{{$val->id}})" id="total_order{{$val->id}}" >
                            </div>

                            <div class="col-md-8 col-12 my-3">
                              <div class="input-group mb-2 mr-sm-2">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input"  name="logo" accept="image/*" required
                                  onchange="document.getElementById('blah{{$val->id}}').src = window.URL.createObjectURL(this.files[0]);
                                  $('.unq-logo').attr('src', window.URL.createObjectURL(this.files[0]))">
                                  <label class="custom-file-label" for="customFileLangHTML" data-browse="File Attach">Attach Your Logo</label>
                                </div>
                              </div>
                              
                            </div>
                            <img id="blah{{$val->id}}"  width="80" height="80" />
                            {{-- <img id="blahw{{$val->id}}"  width="80" height="80" /> --}}
                            
                            <div class="col-md-12 col-12 my-3">
                              <div class="check-box checks">
                                <input type="checkbox" class="form-check-input" /> Select and purchase the card with SK advertisenment or without
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary modal-btn" {{-- onclick="frm_submit({{$val->id}})" --}}>
                          CONTINUE
                          </button>

<script>


$(document).ready(function(){
jQuery.validator.addMethod("validate_email", function(value, element) {
if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
return true;
} else {
return false;
}
}, "Please enter a valid email address.");

jQuery.validator.addMethod("mobileonly", function(value, element) {
            return this.optional(element) ||  /^[+]?\d+$/.test(value.toLowerCase());
        }, "Enter valid number");

$('#frm{{$val->id}}').validate({
rules:{
name:{
required:true,
minlength:3,
},
company:{
required:true,
minlength:3,
// maxlength:50,
},
email:{
required:true,
//validate_email:true,
},
ph:{
required:true,
minlength:10,
maxlength:10,
mobileonly:true,
},
tag:{
required:true,
minlength:3,
},
address:{
required:true,
minlength:3,
},
material_id:{
required:true,
},
ordertype:{
required:true,
},
total_order:{
required:true,
},
total_profile:{
required:true,
},
logo:{
required:true,
},
temp:{
required:true,
},
},
submitHandler: function(form){
var total_pro=$("#total_profile_1{{$val->id}}").val();
var total_card=$("#total_order{{$val->id}}").val();
//console.log(total_pro,total_card);
if(parseInt(total_pro)> parseInt(total_card)){
  alert("no of card can not be less then no of profile.");
  return false;
}
// else if( $("#color{{$val->id}}").val().length<1){
//  alert("please chose a color.");
//  return false;
// }
else{
  //console.log("h");
  //$("#frm{{$val->id}}").submit();
  form.submit();

}
},
});
});

                            // function frm_submit(id){
                            //  var total_pro=$("#total_profile_1"+id).val();
                            //  var total_card=$("#total_order"+id).val();
                            //  console.log(total_pro,total_card);
                            //  if(parseInt(total_pro)> parseInt(total_card)){
                            //    alert("no of card can not be less then no of profile.");
                            //    return false;
                            //  }
                            //  else if( $("#color"+id).val().length<1){
                            //    alert("please chose a color.");
                            //    return false;
                            //  }
                            //  else{
                            //    console.log("h");
                            //    $("#frm"+id).submit();
                            //    //form.submit();

                            //  }
                            // }
                          </script>
                        </form>
                      </div>




                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                {{-- VIEW ALL --}}
                {{-- <div class="col-12 d-flex justify-content-center">
                  <button class="btn btn-warning" @if(@auth::user()->id) data-toggle="modal" data-target="#view_all" @else data-toggle="modal" data-target="#loginModel"  @endif>view all</button>
                </div>
 --}}


                {{-- <div class="col-12 d-flex justify-content-center">
                  <button class="btn btn-warning" @if(@auth::user()->id) data-toggle="modal" data-target="#customize" @else data-toggle="modal" data-target="#loginModel"  @endif>Customize</button>
                </div> --}}
              </div>
            </div>
          </div>
          
          <!-- effectivness -->
          <div class="eff-sk section-padding">
            <div class="max-theme-width">
              <div class="row mb-5">
                <div class="col-md-6 col-12">
                  <div>
                    <img
                    src="{{url('/')}}/public/content_two_image/{{@$Content_two_part_one->image}}"
                    alt=""
                    class="img-fluid"
                    />
                  </div>
                </div>
                <div class="col-md-6 col-12 my-4">
                  <h4 class="main-title title-dark">{{@$Content_two_part_one->title}}</h4>
                  {{-- <p class="para1">Paper:</p>
                  <p class="text-justify">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia
                    doloremque quo reprehenderit voluptatem aliquid aut quisquam
                    beatae odio temporibus velit.
                  </p>
                  <p class="para1">Smart:</p>
                  <p class="text-justify">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia
                    doloremque quo reprehenderit voluptatem aliquid aut quisquam
                    beatae odio temporibus velit.
                  </p> --}}
                  {!!@$Content_two_part_one->text!!}
                </div>
              </div>
              <div class="row reverse-row">
                <div class="col-md-6 col-12 my-4">
                  <h4 class="main-title title-dark">{{@$Content_two_part_two->title}}</h4>
                  {{--  <p class="text-justify">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia
                    doloremque quo reprehenderit voluptatem aliquid aut quisquam
                    beatae odio temporibus velit.
                  </p> --}}
                  {!!@$Content_two_part_two->text!!}
                </div>
                <div class="col-md-6 col-12">
                  <div>
                    <img
                    src="{{url('/')}}/public/content_two_image/{{@$Content_two_part_two->image}}"
                    alt=""
                    class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- lets compare -->
          <div class="lets-compare section-padding">
            <div class="max-theme-width">
              <h4 class="main-title title-dark">Let's compare</h4>
              <div class="table-main">
                <table class="table">
                  <thead>
                    <tr>
                      <th></th>
                      <th style="width: 50%">function</th>
                      <th>spade</th>
                      <th>other companies</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td>Lorem, ipsum.</td>
                      <td>yes</td>
                      <td>no</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Lorem, ipsum.</td>
                      <td>yes</td>
                      <td>no</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Lorem, ipsum.</td>
                      <td>yes</td>
                      <td>no</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Lorem, ipsum.</td>
                      <td>yes</td>
                      <td>no</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Lorem, ipsum.</td>
                      <td>yes</td>
                      <td>no</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Lorem, ipsum.</td>
                      <td>yes</td>
                      <td>no</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Lorem, ipsum.</td>
                      <td>yes</td>
                      <td>no</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Lorem, ipsum.</td>
                      <td>yes</td>
                      <td>no</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          <!-- -- industry --  -->
          <div class="industry section-padding">
            <div class="max-theme-width">
              <div class="text-main">
                <h4 class="main-title title-dark">
                industry-leaders have made <br> the switch to digital business
                </h4>
              </div>
              <!-- slick -->
              <div class="your-class" id="slick-slider-1">
                @foreach($industry_logo as $val)
                <div class="img-div"><img src="{{url('/')}}/storage/app/public/industry_logo/{{@$val->image}}" alt=""></div>
                @endforeach
                {{--  <div class="img-div"><img src="{{url('/')}}/public/frontend/indexpage/assets/img/home/slick/2.png" alt=""></div>
                <div class="img-div"><img src="{{url('/')}}/public/frontend/indexpage/assets/img/home/slick/3.png" alt=""></div>
                <div class="img-div"><img src="{{url('/')}}/public/frontend/indexpage/assets/img/home/slick/4.png" alt=""></div>
                <div class="img-div"><img src="{{url('/')}}/public/frontend/indexpage/assets/img/home/slick/1.png" alt=""></div> --}}
              </div>
            </div>
          </div>
          <!-- footer -->
          @php
          $footer=DB::table('footer_content')->first();
          @endphp
          <footer class="section-padding">
            <div class="main-footer max-theme-width">
              <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 col-12">
                  <div class="f-logo">
                    <img src="{{url('/')}}/public/frontend/indexpage/assets/img/main/footer-logo.png" alt="" />
                  </div>
                  <p class="p-1">
                    {{@$footer->text}}
                  </p>
                </div>
                <div class="col-12 col-lg-3 col-md-6 mb-4 footer-links">
                  <div class="f-c-list">
                    <div class="f-list-item">
                      <img src="{{url('/')}}/public/frontend/indexpage/assets/img/main/arrow.png" alt="" />
                      <a href="#">About</a>
                    </div>
                    <div class="f-list-item">
                      <img src="{{url('/')}}/public/frontend/indexpage/assets/img/main/arrow.png" alt="" />
                      <a href="#">Services</a>
                    </div>
                    <div class="f-list-item">
                      <img src="{{url('/')}}/public/frontend/indexpage/assets/img/main/arrow.png" alt="" />
                      <a href="#">Why SPADEKARD</a>
                    </div>
                    <div class="f-list-item">
                      <img src="{{url('/')}}/public/frontend/indexpage/assets/img/main/arrow.png" alt="" />
                      <a href="#">Compare Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 col-12 my-3">
                  <table>
                    <tbody>
                      <tr>
                        <td>
                          <img src="{{url('/')}}/storage/app/public/footer/address/{{@$footer->address_img}}" alt="" width="20" height="25" />
                        </td>
                        <td> {{@$footer->address}} </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="{{url('/')}}/storage/app/public/footer/email/{{@$footer->email_image}}" alt="" />
                        </td>
                        <td>
                          <a href="mailto:{{$footer->email}}">{{$footer->email}}</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 col-12 my-3">
                  <div class="f-social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                  </div>
                  <div class="f-social-btn">
                    <button class="btn btn-outline-warning btn-sm">share now</button>
                  </div>
                </div>
              </div>
              <div class="dropdown-divider"></div>
              <div class="f-last">
                <div>
                  <p class="p-last">copyright Ⓒ 2022 Spadekard- all right reserved</p>
                </div>
                <div>
                  <a class="f-a-last" href="#">T&C</a>
                  <span class="f-s-last">|</span>
                  <a class="f-a-last" href="#">PRIVACY AND POLICY</a>
                </div>
              </div>
            </div>
          </footer>
























{{----------- ****************************   ALL MODEL   ************************************** ----------}}
{{-- ****************************   LOGIN MODEL   ************************************** --}}
          <div
            class="modal fade"
            id="loginModel"
            tabindex="-1"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
            >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Login</h5>
                  <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                  >
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-envelope"></i>
                        </div>
                      </div>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="inlineFormInputGroup"  placeholder="Input your user ID or Email">
                      @error('email')
                      {{-- <script>
                        alert("Login credential is wrong.!");
                      </script> --}}
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-key"></i>
                        </div>
                      </div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                      id="inlineFormInputGroup" placeholder="Input your password">
                      @error('password')
                      {{-- <script>
                        alert("Login credential is wrong.!");
                      </script>
                      --}}                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-check">
                      <div class="check-box">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </div>
                      <div class="forgot">
                        <a href="#" onclick="fgp()">Forgot Password?</a>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary modal-btn">
                    Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>













{{-- ****************************  REGISTRATION MODEL   ************************************** --}}
          <div
            class="modal fade"
            id="signupModel"
            tabindex="-1"
            aria-labelledby="myModalLabel2"
            aria-hidden="true"
            >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel2">Signup</h5>
                  <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                  >
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user"></i>
                        </div>
                      </div>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Input your Full Name">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fal fa-phone-volume"></i>
                        </div>
                      </div>
                      <input id="ph" type="tel" class="form-control @error('ph') is-invalid @enderror" name="ph" value="{{ old('ph') }}" pattern="^\d{10}$" title="Please enter 10 digit number" required autocomplete="ph" placeholder="Input your Phone Number">
                      @error('ph')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-envelope"></i>
                        </div>
                      </div>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  pattern="^([A-Za-z0-9_\-\.]+)@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$" placeholder="Input your Email">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-key"></i>
                        </div>
                      </div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8"  placeholder="Input your Password">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-key"></i>
                        </div>
                      </div>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" minlength="8" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                    <div class="form-check2">
                      <div class="check-box">
                        <input type="checkbox" class="form-check-input" /> By signing up, you agree to our
                      </div>
                      <div class="forgot">
                        <a href="">Terms & Condition.</a>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary modal-btn">
                    SIGN UP
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>















  {{-- ************************  VIEW ALL TEMPLATE   ************************************ --}}
          <div
            class="modal fade"
            id="view_all"
            tabindex="-1"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
            id="v_l"
            >
            <div class="modal-dialog">
              <div class="modal-content" style=" width: 150%">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">ALL TEMPLATE</h5>
                  <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                  >
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body row">
                  @foreach($all_temp as $val3)
                  <div class="col-lg-3 col-md-3" style="margin:10px 10px 10px 10px; ">
                    
                    <img
                    src="{{url('/')}}/storage/app/public/template/{{@$val3->image}}"
                    alt=""
                    class="img-fluid"
                    />
                    
                    <button class="btn btn-sm btn-outline-warning" onclick="openModeltwo({{@$val3->id}},'{{@$val3->image}}')"{{-- data-toggle="modal" data-target="#child{{@$val3->id}}" --}} >
                    select a card
                    </button>
                    <button class="btn btn-sm btn-secondary" style="margin-top: 10px" @if(@auth::user()->id) {{-- data-toggle="modal" data-target="#customize" --}}  onclick="customizeModel()" @else data-toggle="modal" data-target="#loginModel"  @endif>
                    customize your own card
                    </button>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>













{{-- **************************** CHILD OF VIEW ALL TEMP MODEL   *************************** --}}
          @foreach($all_temp as $val)
          <div
            class="modal fade"
            id="child{{@$val->id}}"
            tabindex="-1"
            aria-labelledby="myModalLabel3"
            aria-hidden="true"
            >
            <div class="modal-dialog">
              <div class="modal-content"  style="width: 90vw;
                    position: fixed;
                      top: 10px;
                      left: 50%;
                      transform: translateX(-50%);
                      max-height: 97vh;
                      overflow-y: auto;
                      overflow-x: hidden;">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel3">SUBMIT ALL INFORMATION FOR {{$val->name}}</h5>
                  <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                  >
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>


                <div class="row">
                  <div class="col-md-6 col-12">
                    <div id="html2{{@$val->id}}"></div>
                    <br>
                    <div id="html2_back{{@$val->id}}"></div>
                  </div>
                  <div class="col-md-6 col-12">
                                               <script>
                        
                        function name_fun2(id){
                          var name=$("#name_2"+id).val();
                          $(".unq-name").text(name);
                          // console.log(name);
                        }
                        function comp_fun2(id){
                          var company=$("#company_2"+id).val();
                          $(".unq-company").text(company);
                          // console.log(company);
                        }
                        function ph_fun2(id){
                          var ph=$("#ph_2"+id).val();
                      $(".unq-ph").text(ph);
                          // console.log(ph);
                        }
                        function email_fun2(id){
                          var email=$("#email_2"+id).val();
                          $(".unq-email").text(email);
                          // console.log(email);
                        }
                        function address_fun2(id){
                      var address=$("#address_2"+id).val();
                      $(".unq-address").text(address);
                          // console.log(address);
                        }
                        function tag_fun2(id){
                          var tag=$("#tag_2"+id).val();
                          $(".unq-tag").text(tag);
                          // console.log(tag);
                          
                        }
                      
                      </script>


                
                <div class="modal-body form-content">
                  <form role="form" id="frm_2{{$val->id}}" method="post" action="{{route('ins.user.form')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden"  class="form-control"  name="template_id" required  value="{{@$val->id}}">
                    @php
                    $html=DB::table('html')->where('temp_id',@$val->id)->first();
                    @endphp
                    <input type="hidden"  class="form-control"  name="design_id" id required  value="{{@$html->id}}">
                    
                    
                    <div class="row">
                      <div class="col-md-6 col-12 my-3">
                        <input type="text" class="form-control" placeholder="Your Name" required name="name" onkeyup="name_fun2({{@$val->id}})" id="name_2{{@$val->id}}">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="text" class="form-control" placeholder="Your Company Name" name="company" required onkeyup="comp_fun2({{@$val->id}})" id="company_2{{@$val->id}}">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="tel" class="form-control" placeholder="Your Phone Number" name="ph" required minlength="10" pattern="^\d{10}$" title="Please enter 10 digit number" onkeyup="ph_fun2({{@$val->id}})" id="ph_2{{@$val->id}}">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="email" class="form-control" placeholder="Your Email" name="email" required pattern="^([A-Za-z0-9_\-\.]+)@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$" onkeyup="email_fun2({{@$val->id}})" id="email_2{{@$val->id}}">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="text" class="form-control" placeholder="Your Address" name="address" required  onkeyup="address_fun2({{@$val->id}})" id="address_2{{@$val->id}}">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="text" class="form-control" placeholder="Your Tagline" name="tag" required   onkeyup="tag_fun2({{@$val->id}})" id="tag_2{{@$val->id}}">
                      </div>
                      @php
                      $mat=DB::table('material_type')->where('status','A')->get();
                      @endphp
                      <div class="col-md-6 col-12 my-3">
                        <select required name="material_id">
                          <option selected value="">Card Material Type</option>
                          @foreach($mat as $val2)
                          <option value="{{$val2->id}}">{{$val2->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      {{-- color --}}
                      <div class="col-md-6 col-12 my-3">
                        <div class="row">

                          <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Chose color"  required id="color_2{{$val->id}}" disabled>
                            <input type="hidden" class="form-control" name="color" required id="color_2_hidden{{$val->id}}" >
                          </div>
                          <div class="col-md-2">
                            <input type="color"  onchange="clr_view_all(this.value,'{{$val->id}}')" onkeyup="clr_view_all(this.value,'{{$val->id}}')" oninput="clr_view_all(this.value,'{{$val->id}}')" value="#e00606 ">
                          </div>

                        </div>
                    
                      </div>

                      
                      <script>
                        function clr_view_all(v,id){
                                                  //alert(v);
                                                  //console.log(v,id);
                                                   $("#color_2"+id).val(v);
                                                    $("#color_2_hidden"+id).val(v);
                                                 
                                                   $(".unq-company").css("color",v);
                          $(".unq-name").css("color",v);
                          $(".unq-tag").css("color",v);
                          $(".unq-email").css("color",v);
                          $(".unq-ph").css("color",v);
                          $(".unq-address").css("color",v);
                        }
                      </script>

                      

                      <div class="col-md-6 col-12 my-3">
                        <select required name="ordertype" id="ot{{$val->name}}" onchange="abcd(this,{{$val->id}})">
                          <option value="">Card Order Type</option>
                          <option value="S" >Personal</option>
                          <option value="M" selected >Corporate</option>
                          
                        </select>
                      </div>
                      <script>
                      function abcd(v,id){
                      var value2 = v.value;
                      var id2 = id;
                      if(value2=="S"){
                      // /alert("hh");
                      $("#noofprofile2"+id).hide();
                      $("#total_profile_2"+id).val('');
                      }else{
                      $("#noofprofile2"+id).show();
                      }
                      console.log(value2,id);
                      }
                      </script>

                      <div class="col-md-6 col-12 my-3" id="noofprofile2{{$val->id}}" >
                        <input type="number" class="form-control" placeholder="No Of Profile" name="total_profile" id="total_profile_2{{$val->id}}" >
                      </div>

                      <div class="col-md-6 col-12 my-3" >
                        <input type="number" class="form-control" placeholder="No Of Card" name="total_order" id="total_order_2{{$val->id}}" >
                      </div>
                      <div class="col-md-8 col-12 my-3">
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="logo" accept="image/*" required
                            onchange="document.getElementById('blah_2{{$val->id}}').src = window.URL.createObjectURL(this.files[0]);
                            $('.unq-logo').attr('src', window.URL.createObjectURL(this.files[0]))">
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="File Attach">Attach Your Logo</label>
                          </div>
                        </div>
                        
                      </div>
                      <img id="blah_2{{$val->id}}"  width="80" height="80" />
                      {{-- <img id="blahw{{$val->id}}"  width="80" height="80" /> --}}
                      
                      <div class="col-md-12 col-12 my-3">
                        <div class="check-box checks">
                          <input type="checkbox" class="form-check-input" /> Select and purchase the card with SK advertisenment or without
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary modal-btn" onclick="frm_submit_two({{@$val->id}})">
                    CONTINUE
                    </button>
                  </form>
                    <script>
                      function frm_submit_two(id){
                        var total_pro_2=$("#total_profile_2"+id).val();
                        var total_card_2=$("#total_order_2"+id).val();
                        console.log(total_pro_2,total_card_2);
                        if(parseInt(total_pro_2)> parseInt(total_card_2)){
                          alert("no of card can not be less then no of profile.");
                          return false;
                        }
                        else if( $("#color_2"+id).val().length<1){
                          alert("please chose a color.");
                          return false;
                        }
                        else{
                          console.log("h");
                          $("#frm_2"+id).submit();
                          //form.submit();

                        }
                      }
                    </script>
                </div>

              </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach






          






{{-- **************************** FORGET PASSWORD MODEL   ************************************** --}}
          <div
            class="modal fade"
            id="fgp"
            tabindex="-1"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
            >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Forget Password</h5>
                  <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                  >
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="{{route('fgp.enter.email')}}" >
                    @csrf
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-envelope"></i>
                        </div>
                      </div>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="inlineFormInputGroup"  placeholder="Entert Your Email">
                      @error('email')
                    {{--  <script>
                        alert("Login credential is wrong.!");
                      </script> --}}
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary modal-btn">
                    Submit
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>















{{-- **************************** Customize Card MODEL With Template ********************************* --}}
<script>
  
  function custome_name_fun(){
    var name=$("#custome_name").val();
    $(".unq-name").text(name);
    // console.log(name);
  }
  function custome_comp_fun(){
    var company=$("#custome_company").val();
    $(".unq-company").text(company);
    // console.log(company);
  }
  function custome_ph_fun(){
    var ph=$("#custome_ph").val();
$(".unq-ph").text(ph);
    // console.log(ph);
  }
  function custome_email_fun(){
    var email=$("#custome_email").val();
    $(".unq-email").text(email);
    // console.log(email);
  }
  function custome_address_fun(){
    var address=$("#custome_address").val();
    $(".unq-address").text(address);
    // console.log(address);
  }
  function custome_tag_fun(){
    var tag=$("#custome_tag").val();
    $(".unq-tag").text(tag);
    // console.log(tag);
    
  }
  function clr_chng(v){
    $(".unq-company").css("color",v);
    $(".unq-name").css("color",v);
    $(".unq-tag").css("color",v);
    $(".unq-email").css("color",v);
    $(".unq-ph").css("color",v);
    
    $(".unq-address").css("color",v);
  }
  </script>
          <div
            class="modal fade"
            id="customize"
            tabindex="-1"
            aria-labelledby="myModalLabel3"
            aria-hidden="true"
            >
            <div class="modal-dialog">
              <div class="modal-content" style="width: 90vw;
                    position: fixed;
                      top: 10px;
                      left: 50%;
                      transform: translateX(-50%);
                      max-height: 97vh;
                      overflow-y: auto;
                      overflow-x: hidden;">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel3">SUBMIT ALL INFORMATION FOR {{$val->name}}</h5>
                  <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                  >
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="row">
                  <div class="col-md-6 col-12">
                    <div id="customize_html"></div>
                    <br>
                    <div id="customize_html_back"></div>
                  </div>
                  <div class="col-md-6 col-12">


                
                <div class="modal-body form-content">
                  <form role="form" id="frm_two" method="post" action="{{route('customize.card.ins')}}" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden"  class="form-control"  name="template_id" required  value="{{@$val->id}}"> --}}
                    @php
                    $html=DB::table('html')->orderBy('id','desc')->where('status','A')->first();
                    @endphp
                    <input type="hidden"  class="form-control"  name="design_id" required  value="{{@$html->id}}">

                    <div class="row">
                      <div class="col-md-6 col-12 my-3">
                        <input type="text" class="form-control" placeholder="Your Name" required name="name" onkeyup="custome_name_fun()" id="custome_name">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="text" class="form-control" placeholder="Your Company Name" name="company" required onkeyup="custome_comp_fun()" id="custome_company">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="tel" class="form-control" placeholder="Your Phone Number" name="ph" required minlength="10" pattern="^\d{10}$" title="Please enter 10 digit number" onkeyup="custome_ph_fun()" id="custome_ph">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="email" class="form-control" placeholder="Your Email" name="email" required pattern="^([A-Za-z0-9_\-\.]+)@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$" onkeyup="custome_email_fun()" id="custome_email">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="text" class="form-control" placeholder="Your Address" name="address" required  onkeyup="custome_address_fun()" id="custome_address">
                      </div>
                      <div class="col-md-6 col-12 my-3">
                        <input type="text" class="form-control" placeholder="Your Tagline" name="tag" required   onkeyup="custome_tag_fun()" id="custome_tag">
                      </div>
                      @php
                      $mat=DB::table('material_type')->where('status','A')->get();
                      @endphp
                      <div class="col-md-6 col-12 my-3">
                        <select required name="material_id">
                          <option selected value="">Card Material Type</option>
                          @foreach($mat as $val2)
                          <option value="{{$val2->id}}">{{$val2->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      {{-- <div class="col-md-6 col-12 my-3">
                        <select  name="color" required >
                          <option selected disabled value="">Card Text Font Color</option>
                          <option value="red">Red</option>
                          <option value="black">black</option>
                          <option value="white">white</option>
                          <option value="green">green</option>
                        </select>
                      </div> --}}
                      <div class="col-md-6 col-12 my-3">
                        <div class="row">

                          <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Chose color" required id="color_custom" disabled>
                            <input type="hidden" class="form-control" name="color" required id="color_custom_hidden">
                          </div>
                          <div class="col-md-2">
                            <input type="color"  onchange="clr(this.value)" onkeyup="clr(this.value)" oninput="clr(this.value)" value="#e00606 ">
                          </div>

                        </div>
                        {{-- <input type="color" class="form-control" placeholder="Color" name="color" required id="color" disabled>
                        <input type="color" id="favcolor" name="favcolor" onchange="clr(this.value)" value="#ff0000"> --}}
                      </div>

                      
                      <script>
                        function clr(v){
                                                  //alert(v);
                                                  $("#color_custom").val(v);
                                                  $("#color_custom_hidden").val(v);
                                                  $(".unq-company").css("color",v);
                          $(".unq-name").css("color",v);
                          $(".unq-tag").css("color",v);
                          $(".unq-email").css("color",v);
                          $(".unq-ph").css("color",v);
                          $(".unq-address").css("color",v);
                        }
                      </script>

                                             {{--   <input type="submit"> --}}



                      <div class="col-md-6 col-12 my-3">
                        <select required name="ordertype" id="ot{{$val->name}}" onchange="abcde(this)">
                          <option value="">Card Order Type</option>
                          <option value="S" >Personal</option>
                          <option value="M" selected >Corporate</option>
                          
                        </select>
                      </div>
                      <script>
                        function abcde(v){
                          var value2 = v.value;
                          //var id2 = id;
                          if(value2=="S"){
                            // /alert("hh");
                          $("#noofprofile3").hide();
                          $("#total_profile").val('');
                          }else{
                          $("#noofprofile3").show();
                          }
                          //console.log(value2);
                        }
                      </script>
                      
                      <div class="col-md-6 col-12 my-3" id="noofprofile3" >
                        <input type="text" class="form-control" placeholder="No Of Profile" name="total_profile" id="total_profile" >
                      </div>

                      <div class="col-md-6 col-12 my-3"  >
                        <input type="text" class="form-control" placeholder="No Of Card" name="total_order" id="total_order" >
                      </div>
                      <div class="clearfix"></div>
                      {{--  for Logo  --}}
                      <div class="col-md-8 col-12 my-3">
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="logo" accept="image/*" required onchange="document.getElementById('blah2logo').src = window.URL.createObjectURL(this.files[0]);
                            $('.unq-logo').attr('src', window.URL.createObjectURL(this.files[0]))">
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="File Attach">Attach Your Logo</label>
                          </div>
                        </div>
                      </div>
                      <img id="blah2logo"  width="100" height="100" />
                      <div class="clearfix"></div>

                         {{-- custom temp part 1 --}}
                    {{--  <div class="col-md-8 col-12 my-3">
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="custom-file">
                             <input type="file" id="icon_2" name="image"    accept="image/*">
                                                        
                                                         
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="File Attach">Attach Your Template Back</label>

                             <input type="hidden" name="profile_picture_2" id="profile_picture_2">
                            
                          </div>
                        </div>
                      </div> --}}
                        <div class="col-md-8 col-12 my-3">
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="tmp_img" accept="image/*" required id="icon_2">
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="File Attach">Attach Your Template Front</label>

                             <input type="hidden" name="profile_picture_2" id="profile_picture_2">
                          </div>
                        </div>
                      </div>
                      
                       <div class="uplodimgfilimg_2">
                                    <em><img src="" alt="" id="custom_temp_2"></em>
                                </div>
                                            {{-- end --}}


                      {{--  for template part 2  --}}
                      <div class="col-md-8 col-12 my-3">
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="temp" accept="image/*" required id="icon">
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="File Attach">Attach Your Template Back
                            </label>
                            <input type="hidden" name="profile_picture" id="profile_picture">
                          </div>
                        </div>
                      </div>
                      
                      <div class="uplodimgfilimg">
                        <em><img id="custom_temp" src="" alt="" ></em>
                      </div>
                      {{-- end --}}


                                         

                      <div class="col-md-12 col-12 my-3">
                        <div class="check-box checks">
                          <input type="checkbox" class="form-check-input" /> Select and purchase the card with SK advertisenment or without
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary modal-btn" {{-- onclick="frm_submit_2()" --}}>
                    CONTINUE
                    </button>

<script>

$(document).ready(function(){
jQuery.validator.addMethod("validate_email", function(value, element) {
if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
return true;
} else {
return false;
}
}, "Please enter a valid email address.");

jQuery.validator.addMethod("mobileonly", function(value, element) {
            return this.optional(element) ||  /^[+]?\d+$/.test(value.toLowerCase());
        }, "Enter valid number");

$('#frm_two').validate({
rules:{
name:{
required:true,
minlength:3,
},
company:{
required:true,
minlength:3,
// maxlength:50,
},
email:{
required:true,
//validate_email:true,
},
ph:{
required:true,
minlength:10,
maxlength:10,
mobileonly:true,
},
tag:{
required:true,
minlength:3,
},
address:{
required:true,
minlength:3,
},
material_id:{
required:true,
},
ordertype:{
required:true,
},
total_order:{
required:true,
},
total_profile:{
required:true,
},
logo:{
required:true,
},
temp:{
required:true,
},
},
submitHandler: function(form){
var total_pro2=$("#total_profile").val();
var total_card2=$("#total_order").val();
console.log(total_pro2,total_card2);
if(parseInt(total_pro2)> parseInt(total_card2)){
  alert("no of card can not be less then no of profile.");
  return false;
}
else if( $("#color_custom").val().length<1){
      alert("please chose a color.");
      return false;
    }
else{
  //console.log("h");
  //$("#frm_two").submit();
  //form.submit();
  form.submit();

}
},
});
});





                        // function frm_submit_2(){
                        //  var total_pro2=$("#total_profile").val();
                        //  var total_card2=$("#total_order").val();
                        //  console.log(total_pro2,total_card2);
                        //  if(parseInt(total_pro2)> parseInt(total_card2)){
                        //    alert("no of card can not be less then no of profile.");
                        //    return false;
                        //  }
                        //  else if( $("#color_custom").val().length<1){
                        //        alert("please chose a color.");
                        //        return false;
                        //      }
                        //  else{
                        //    //console.log("h");
                        //    $("#frm_two").submit();
                        //    //form.submit();

                        //  }
                        // }
</script>
                  </form>
                </div>

              </div>

            </div>
              </div>
            </div>
          </div>














{{--************ Image Crop for temp front Preview *************--}}
          <div class="modal" tabindex="-1" role="dialog" id="croppie-modal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Crop Image</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="croppie-div" style="width: 100%;"></div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="crop-img">Save changes</button>
                  <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>




{{-- for temp back --}}
  <div class="modal" tabindex="-1" role="dialog" id="croppie-modal_2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="croppie-div_2" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="crop-img_2">Save changes</button>
                <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>









<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

{{-- 
          
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
<script
src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
crossorigin="anonymous"
></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
<script src="{{url('/')}}/public/frontend/indexpage/assets/js/index.js"></script>
<script>
  function fgp(){
    $('#loginModel').modal('hide');
    $('#fgp').modal('show');
  }

</script>
<script src="{{ URL::asset('public/frontend/croppie/croppie.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


{{-- temp front for custmize --}}
<script>
function dataURLtoFile(dataurl, filename) {
var arr = dataurl.split(','),
mime = arr[0].match(/:(.*?);/)[1],
bstr = atob(arr[1]),
n = bstr.length,
u8arr = new Uint8Array(n);
while(n--){
u8arr[n] = bstr.charCodeAt(n);
}
return new File([u8arr], filename, {type:mime});
}
var uploadCrop;
$(document).ready(function(){
$(".js-example-basic-multiple").select2();
if($('.type').val()=='C'){
$(".s_h_hids").slideDown(0);
} else{
$(".s_h_hids").slideUp(0);
}
$(".ccllk02").click(function(){
$(".s_h_hids").slideDown();
});
$(".ccllk01").click(function(){
$(".s_h_hids").slideUp();
$('.cmpy').val('');
});
$(".type-radio").change(function(){
var t= $("input[name=type]:checked").val();
if(t=="I"){
$(".comany_name").css('display','none');
}else{
$(".comany_name").css('display','block');
}
});
$('#croppie-modal').on('hidden.bs.modal', function() {
uploadCrop.croppie('destroy');
});
$('#croppie-modal .close, #croppie-modal .close_btn').on('click', function() {
$('#icon').val('');
});
$('#crop-img').click(function() {
uploadCrop.croppie('result', {
type: 'base64',
format: 'png'
}).then(function(base64Str) {
$("#croppie-modal").modal("hide");
//  $('.lds-spinner').show();
let file = dataURLtoFile('data:text/plain;'+base64Str+',aGVsbG8gd29ybGQ=','hello.png');
console.log(file.mozFullPath);
console.log(base64Str);
// $('#file').val(base64Str);
$('#profile_picture').val(base64Str);
// $.each(file, function(i, f) {
var reader = new FileReader();
reader.onload = function(e){
$('.uplodimgfilimg').append('<em><img id="custom_temp" src="' + e.target.result + '"  style="width: 100px ; height: 100px;margin-top:5px"><em>');
$(".unq-background-image-front").css("background-image","url(' "+e.target.result+"' )");
$(".unq-background-image-front").css("background-size","cover");
$(".unq-background-image-front").css("background-position-x","inherit");
};
reader.readAsDataURL(file);
//  });
$('.uplodimgfilimg').show();
});
});
});
$("#icon").change(function () {
$('.uplodimgfilimg').html('');
let files = this.files;
console.log(files);
let img  = new Image();
if (files.length > 0) {
let exts = ['image/jpeg', 'image/png', 'image/gif'];
let valid = true;
$.each(files, function(i, f) {
if (exts.indexOf(f.type) <= -1) {
valid = false;
return false;
}
});
if (! valid) {
alert('Please choose valid image files (jpeg, png, gif) only.');
$("#icon").val('');
return false;
}
// img.src = window.URL.createObjectURL(event.target.files[0])
// img.onload = function () {
//     if(this.width > 250 || this.height >160) {
//         flag=0;
//         alert('Please upload proper image size less then : 250px x 160px');
//         $("#file").val('');
//         $('.uploadImg').hide();
//         return false;
//     }
// };
$("#croppie-modal").modal("show");
uploadCrop = $('.croppie-div').croppie({
viewport: { width: 450, height: 300, type: 'square' },
boundary: { width: $(".croppie-div").width(), height: 400 }
});
var reader = new FileReader();
reader.onload = function (e) {
$('.upload-demo').addClass('ready');
// console.log(e.target.result)
uploadCrop.croppie('bind', {
url: e.target.result
}).then(function(){
console.log('jQuery bind complete');
});
}
reader.readAsDataURL(this.files[0]);
//  $('.uploadImg').append('<img width="100"  src="' + reader.readAsDataURL(this.files[0]) + '">');
//  $.each(files, function(i, f) {
//      var reader = new FileReader();
//      reader.onload = function(e){
//          $('.uploadImg').append('<img width="100"  src="' + e.target.result + '">');
//      };
//      reader.readAsDataURL(f);
//  });
//  $('.uploadImg').show();
}
});
</script>
{{--
<script type="text/javascript">
$(document).ready(function(){
@if(Session::has('error'))
$('#loginModel').modal('show');
@endif
})
</script> --}}
















{{-- temp back for customize--}}
<script>
    function dataURLtoFile(dataurl, filename) {

 var arr = dataurl.split(','),
     mime = arr[0].match(/:(.*?);/)[1],
     bstr = atob(arr[1]),
     n = bstr.length,
     u8arr = new Uint8Array(n);

 while(n--){
     u8arr[n] = bstr.charCodeAt(n);
 }

 return new File([u8arr], filename, {type:mime});
}
      var uploadCrop;
    $(document).ready(function(){
      $(".js-example-basic-multiple").select2();
        if($('.type').val()=='C'){
            $(".s_h_hids").slideDown(0);
        } else{
            $(".s_h_hids").slideUp(0);
        }
        $(".ccllk02").click(function(){
            $(".s_h_hids").slideDown();
        });
        $(".ccllk01").click(function(){
            $(".s_h_hids").slideUp();
            $('.cmpy').val('');
        });
        $(".type-radio").change(function(){
           var t= $("input[name=type]:checked").val();
           if(t=="I"){
            $(".comany_name").css('display','none');
           }else{
            $(".comany_name").css('display','block');
           }
        });



    $('#croppie-modal_2').on('hidden.bs.modal', function() {
            uploadCrop.croppie('destroy');
        });

    $('#croppie-modal_2 .close, #croppie-modal_2 .close_btn').on('click', function() {
      $('#icon_2').val('');
        });

        $('#crop-img_2').click(function() {
            uploadCrop.croppie('result', {
                type: 'base64',
                format: 'png'
            }).then(function(base64Str) {
                $("#croppie-modal_2").modal("hide");
               //  $('.lds-spinner').show();
               let file = dataURLtoFile('data:text/plain;'+base64Str+',aGVsbG8gd29ybGQ=','hello.png');
                  console.log(file.mozFullPath);
                  console.log(base64Str);
                  // $('#file').val(base64Str);
                  $('#profile_picture_2').val(base64Str);
               // $.each(file, function(i, f) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                      $('.uplodimgfilimg_2').append('<em><img id="custom_temp_2" src="' + e.target.result + '"  style="width: 100px ; height: 100px;margin-top:5px"><em>');
            $(".unq-background-image-back").css("background-image","url(' "+e.target.result+"' )");
            $(".unq-background-image-back").css("background-size","cover");
            $(".unq-background-image-back").css("background-position-x","inherit");
                    };
                    reader.readAsDataURL(file);

               //  });
                $('.uplodimgfilimg_2').show();

            });
        });
    });
    $("#icon_2").change(function () {
            $('.uplodimgfilimg_2').html('');
            let files = this.files;
            console.log(files);
            let img  = new Image();
            if (files.length > 0) {
                let exts = ['image/jpeg', 'image/png', 'image/gif'];
                let valid = true;
                $.each(files, function(i, f) {
                    if (exts.indexOf(f.type) <= -1) {
                        valid = false;
                        return false;
                    }
                });
                if (! valid) {
                    alert('Please choose valid image files (jpeg, png, gif) only.');
                    $("#icon_2").val('');
                    return false;
                }
                // img.src = window.URL.createObjectURL(event.target.files[0])
                // img.onload = function () {
                //     if(this.width > 250 || this.height >160) {
                //         flag=0;
                //         alert('Please upload proper image size less then : 250px x 160px');
                //         $("#file").val('');
                //         $('.uploadImg').hide();
                //         return false;
                //     }
                // };
                $("#croppie-modal_2").modal("show");
                uploadCrop = $('.croppie-div_2').croppie({
                    viewport: { width: 450, height: 300, type: 'square' },
                    boundary: { width: $(".croppie-div_2").width(), height: 400 }
                });
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.upload-demo').addClass('ready');
                    // console.log(e.target.result)
                    uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
               //  $('.uploadImg').append('<img width="100"  src="' + reader.readAsDataURL(this.files[0]) + '">');
               //  $.each(files, function(i, f) {
               //      var reader = new FileReader();
               //      reader.onload = function(e){
               //          $('.uploadImg').append('<img width="100"  src="' + e.target.result + '">');
               //      };
               //      reader.readAsDataURL(f);
               //  });
               //  $('.uploadImg').show();
            }

        });
</script>  















{{-- FOR FIRST 4 TEMPLATE  --}}
<script>
  function openModel(id,image){
    //console.log(id,image);
    // $("#myModal"+id).modal('show');
  
  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': "{{csrf_token()}}"
}
});
var fd= new FormData;
fd.append('temp_id',id);

$.ajax({
url:'{{route('card.image')}}',
type:'POST',
data: fd,
contentType: false,
processData: false,

success:function(res){
//console.log(res.htmls);
//alert("j");

// $("#html"+id).show();
$("#html"+id).html(``+res.htmls+``);
$("#html_back"+id).html(``+res.html_back+``);
$("#myModal"+id).modal('show');
$(".unq-background-image-front").css("background-image","url(' "+res.front_img+"' )");
$(".unq-background-image-front").css("background-size","cover");

$(".unq-background-image-back").css("background-image","url(' "+res.back_img+"' )");
$(".unq-background-image-back").css("background-size","cover");
}
});
  }
</script>








{{-- FOR VIEL ALL TEMPLATE  --}}
<script>
function openModeltwo(id,image){
      //alert(id);
      //console.log(id,image);
      // $("#myModal"+id).modal('show');
    
    $.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': "{{csrf_token()}}"
  }
  });
  var fd= new FormData;
  fd.append('temp_id',id);
  
  $.ajax({
  url:'{{route('card.image')}}',
  type:'POST',
  data: fd,
  contentType: false,
  processData: false,
  
  success:function(res){
  //-------------console.log(res.data);

// $("#html"+id).show();
$("#html2"+id).html(``+res.htmls+``);
$("#html2_back"+id).html(``+res.html_back+``);
  $("#child"+id).modal('show');
$(".unq-background-image-front").css("background-image","url(' "+res.front_img+"' )");
$(".unq-background-image-front").css("background-size","cover");

$(".unq-background-image-back").css("background-image","url(' "+res.back_img+"' )");
$(".unq-background-image-back").css("background-size","cover");
  }
  });
    }
</script>







{{-- Customize model --}}
<script>
  function customizeModel(){
    $("#custom_temp").attr("src","");
    @php
      $html=DB::table('html')->orderBy('id','desc')->where('status','A')->first();
        @endphp
        $("#customize_html").html(`{!!$html->html!!}`);
         $("#customize_html_back").html(`{!!$html->html_back!!}`);
        
        $("#customize").modal('show');
  }
</script>

</body>
</html>