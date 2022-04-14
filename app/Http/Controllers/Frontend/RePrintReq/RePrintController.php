<?php

namespace App\Http\Controllers\Frontend\RePrintReq;

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
use App\Models\RePrintModel;
use App\Models\Add_user_card;
use DB;

class RePrintController extends Controller
{
    public function re_print_req_page($id){
      $data['datas']=Add_user_card::where('id',$id)->first();
      return view('frontend.pages.reprint.reprint_edit_page')->with($data);
    }



    public function re_print_ins(Request $request){
    	//dd($request->all());
    	$count=DB::table('re_print_req')->where('master_added_user_id',$request->master_added_user_id)->count();
        if($count>0){
        	return redirect()->route('printed.list',$request->user_to_temp_id)->with('error','Re print request already submitted for card no '.$request->master_added_user_id);
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

	     if ($request->hasFile('logo')){
            $image = $request->logo;
            $height = Image::make($image)->height();          
            $width = Image::make($image)->width();

            if( ((int)$width)<10 ){               
              return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>150 ){               
              return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<10 ){              
               return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>150 ){
               return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
            }
	     	// @$srch_img=$check->image;
	        //  @unlink('public/category_icon_small/'.$srch_img);
	        //  @unlink('public/category_icon/'.$srch_img);

		    $image = $request->file('logo');
	        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
	     
	        $destinationPath = public_path('/logo_for_user');
	        $img = Image::make($image->getRealPath());
	        $img->resize(100, 100, function ($constraint) {
	            $constraint->aspectRatio();
	        })->save($destinationPath.'/'.$input['imagename']);
	   
	        }

	    $ins_card=new RePrintModel;
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
        $ins_card->master_added_user_id=$request->master_added_user_id;
        $ins_card->logo=$input['imagename'];
        $ins_card->admin_status='I';
        //design_id

	    $ins_card->save();

	    //A mail to admin.

	    return redirect()->route('printed.list',$request->user_to_temp_id)->with('success','Re print request submitted for card no '.$request->master_added_user_id);
    }



    public function re_print_card_list(){
    	$data['datas']=RePrintModel::where('user_id',Auth::user()->id)->get();
    	return view('frontend.pages.reprint.reprint_list')->with($data);
    }

    public function view_card($id){
    	$data['details']=RePrintModel::where('id',$id)->first();
    	return view('frontend.pages.reprint.reprint_view')->with($data);
    }
}
