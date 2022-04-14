<?php

namespace App\Http\Controllers\Frontend\Card;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_to_temp;
use Auth;
use App\Models\Add_user_card;
use Image;
use App\Models\TemplateModel;
use App\Models\Material_type;
use Mail;
use App\Mail\PrintReqToAdmin;
use App\Models\Admin;
use App\Models\User;
use DB;
use App\Models\CardPriceModel;

class CardController extends Controller
{
    public function request_card_list(){
    	$data['datas']=User_to_temp::where('user_id',Auth::user()->id)->where('order_type','S')->get();
    	return view('frontend.pages.card.card_list')->with($data);
    }



    public function add_user_view($id){
    	$data['user_to_temp_id']=User_to_temp::where('id',$id)->first();
    	return view('frontend.pages.card.add_user_card')->with($data);
    }



    public function insert_user_card(Request $request){
    	//dd($request->all());

    	//check if total no of card added or not.
    	$chk=User_to_temp::where('id',$request->user_to_temp_id)->first();

    	//total added card
    	$total=Add_user_card::where('user_id',Auth::user()->id)->where('user_to_temp_id',$request->user_to_temp_id)->where('status','A')->count();

    	if((int)$chk->total_order <= $total){
    		return back()->with('error','max no of card added');
    	}

    	$request->validate([
	       'name'=> 'required',
	       'email'=>'required', 
	       'ph' => 'required',
	       'company'=> 'required',
	       'address'=>'required', 
	       'tag' => 'required',
	    ]);
	    $input['imagename']="";
      $img_logo="";

	     // if ($request->hasFile('logo')){
      //       $image = $request->logo;
      //       $height = Image::make($image)->height();          
      //       $width = Image::make($image)->width();

      //       if( ((int)$width)<10 ){               
      //         return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height )->withInput();
      //       }

      //       if( ((int)$width)>150 ){               
      //         return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
      //       }

      //       if( ((int)$height)<10 ){              
      //          return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
      //       }

      //        if(  ((int)$height)>150 ){
      //          return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
      //       }
	     // 	// @$srch_img=$check->image;
	     //    //  @unlink('public/category_icon_small/'.$srch_img);
	     //    //  @unlink('public/category_icon/'.$srch_img);

		    // $image = $request->file('logo');
	     //    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
	     
	     //    $destinationPath = public_path('/logo_for_user');
	     //    $img = Image::make($image->getRealPath());
	     //    $img->resize(100, 100, function ($constraint) {
	     //        $constraint->aspectRatio();
	     //    })->save($destinationPath.'/'.$input['imagename']);
	   
	     //    }

      if($request->profile_picture){
            $destinationPath = "public/logo_for_user/";
            $img1 = str_replace('data:image/png;base64,', '', @$request->profile_picture);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img_logo = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img_logo;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
           // $bracelet->design_picture = $img;

           }

	    $ins_card=new Add_user_card;
	    $ins_card->name=$request->name;
	    $ins_card->email=$request->email;
	    $ins_card->ph=$request->ph;
	    $ins_card->company=$request->company;
	    $ins_card->address=$request->address;
	    $ins_card->tag=$request->tag;
	    $ins_card->user_id=Auth::user()->id;
	    $ins_card->template_id=$request->temp_id;
	    $ins_card->user_to_temp_id=$request->user_to_temp_id;
      $ins_card->html_id=$request->design_id;
        $ins_card->logo=/*$input['imagename']*/ $img_logo;
        $ins_card->status='A';
        //design_id

	    $ins_card->save();

	    return back()->with('success','User added');

    }




    public function details_view($id){
    	//dd($id);
    	$data['details']=User_to_temp::where('id',$id)->first();
    	$data['all_added_users']=Add_user_card::where('user_to_temp_id',$id)->where('user_id',Auth::user()->id)->where('status','A')->orderby('id')->where('print_status','NP')->paginate();
    	return view('frontend.pages.card.details')->with($data);
    }








    public function user_delete($id){
       $u=Add_user_card::where('id',$id)->where('user_id',Auth::user()->id)->update(['status'=>'D']);
       return back()->with('success','deleted');
    }







    public function edit_user_view($id){
    	$data['datas']=Add_user_card::where('id',$id)->first();
        $data['master']=User_to_temp::where('id',$data['datas']->user_to_temp_id)->first();
    	return view('frontend.pages.card.edit_user')->with($data);
    }






    public function upd_user(Request $request){
    	$request->validate([
	       'name'=> 'required',
	       'email'=>'required', 
	       'ph' => 'required',
	       'company'=> 'required',
	       'address'=>'required', 
	       'tag' => 'required',
	    ]);
	    $input['imagename']="";
      $img_logo="";

	     // if ($request->hasFile('logo')){
      //       $image = $request->logo;
      //       $height = Image::make($image)->height();          
      //       $width = Image::make($image)->width();

      //       if( ((int)$width)<10 ){               
      //         return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height )->withInput();
      //       }

      //       if( ((int)$width)>150 ){               
      //         return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
      //       }

      //       if( ((int)$height)<10 ){              
      //          return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
      //       }

      //        if(  ((int)$height)>150 ){
      //          return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
      //       }
      //       $check=Add_user_card::where('id',$request->id)->where('user_id',Auth::user()->id)->first();
	     // 	@$srch_img=$check->logo;
	     //     @unlink('public/logo_for_user/'.$srch_img);
	     //     //@unlink('public/category_icon/'.$srch_img);

		    // $image = $request->file('logo');
	     //    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
	     
	     //    $destinationPath = public_path('/logo_for_user');
	     //    $img = Image::make($image->getRealPath());
	     //    $img->resize(100, 100, function ($constraint) {
	     //        $constraint->aspectRatio();
	     //    })->save($destinationPath.'/'.$input['imagename']);

	     //    $upd['logo']= $input['imagename'];
	   
	     //    }


           if($request->profile_picture){
            $destinationPath = "public/logo_for_user/";
            $img1 = str_replace('data:image/png;base64,', '', @$request->profile_picture);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img_logo = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img_logo;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
             $upd['logo']= $img_logo;
           // $bracelet->design_picture = $img;
            $check=Add_user_card::where('id',$request->id)->where('user_id',Auth::user()->id)->first();
           @$srch_img=$check->logo;
           @unlink('public/logo_for_user/'.$srch_img);

           }

	        $upd['name']=$request->name;
	        $upd['email']=$request->email;
	        $upd['ph']=$request->ph;
	        $upd['company']=$request->company;
	        $upd['address']=$request->address;
	        $upd['tag']=$request->tag;

	        $u=Add_user_card::where('id',$request->id)->where('user_id',Auth::user()->id)->update($upd);

	        return back()->with('success','updated');

    }





    public function printed_list($id){
       // dd($id);
      $data['printed']=Add_user_card::where('user_to_temp_id',$id)->where('user_id',Auth::user()->id)->where('print_status','P')->paginate();
      $data['id']=$id;
      //dd($data['printed']);
       return view('frontend.pages.card.printed_card')->with($data);
    }




    public function request_for_print($id){
     $print_card_request=Add_user_card::where('user_to_temp_id',$id)->where('status','A')->where('user_id',Auth::user()->id)->where('print_status','NP')->get();

       foreach($print_card_request as $val){
        $up=Add_user_card::where('id',$val->id)->update(['print_status'=>'P','admin_status'=>'I']);
       }
       

        //MAIL TO ADMIN'
       // $user_details=Add_user_card::where('id',$id)->first();
       // $user_name=User::where('id',$user_details->user_id)->first();
       //  $data = [
       //            'email'=>'jeetbasak54@gmail.com',
       //            'name'=>$user_name->name,
       //            'total_card'=>count($print_card_request),
       //            //'id'=>$srch->id,
       //        ];
       //  Mail::send(new PrintReqToAdmin($data));

       return back()->with('success','Print request sent to admin.');
    }




    public function view_single_details($id){
      $data['details']=Add_user_card::where('id',$id)->first();
      return view('frontend.pages.card.view_single_card')->with($data);
    }












    public function customize_card_ins(Request $request){
    // dd($request->all());
        $request->validate([
        
         'name'=> 'required',
         'email'=>'required', 
         'ph' => 'required',
         'company'=> 'required',
         'address'=>'required', 
         'tag' => 'required',
         'material_id'=> 'required',
         'color'=>'required', 
          'ordertype' => 'required',
         //'logo'=> 'required',
         'temp'=>'required',
         'profile_picture'=>'required',
       ]);
       // dd("j",$request->all());


           //for logo
        // if ($request->hasFile('logo')){
        //     $image = $request->logo;
        //     $height = Image::make($image)->height();          
        //     $width = Image::make($image)->width();

        //     if( ((int)$width)<10 ){               
        //       return back()->with('error',"Logo dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height )->withInput();
        //     }

        //     if( ((int)$width)>150 ){               
        //       return back()->with('error',"Logo dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
        //     }

        //     if( ((int)$height)<10 ){              
        //        return back()->with('error',"Logo dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
        //     }

        //      if(  ((int)$height)>150 ){
        //        return back()->with('error',"Logo dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
        //     }
               



        //       if($request->ordertype=="S"){
        //            $image = $request->file('logo'); 
        //             $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                 
        //             $destinationPath = public_path('/logo'); //logo_for_user
        //             $img = Image::make($image->getRealPath());
        //             $img->resize(100, 100, function ($constraint) {
        //                 $constraint->aspectRatio();
        //             })->save($destinationPath.'/'.$input['imagename']);

        //             $destinationPath2 = public_path('/logo_for_user'); //logo_for_user
        //             $img2 = Image::make($image->getRealPath());
        //             $img2->resize(100, 100, function ($constraint) {
        //                 $constraint->aspectRatio();
        //             })->save($destinationPath2.'/'.$input['imagename']);

        //         }else{
        //            $image = $request->file('logo');
        //             $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                 
        //             $destinationPath = public_path('/logo');
        //             $img = Image::make($image->getRealPath());
        //             $img->resize(100, 100, function ($constraint) {
        //                 $constraint->aspectRatio();
        //             })->save($destinationPath.'/'.$input['imagename']);

        //         }

         
     
        //   }




        if ($request->profile_picture_logo) {
           if($request->ordertype=="S"){
            $destinationPath = "public/logo/";    //main logo folder
            $img1 = str_replace('data:image/png;base64,', '', @$request->profile_picture_logo);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img_logo = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img_logo;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
           // $bracelet->design_picture = $img;

            $destinationPath2 = "public/logo_for_user/";   //for 1st user
            $img2 = str_replace('data:image/png;base64,', '', @$request->profile_picture_logo);
            $img2 = str_replace(' ', '+', $img2);
            $image_base64_2 = base64_decode($img2);
           // $img_logo = time() . '-' . rand(1000, 9999) . '.png';
            $file2 = $destinationPath2 . $img_logo;
            file_put_contents($file2, $image_base64_2);
            chmod($file2, 0755);
           // $bracelet->design_picture = $img;

           }else{
            $destinationPath = "public/logo/";
            $img1 = str_replace('data:image/png;base64,', '', @$request->profile_picture_logo);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img_logo = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img_logo;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
           // $bracelet->design_picture = $img;

           }
            
        }

          if ($request->profile_picture) {
            $destinationPath = "storage/app/public/template_front/";
            $img1 = str_replace('data:image/png;base64,', '', @$request->profile_picture);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
           // $bracelet->design_picture = $img;
        }

         if ($request->profile_picture_2) {
            $destinationPath2 = "storage/app/public/template_back/";
            $img12 = str_replace('data:image/png;base64,', '', @$request->profile_picture_2);
            $img12 = str_replace(' ', '+', $img12);
            $image_base64_2 = base64_decode($img12);
            $img2 = time() . '-' . rand(1000, 9999) . '.png';
            $file_2 = $destinationPath2 . $img2;
            file_put_contents($file_2, $image_base64_2);
            chmod($file_2, 0755);
           // $bracelet->design_picture = $img;
        }
        $ins_temp=new TemplateModel;
        $ins_temp->name="User added";
        $ins_temp->image=$img;
        $ins_temp->back_image=$img2;
        $ins_temp->dummy_name="";
        $ins_temp->dummy_email="";
        $ins_temp->dummy_ph="";
        $ins_temp->dummy_company="";
        $ins_temp->dummy_tag="";
        $ins_temp->dummy_address="";
        $ins_temp->price=1;
        $ins_temp->added_by='U';
        $ins_temp->user_id=\Auth::user()->id;
        $ins_temp->save();

        $temp_id= $ins_temp->id;
      //  dd($temp_id);


       

           //get material detais//
          $srch_mat=Material_type::where('id',$request->material_id)->first();
          $mat_amt=$srch_mat->price;


          //get template detais//
          $srch_temp=TemplateModel::where('id',$temp_id)->first();
          $temp_amt=$srch_temp->price;

           //fetching Card Price according Card No
          @$PriceDetails=CardPriceModel::where('card_no_from','<=',$request->total_order)->where('card_no_to','>=',$request->total_order)->first();
          if(!$PriceDetails){
            //$PriceDetails->price=1;
            return back()->with('error',"You can't order this no of cards as this range not added by admin. kindly contact admin.");
          }

            if($request->ordertype=="S"){
             $amount= ( (int)$mat_amt*(int)$request->total_order)+( (int)$PriceDetails->price*(int)$request->total_order);    /*+(int)$temp_amt;*/
             $total_profile="0";
             }
             else{
                  //$amount= (int)$mat_amt*(int)$request->total_order+(int)$temp_amt; 
                  $amount= ( (int)$mat_amt*(int)$request->total_order)+( (int)$PriceDetails->price*(int)$request->total_order);
                  $total_profile=$request->total_profile;
             }

             if($request->brand=="NB"){
               $final_amount=$amount+($amount*20/100);
             }else{
                 $final_amount=$amount;
             }

            // dd("kjgjkg","jhkh",$final_amount);

         
        // dd($amount,$mat_amt,$request->total_order,$temp_amt,'k');

        $ins=new User_to_temp();
        $ins->user_id=\Auth::user()->id;
        $ins->template_id=$temp_id;
        $ins->html_id=$request->design_id;
        $ins->name=$request->name;
        $ins->email=$request->email;
        $ins->ph=$request->ph;
        $ins->company=$request->company;
        $ins->address=$request->address;
        $ins->tag=$request->tag;
        $ins->material_id=$request->material_id;
        $ins->amount=$final_amount;
        $ins->font_color=$request->color;
        $ins->order_type=$request->ordertype;
        $ins->logo=/*$input['imagename']*/$img_logo;
        
        $ins->total_profile=$total_profile;
        $ins->total_order=$request->total_order;
         $ins->with_brand=$request->brand;

        //insert text sizes
        $ins->name_size=$request->name_text;
        $ins->email_size=$request->email_text;
        $ins->company_size=$request->comp_text;
        $ins->ph_size=$request->ph_text;
        $ins->address_size=$request->address_text;
        $ins->tag_size=$request->tag_text;
       

        $ins->save();
        $user_temp_unique_id=$ins->id;


        // $data['user_id']=\Auth::user()->id;
        // $data['template_id']=$temp_id;
        // $data['name']=$request->name;
        // $data['email']=$request->email;
        // $data['ph']=$request->ph;
        // $data['company']=$request->company;
        // $data['address']=$request->address;
        // $data['tag']=$request->tag;
        // $data['material_id']=$request->material_id;
        // $data['amount']=$amount;
        // $data['font_color']=$request->color;
        // $data['order_type']=$request->ordertype;
        // $data['logo']=$input['imagename'];
        //  if($request->ordertype=="S"){
        //     $data['total_order']=1;
        //  }else{
        //   $data['total_order']=$request->total_order;
        //  }

        //  $data['htmls']=HtmlModel::where('status','A')->orderBy('id','desc')->get();
    if($request->ordertype=="S"){
      $ins_card=new Add_user_card;
      $ins_card->name=$request->name;
      $ins_card->email=$request->email;
      $ins_card->ph=$request->ph;
      $ins_card->company=$request->company;
      $ins_card->address=$request->address;
      $ins_card->tag=$request->tag;
      $ins_card->user_id=Auth::user()->id;
      $ins_card->template_id=$temp_id;
      $ins_card->user_to_temp_id=$user_temp_unique_id;
      $ins_card->html_id=$request->design_id;
      $ins_card->logo=/*$input['imagename']*/$img_logo;
      $ins_card->status='A';
      $ins_card->save();
    }

          return back()->with('success2',' Card request insert');
         //return view('frontend.pages.design.design')->with($data);
    }








    public function buy_card(Request $request){
    // dd($request->all());

          $ins=new User_to_temp();
        $ins->user_id=\Auth::user()->id;
        $ins->template_id=$request->template_id;
        $ins->name=$request->name;
        $ins->email=$request->email;
        $ins->ph=$request->ph;
        $ins->company=$request->company;
        $ins->address=$request->address;
        $ins->tag=$request->tag;
        $ins->material_id=$request->material_id;
        $ins->amount=$request->amount;
        $ins->font_color=$request->font_color;
        $ins->order_type=$request->ordertype;
        $ins->logo=$request->logo;
         $ins->html_id=$request->design_id;
          if($request->ordertype=="S"){
             $ins->total_order=1;
         }else{
             $ins->total_order=$request->total_order;
         }
       

        $ins->save();
      return redirect()->route('welcome')->with('success2',' Card request insert');
    }

    public function preview_card(Request $request){
      $data=$request->all();
      //return response()->json(['datas'=>$data]);
      return view('frontend.pages.design.preview')->with($data);
    }



    public function card_image(Request $request){
      $tmp=TemplateModel::where('id',$request->temp_id)->first();
      $html=DB::table('html')->where('temp_id',$request->temp_id)->first();

      $front_img= url('/').'/storage/app/public/template_front/'.$tmp->image;
       $back_img= url('/').'/storage/app/public/template_back/'.$tmp->back_image;
      return response()->json(["front_img"=>$front_img,"back_img"=>$back_img,"htmls"=>$html->html,"html_back"=>$html->html_back]);
    }






}
