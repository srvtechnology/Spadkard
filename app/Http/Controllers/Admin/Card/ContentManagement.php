<?php

namespace App\Http\Controllers\Admin\Card;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\CardCategory;
use App\Models\CardContent;
use App\Models\ContentTwo;
use App\Models\Material_type;
use App\Models\CorporateAddedUser;
use App\Models\Add_user_card;
class ContentManagement extends Controller
{


/*---------------------------------------CONTENT 1 PART START-------------------------------------------------*/


    public function content_page(){
    	 $data['content']=CardContent::first();
         return view('admin.pages.content.content_page')->with($data);
    }




    public function upload_content(Request $request){
    	//dd($request->all());
    	$update_content=array(
    		'text'=>$request->text,
    		'title'=>$request->title
    	);
    	$upd=CardContent::where('id',$request->id)->update($update_content);
    	 return back()->with('success','Content changed successfully');
    }




/*---------------------------------------CONTENT 1 PART START-------------------------------------------------
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*/

/*---------------------------------------ICON PART START-------------------------------------------------*/

    public function cat_list(){
    	 $data['icons']=CardCategory::orderBy('id')->paginate(10);
         return view('admin.pages.category.icon_list')->with($data);
    }



    public function cat_edit($id){
    	//dd($id);
    	 $data['icon']=CardCategory::where('id',$id)->first();
         return view('admin.pages.category.icon_edit')->with($data);
    }





    public function cat_update(Request $request){
        
       //dd($request->all());
    	$check = CardCategory::where('id',$request->id)->first();
    	$check2 = CardCategory::where('title',$request->title)->where('id','!=',$request->id)->first();
    	 if (@$check2!="") {
    	 	return redirect()->back()->with('error','Category Name Already Added');
    	 }

     if ($request->hasFile('image')){

            $image = $request->image;
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



     	@$srch_img=$check->image;
        @unlink('public/category_icon_small/'.$srch_img);
         @unlink('public/category_icon/'.$srch_img);

	    $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
        $destinationPath = public_path('/category_icon_small');
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = public_path('/category_icon');
        $image->move($destinationPath, $input['imagename']);
        
        $upd['image'] = $input['imagename'];
        }
         $upd['title'] = $request->title;
          $upd['title_two'] = $request->title_two;
         CardCategory::where('id',$request->id)->update($upd);
         return redirect()->back()->with('success','Category Updated Successfully');
    }



/*---------------------------------------ICON PART END-------------------------------------------------
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*/

/*-----------CONTENT 2 PART  START-------------------------------------------------*/



    public function content_two_list(){
        $data['content_two']=ContentTwo::paginate(10);
         return view('admin.pages.content_two.list')->with($data);
    }




    public function content_two_edit($id){
         $data['content_two']=ContentTwo::where('id',$id)->first();
         return view('admin.pages.content_two.edit')->with($data);
    }





    public function content_two_update(Request $request){
        //dd($request->all());
        $check = ContentTwo::where('id',$request->id)->first();
        

     if ($request->hasFile('image')){
        @$srch_img=$check->image;
        @unlink('public/category_icon_small/'.$srch_img);
         @unlink('public/category_icon/'.$srch_img);

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
        $destinationPath = public_path('/content_two_image_small');
        $img = Image::make($image->getRealPath());
        $img->resize(180, 180, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = public_path('/content_two_image');
        $image->move($destinationPath, $input['imagename']);
        
        $upd['image'] = $input['imagename'];
        }
         $upd['title'] = $request->title;
          $upd['text'] = $request->text;
         ContentTwo::where('id',$request->id)->update($upd);
         return redirect()->back()->with('success','Content Updated Successfully');
    }




    public function content_two_view($id){
          $data['content_two']=ContentTwo::where('id',$id)->first();
         return view('admin.pages.content_two.view')->with($data);
    }







/*---------------------------CONTENT 2 PART END-------------------------------------------------*/

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
