<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\BanerModel;
use App\Models\BannerText;


class BannerManagement extends Controller
{
     public function banner_page(Request $request){
         $data['banner']=BanerModel::first();
         $data['text']=BannerText::orderBy('id','desc')->paginate(10);
         //dd( $data['banner']);
         return view('admin.pages.banner.banner_page')->with($data);
    }








   public function imgcheck(Request $request){
      //dd($requ);
        if ($request->hasFile('img'))
          {
            $image = $request->img;
            $height = Image::make($image)->height();
            $width = Image::make($image)->width();
            return response()->json(['h'=>$height,'w'=>$width]);
          }    
   }








   public function upload_banner(Request $request){
  //dd($request->all());


    if($request->text){
      $count_text=BannerText::count();
      if($count_text>=10){
          return back()->with('error','Maximum no of text line added.');
      }
       $b_t=new BannerText;
       $b_t->text=$request->text;
       $b_t->save();
    }

    if($request->img){
   	 $srch=BanerModel::first();
   	 if($srch){
     //dd($srch->id);
   	 	$image = $request->img;
        $height = Image::make($image)->height();          
        $width = Image::make($image)->width();

            if( ((int)$width)<700 ){               
              return back()->with('error',"Image dimension range (width:700px-2000px & height:500-1000); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>2000 ){               
              return back()->with('error',"Image dimension range (width:700px-2000px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<500 ){              
               return back()->with('error',"Image dimension range (width:700px-2000px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>1000 ){
               return back()->with('error',"Image dimension range (width:700px-2000px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }
             @unlink('storage/app/public/banner_image/'.$srch->image);

	            $image = $request->img;
	            $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
	            $image->move("storage/app/public/banner_image",$filename);
	            $upd=array(
                  'image'=>$filename,
                   'title'=>@$request->title,
                  //'description'=>@$request->desc,
                );
                BanerModel::where('id',$srch->id)->update($upd);
                return back()->with('success','Banner image changed successfully');
   	 }
   	 else{
   	 	$image = $request->img;
        $height = Image::make($image)->height();          
        $width = Image::make($image)->width();

            if( ((int)$width)<700 ){               
              return back()->with('error',"Image dimension range (width:700px-2000px & height:500-1000); Uploaded size ".$width. " x ".$height )->withInput();
            }

            if( ((int)$width)>2000 ){               
              return back()->with('error',"Image dimension range (width:700px-2000px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

            if( ((int)$height)<500 ){              
               return back()->with('error',"Image dimension range (width:700px-2000px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

             if(  ((int)$height)>1000 ){
               return back()->with('error',"Image dimension range (width:700px-2000px & height:500-1000); Uploaded size ".$width. " x ".$height)->withInput();
            }

            $image = $request->img;
            $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move("storage/app/public/banner_image",$filename);

            $banner=new BanerModel();
            $banner->image=$filename;
             $banner->title=$request->title;
           // $banner->description=@$request->desc;

            $banner->save();
            return back()->with('success','Banner Updated successfully with image');

   	  }   //else end 

    } //1st if end
    else{
       $srch2=BanerModel::first();
       $upd=array(
                  //'description'=>@$request->desc,
                  'title'=>@$request->title,
                );
                BanerModel::where('id',$srch2->id)->update($upd);
                return back()->with('success','Banner Updated successfully');

    }

  }


  public function text_del($id){
    $del=BannerText::where('id',$id)->delete();
     return back()->with('success','Banner texts deleted successfully');
  }



}
