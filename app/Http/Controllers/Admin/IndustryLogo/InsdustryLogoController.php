<?php

namespace App\Http\Controllers\Admin\IndustryLogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\IndustryLogoModel;

class InsdustryLogoController extends Controller
{
   

    public function logo_list(){
    	$data['logos']=IndustryLogoModel::orderBy('id','desc')->where('status','!=','D')->paginate(10);
        return view('admin.pages.industry_logo.logo_list')->with($data);
    }



    public function logo_add_page(){
        return view('admin.pages.industry_logo.logo_add');
    }



    public function logo_ins(Request $request){
    	$request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        //image
        	$image = $request->image;
        $height = Image::make($image)->height();          
        $width = Image::make($image)->width();

            if( ((int)$width)<10 ){               
              return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>160 ){               
              return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<10 ){              
               return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>150 ){
               return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
            }
             //@unlink('storage/app/public/banner_image/'.$srch->image);

            $image = $request->image;
            $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move("storage/app/public/industry_logo/",$filename);

            $ins=new IndustryLogoModel;
            $ins->name=$request->name;
            $ins->image=$filename;
            $ins->status='A';
            $ins->save();

            return back()->with('success','Insdustry logo added successfully');

    }




    public function edit_form($id){
       $data['logo']=IndustryLogoModel::where('id',$id)->first();
        return view('admin.pages.industry_logo.logo_edit')->with($data);
    }






    public function update_logo(Request $request){
        if($request->image){
    		$srch=IndustryLogoModel::where('id',$request->id)->first();
	   	 	$image = $request->image;
	        $height = Image::make($image)->height();          
	        $width = Image::make($image)->width();

            if( ((int)$width)<10 ){               
              return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>160 ){               
              return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<10 ){              
               return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>150 ){
               return back()->with('error',"Image dimension range (width:10px-150px & height:10-150); Uploaded size ".$width. " x ".$height)->withInput();
            }
             @unlink('storage/app/public/industry_logo/'.$srch->image);

	            $image = $request->image;
	            $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
	            $image->move("storage/app/public/industry_logo/",$filename);
	            $upd['image']=$filename;
   	 }
   	 $upd['name']=$request->name;
   	 $update=IndustryLogoModel::where('id',$request->id)->update($upd);
   	  return back()->with('success','Insdustry logo Updated successfully');

    }




    public function active($id){
    	// dd($id);
    	$obj=IndustryLogoModel::where('id','=',$id)->update(['status'=>'A']);
        return back()->with("success",'Insdustry logo successfully activated');
    }


    public function inactive($id){
    	// dd($id);
    	$obj=IndustryLogoModel::where('id','=',$id)->update(['status'=>'I']);
        return back()->with("success",'Insdustry logo successfully deactivated');
    }


      public function delete($id){
    	// dd($id);
    	$obj=IndustryLogoModel::where('id','=',$id)->update(['status'=>'D']);
        return back()->with("success",'Insdustry logo successfully deleted');
    }
}
