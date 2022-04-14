<?php

namespace App\Http\Controllers\Frontend\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_to_temp;
use Image;
use App\Models\Material_type;
use App\Models\TemplateModel;
use App\Models\BanerModel;
use App\Models\IndustryLogoModel;
use App\Models\CardCategory;
use App\Models\CardContent;
use App\Models\User;
use Auth;
use App\Models\ContentTwo;
use App\Models\BannerText;
use App\Models\HtmlModel;
use App\Models\Add_user_card;
use App\Models\CardPriceModel;




class FormController extends Controller
{
    public function form_view(){
    	return view('frontend.pages.form.form');
    }


    public function form_ins(Request $request){
    	//dd($request->all());
    	  $request->validate([
	       'template_id' => 'required',
            'design_id' => 'required',
	       'name'=> 'required',
	       'email'=>'required', 
	       'ph' => 'required',
	       'company'=> 'required',
	       'address'=>'required', 
	       'tag' => 'required',
	       'material_id'=> 'required',
	       //'color'=>'required', 
	        'ordertype' => 'required',
	       'profile_picture_logo_pd'=> 'required',
	       'total_order'=>'required',
	     ]);



    	  //for logo
    	  // if ($request->hasFile('logo')){

       //      $image = $request->logo;
       //      $height = Image::make($image)->height();          
       //      $width = Image::make($image)->width();

       //      if( ((int)$width)<10 ){               
       //        return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height )->withInput();
       //      }

       //      if( ((int)$width)>150 ){               
       //        return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
       //      }

       //      if( ((int)$height)<10 ){              
       //         return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
       //      }

       //       if(  ((int)$height)>150 ){
       //         return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
       //      }



	     	// // @$srch_img=$check->image;
	      // //   @unlink('public/category_icon_small/'.$srch_img);
	      // //    @unlink('public/category_icon/'.$srch_img);

       //       if($request->ordertype=="S"){
       //             $image = $request->file('logo'); 
       //              $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                 
       //              $destinationPath = public_path('/logo'); //logo
       //              $img = Image::make($image->getRealPath());
       //              $img->resize(100, 100, function ($constraint) {
       //                  $constraint->aspectRatio();
       //              })->save($destinationPath.'/'.$input['imagename']);

       //              $destinationPath2 = public_path('/logo_for_user'); //logo_for_user
       //              $img2 = Image::make($image->getRealPath());
       //              $img2->resize(100, 100, function ($constraint) {
       //                  $constraint->aspectRatio();
       //              })->save($destinationPath2.'/'.$input['imagename']);

       //          }else{
       //             $image = $request->file('logo');
       //              $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                 
       //              $destinationPath = public_path('/logo');
       //              $img = Image::make($image->getRealPath());
       //              $img->resize(100, 100, function ($constraint) {
       //                  $constraint->aspectRatio();
       //              })->save($destinationPath.'/'.$input['imagename']);

       //          }

	      //   }

         if ($request->profile_picture_logo_pd) {
           if($request->ordertype=="S"){
            $destinationPath = "public/logo/";    //main logo folder
            $img1 = str_replace('data:image/png;base64,', '', @$request->profile_picture_logo_pd);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img_logo = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img_logo;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
           // $bracelet->design_picture = $img;

            $destinationPath2 = "public/logo_for_user/";   //for 1st user
            $img2 = str_replace('data:image/png;base64,', '', @$request->profile_picture_logo_pd);
            $img2 = str_replace(' ', '+', $img2);
            $image_base64_2 = base64_decode($img2);
           // $img_logo = time() . '-' . rand(1000, 9999) . '.png';
            $file2 = $destinationPath2 . $img_logo;
            file_put_contents($file2, $image_base64_2);
            chmod($file2, 0755);
           // $bracelet->design_picture = $img;

           }else{
            $destinationPath = "public/logo/";
            $img1 = str_replace('data:image/png;base64,', '', @$request->profile_picture_logo_pd);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img_logo = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img_logo;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
           // $bracelet->design_picture = $img;

           }
            
        }

	        //get material detais//
	        $srch_mat=Material_type::where('id',$request->material_id)->first();
	        $mat_amt=$srch_mat->price;


	        //get template detais//
	        $srch_temp=TemplateModel::where('id',$request->template_id)->first();
	        $temp_amt=$srch_temp->price;

           //fetching Card Price according Card No
          @$PriceDetails=CardPriceModel::where('card_no_from','<=',$request->total_order)->where('card_no_to','>=',$request->total_order)->first();
          if(!$PriceDetails){
             //$PriceDetails->price=1;
            return back()->with('error',"You can't order this no of cards as this range not added by admin. kindly contact admin.");
          }

            if($request->ordertype=="S"){
             $amount= ( (int)$mat_amt*(int)$request->total_order)+(int)$PriceDetails->price*(int)$request->total_order;    /*+(int)$temp_amt;*/
             $total_profile="0";
             }
             else{
                  //$amount= (int)$mat_amt*(int)$request->total_order+(int)$temp_amt; 
                  $amount= ( (int)$mat_amt*(int)$request->total_order)+(int)$PriceDetails->price*(int)$request->total_order;
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
    	  $ins->template_id=$request->template_id;
          $ins->html_id=$request->design_id;
    	  $ins->name=$request->name;
    	  $ins->email=$request->email;
    	  $ins->ph=$request->ph;
    	  $ins->company=$request->company;
    	  $ins->address=$request->address;
    	  $ins->tag=$request->tag;
    	  $ins->material_id=$request->material_id;
    	  $ins->amount=$final_amount;
    	  //$ins->font_color=$request->color;
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


 

       //NOW ALL THE DATA WILL GO TO A NEW PAGE THAT CONTAIN ALL DESIGN.. AND THEN IT WILL UPLOADED TO SERVER


        // $data['user_id']=\Auth::user()->id;
        // $data['template_id']=$request->template_id;
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
        // dd($data);


        //NOW INSERT ONE CARD AS ADDED_TO_USER TABLE
    if($request->ordertype=="S"){
      $ins_card=new Add_user_card;
      $ins_card->name=$request->name;
      $ins_card->email=$request->email;
      $ins_card->ph=$request->ph;
      $ins_card->company=$request->company;
      $ins_card->address=$request->address;
      $ins_card->tag=$request->tag;
      $ins_card->user_id=Auth::user()->id;
      $ins_card->template_id=$request->template_id;
      $ins_card->user_to_temp_id=$user_temp_unique_id;
      $ins_card->html_id=$request->design_id;
      $ins_card->logo=$img_logo;
      $ins_card->status='A';
      $ins_card->save();
    }

    	return back()->with('success','You have successfully buy your card.');
         //return view('frontend.pages.design.design')->with($data);
    }




    public function welcome(){
      $data['banner']=BanerModel::first();
      $data['banner_text']=BannerText::orderBy('id','desc')->get();
      
      $data['content_one']=CardContent::first();
      $data['card_cat']=CardCategory::orderBy('id')->get();
      $data['Content_two_part_one']=ContentTwo::where('id','1')->first();
      $data['Content_two_part_two']=ContentTwo::where('id','2')->first();
      $data['industry_logo']=IndustryLogoModel::orderBy('id','asc')->where('status','A')->get();
    // $data['last_4_temp']=TemplateModel::orderBy('id','desc')->where('status','A')->where('added_by','A')->skip(0)->take(4)->get();
      $desing_to_temp_ids_only_4=HtmlModel::orderBy('id','desc')->skip(0)->take(4)->pluck('temp_id')->toArray();
        // dd($desing_to_temp_ids);
      $data['last_4_temp']=TemplateModel::whereIn('id',$desing_to_temp_ids_only_4)->get();
      $desing_to_temp_ids_all=HtmlModel::orderBy('id','desc')->pluck('temp_id')->toArray();
      $data['all_temp']=TemplateModel::whereIn('id',$desing_to_temp_ids_all)->get();
        //dd($data['last_4_temp']);
      return view('welcome')->with($data);
    }
}
