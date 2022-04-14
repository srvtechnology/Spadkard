<?php

namespace App\Http\Controllers\Frontend\Corporate;

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
use App\Models\ProfileModel;
use App\Models\CorporateAddedUser;
use App\Models\Add_user_card;


class CorporateController extends Controller
{
    public function master_list(){
    	$data['corporates']=User_to_temp::where('user_id',Auth::user()->id)->where('order_type','M')->orderBy('id','desc')->get();
    	return view('frontend.pages.corporate.master_list')->with($data);
    }



    public function add_profile($id){
    	$data['profiles']=ProfileModel::where('user_id',Auth::user()->id)->where('user_to_temp_id',$id)->orderBy('id','desc')->get();
    	$data['user_to_temp_id']=$id;
    	return view('frontend.pages.corporate.add_profile')->with($data);
    }








    public function ins_profile(Request $request){
    	$request->validate([
         'name'=> 'required',
       ]);


       // chk wether all profile added or not
    	$my_total_profiles=User_to_temp::where('user_id',Auth::user()->id)->where('order_type','M')->where('id',$request->user_to_temp_id)->first();

    	$added_profiles=ProfileModel::where('user_id',Auth::user()->id)->where('user_to_temp_id',$request->user_to_temp_id)->count();
    	//dd($my_total_profiles->total_profile,$added_profiles);

    	if((int)$my_total_profiles->total_profile<=$added_profiles){
             return back()->with('error','Maximum no of profile already added.');
    	}


        // chk same name present or not
    	$chk=ProfileModel::where('user_id',Auth::user()->id)->where('user_to_temp_id',$request->user_to_temp_id)->where('profile_name',$request->name)->count();
    	if($chk>0){
    		return back()->with('error','This name already presesnt');
    	}

    	$ins_pro=new ProfileModel;
    	$ins_pro->profile_name=$request->name;
    	$ins_pro->user_to_temp_id=$request->user_to_temp_id;
    	$ins_pro->user_id=Auth::user()->id;
    	$ins_pro->save();
    	return back()->with('success','Profile name added');

    }





    public function profile_list($id){
    	$data['all_corp_users']=CorporateAddedUser::where('user_to_temp_id',$id)->where('user_id',Auth::user()->id)->where('print_status','NP')->get();
    	$data['id']=$id; //this is is user_to_temp unique id
    	return view('frontend.pages.corporate.card_list')->with($data);
    }



    public function card_add_page($id){
    	//dd($id);
    	$data['user_to_temp']=User_to_temp::where('id',$id)->first();
    	$data['profiles']=ProfileModel::where('user_to_temp_id',$id)->where('user_id',Auth::user()->id)->get();

      //remaining cards
      $purchased_cards=(int)$data['user_to_temp']->total_order;
      $already_filled_cards=CorporateAddedUser::where('user_to_temp_id',$id)->where('user_id',Auth::user()->id)->count();
      $remaining_cards=(int)$purchased_cards-(int)$already_filled_cards;
      //dd($purchased_cards,$already_filled_cards,$remaining_cards);
      $data['remaining_cards']=$remaining_cards;


    	return view('frontend.pages.corporate.add_card')->with($data);
    }








    public function ins_corporate_card(Request $request){
    //	dd($request->all());
    	//check if total no of card added or not.
    	$chk=User_to_temp::where('id',$request->user_to_temp_id)->first();

    	//total added card
    	$total=CorporateAddedUser::where('user_id',Auth::user()->id)->where('user_to_temp_id',$request->user_to_temp_id)->where('status','A')->count();
    	//dd($chk->total_order,$total);

    	if((int)$chk->total_order <= $total){
    		return back()->with('error','max no of card added for this order');
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

        for($i=1;$i<(int)$request->no_of_cards+1; $i++){

		    $ins_card=new CorporateAddedUser;
		    $ins_card->name=$request->name;
		    $ins_card->email=$request->email;
		    $ins_card->ph=$request->ph;
		    $ins_card->company=$request->company;
		    $ins_card->address=$request->address;
		    $ins_card->tag=$request->tag;
		    $ins_card->user_id=Auth::user()->id;
		    $ins_card->template_id=$request->template_id;
		    $ins_card->user_to_temp_id=$request->user_to_temp_id;
	        $ins_card->html_id=$request->html_id;
	        $ins_card->profile_id=$request->profile_id;
	        $ins_card->logo=/*$input['imagename']*/$img_logo;
	        $ins_card->status='A';

	        $ins_card->save();
      }

	       return back()->with('success','Corporate user added');
    }



    public function del($id){

        CorporateAddedUser::where('id',$id)->where('user_id',Auth::user()->id)->delete();
        return back()->with('success','User Deleted');	
    }


     public function corp_card_edit($id){
    	$data['datas']=CorporateAddedUser::where('id',$id)->first();
        $data['master']=User_to_temp::where('id',$data['datas']->user_to_temp_id)->first();
        $data['profiles']=ProfileModel::where('user_to_temp_id',$data['datas']->user_to_temp_id)->where('user_id',Auth::user()->id)->get();
    	
    	return view('frontend.pages.corporate.edit_corp_user')->with($data);
    }







    public function corp_card_update(Request $request){
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
      //  //  $check=CorporateAddedUser::where('id',$request->id)->where('user_id',Auth::user()->id)->first();
	     // 	// @$srch_img=$check->logo;
	     //  // @unlink('public/logo_for_user/'.$srch_img);
	       

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
           //  $check=Add_user_card::where('id',$request->id)->where('user_id',Auth::user()->id)->first();
           // @$srch_img=$check->logo;
           // @unlink('public/logo_for_user/'.$srch_img);

           $upd['logo']= $img_logo;

           }

	        $upd['name']=$request->name;
	        $upd['email']=$request->email;
	        $upd['ph']=$request->ph;
	        $upd['company']=$request->company;
	        $upd['address']=$request->address;
	        $upd['tag']=$request->tag;
	        $upd['profile_id']=$request->profile_id;

	        $u=CorporateAddedUser::where('id',$request->id)->where('user_id',Auth::user()->id)->update($upd);

	        return back()->with('success','updated');
    }




    public function corp_card_view($id){
    	 $data['details']=CorporateAddedUser::where('id',$id)->first();
      return view('frontend.pages.corporate.single_corp_card_view')->with($data);

    }





    public function corp_card_print($id){
    	//dd($id);
    	$print_card_request=CorporateAddedUser::where('user_to_temp_id',$id)->where('status','A')->where('user_id',Auth::user()->id)->where('print_status','NP')->get();

       foreach($print_card_request as $val){
        $up=CorporateAddedUser::where('id',$val->id)->update(['print_status'=>'P','admin_status'=>'I']);
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

       return back()->with('success','Corporate Card Print request sent to admin.');
    }




    public function corp_print_history($id){
    	 $data['printed']=CorporateAddedUser::where('user_to_temp_id',$id)->where('user_id',Auth::user()->id)->where('print_status','P')->get();
       $data['id']=$id;
     
       return view('frontend.pages.corporate.printed_card_history')->with($data);
    }




    public function profile_details_list($id){
      $data['profiles']=ProfileModel::where('user_id',Auth::user()->id)->where('user_to_temp_id',$id)->get();
       return view('frontend.pages.corporate.profile_list')->with($data);
    }



    public function profile_edit_page($id){
     // dd($id);
      $data['profiles']=ProfileModel::where('user_id',Auth::user()->id)->where('id',$id)->first();
     // dd($data['profiles']);
       return view('frontend.pages.corporate.profile_edit')->with($data);
    }




    public function profile_update(Request $request){
      $request->validate([
         'name'=> 'required',
      ]);
       $up=ProfileModel::where('id',$request->profile_id)->update(['profile_name'=>$request->name]);
       return back()->with('success','Profile Updated');
    }





    public function corp_card_link($id,$name){
       $data['details']=CorporateAddedUser::where('id',$id)->where('name',$name)->first();
       if(!$data['details']){
        return "No Data Found";
       }
      return view('frontend.pages.corporate.card_link')->with($data);
    }

      public function personal_card_link($id,$name){
       $data['details']=Add_user_card::where('id',$id)->where('name',$name)->first();
       if(!$data['details']){
        return "No Data Found";
       }
      return view('frontend.pages.card.card_link')->with($data);
    }
}
