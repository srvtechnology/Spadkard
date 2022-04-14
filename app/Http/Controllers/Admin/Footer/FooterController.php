<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterModel;
use Image;

class FooterController extends Controller
{
    
     public function footer_page(){
    	$data['footer']=FooterModel::first();
    	return view('admin.pages.footer.footer_page')->with($data);
    }



    public function footer_upd(Request $request){
    	//dd($request->all());

    	if($request->img){
        $image = $request->img;
        $height = Image::make($image)->height();          
        $width = Image::make($image)->width();

        if( ((int)$width)<10 ){               
              return back()->with('error',"Image dimension range (width:10px-100px & height:10-100); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>100 ){               
              return back()->with('error',"Image dimension range (width:10px-100px & height:10-100); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<10 ){              
               return back()->with('error',"Image dimension range (width:10px-100px & height:10-100); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>100 ){
               return back()->with('error',"Image dimension range (width:10px-100px & height:10-100); Uploaded size ".$width. " x ".$height)->withInput();
            }
       

         // dd("img");
          $image = $request->img;
          $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("storage/app/public/footer/address/",$filename);
          $upd['address_img']=$filename;
    	}



    	if($request->img2){
        $image2 = $request->img2;
        $height2 = Image::make($image2)->height();          
        $width2 = Image::make($image2)->width();

        if( ((int)$width2)<10 ){               
              return back()->with('error',"Image dimension range (width:10px-100px & height:10-100); Uploaded size ".$width2. " x ".$height2 )->withInput();
            }

            if( ((int)$width2)>100 ){               
              return back()->with('error',"Image dimension range (width:10px-100px & height:10-100); Uploaded size ".$width2. " x ".$height2)->withInput();
            }

            if( ((int)$height2)<10 ){              
               return back()->with('error',"Image dimension range (width:10px-100px & height:10-100); Uploaded size ".$width2. " x ".$height2)->withInput();
            }

             if(  ((int)$height2)>100 ){
               return back()->with('error',"Image dimension range (width:10px-100px & height:10-100); Uploaded size ".$width2. " x ".$height2)->withInput();
            }
       

         // dd("img");
          $image2 = $request->img2;
          $filename2 = time() . '-' . rand(1000, 9999) . '.' . $image2->getClientOriginalExtension();
          $image2->move("storage/app/public/footer/email/",$filename2);
           $upd['email_image']=$filename2;
    	}

    	$upd['text']=$request->text;
    	$upd['address']=$request->address;
    	//$upd['address_2']=$request->address_2;
    	$upd['email']=$request->email;

    	$u=FooterModel::where('id',$request->id)->update($upd);
    	return back()->with('success','footer updated');

    }




    public function download($id)
    {
        $file_path = @storage_path() . "/app/public/template_front/".$id;
        return response()->download( $file_path);
    }

     public function download_2($id)
    {
        $file_path = @storage_path() . "/app/public/template_back/".$id;
        return response()->download( $file_path);
    }
}
