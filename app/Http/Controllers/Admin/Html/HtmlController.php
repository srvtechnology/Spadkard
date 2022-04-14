<?php

namespace App\Http\Controllers\Admin\Html;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HtmlModel;
use App\Models\TemplateModel;

class HtmlController extends Controller
{
    public function html_list(){
    	$data['htmls']=HtmlModel::orderBy('id','desc')->where('status','!=','D')->paginate(10);
    	return view('admin.pages.html.html_list')->with($data);
    }


    public function html_add_page(){
      $temps=TemplateModel::where('status','A')->where('added_by','A')->pluck('id')->toArray();
      $already_used=HtmlModel::where('status','A')->pluck('temp_id')->toArray();

      $unique=[];
      foreach( $temps as $val){
        if(!in_array($val,$already_used)){
          array_push($unique,$val);
        }
      }
     // dd($unique);

      $data['unq_temp']=TemplateModel::whereIn('id',$unique)->get();
     // dd($data['unq_temp']);
    	return view('admin.pages.html.html_add')->with($data);
    }



    public function insert(Request $request){
    //	dd($request->all());
    	$request->validate([
            'name' => 'required',
            'html' => 'required',
            'html_back' => 'required',
        ]);

       if ($request->image) {
            $destinationPath = "storage/app/public/design/";
            $img1 = str_replace('data:image/png;base64,', '', @$request->image);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
           // $bracelet->design_picture = $img;
        }


    	$ins=new HtmlModel;
    	$ins->name=$request->name;
    	$ins->html=$request->html;
      $ins->html_back=$request->html_back;
      $ins->temp_id=$request->temp_id;
      // $ins->image=$img;
    	$ins->save();
    	return back()->with('success','Html Added.');
    }



    public function delete($id){
    	//dd($id);
      $del=HtmlModel::where('id',$id)->update(['status'=>'D']);
      return back()->with('success','Html design deleted.');
    }


     public function active($id){
    	//dd($id);
      $act=HtmlModel::where('id',$id)->update(['status'=>'A']);
      return back()->with('success','Html design activated.');
    }


     public function inactive($id){
    	//dd($id);
      $inact=HtmlModel::where('id',$id)->update(['status'=>'I']);
      return back()->with('success','Html design deactiated.');
    }



    public function View($id){
      $data['htmls']=HtmlModel::where('id',$id)->first();
      return view('admin.pages.html.html_view')->with($data);
    }



    public function edit_page($id){
    	 $data['htmls']=HtmlModel::where('id',$id)->first();
      return view('admin.pages.html.html_edit')->with($data);
    }



    public function html_update(Request $request){
    	//dd($request->all());
    	$request->validate([
            'name' => 'required',
            'html' => 'required',
             'html_back' => 'required',
        ]);



        if ($request->image) {
            $destinationPath = "storage/app/public/design/";
            $img1 = str_replace('data:image/png;base64,', '', @$request->image);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
           // $bracelet->design_picture = $img;
             $upd['image']=$img;

            $srch=HtmlModel::where('id',$request->id)->first();
            @unlink('storage/app/public/design/'.$srch->image);
        }


        $upd['name']=$request->name;
        $upd['html']=$request->html;
        $upd['html_back']=$request->html_back;

        $u=HtmlModel::where('id',$request->id)->update($upd);
        return back()->with('success','Html design updated');

    }
}
