<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\TemplateModel;
use App\Models\DummyText;
use App\Models\Material_type;

class TemplateController extends Controller
{
    public function temp_list(){
    	$data['templates']=TemplateModel::where('status','!=','D')->orderBy('id')->where('added_by','A')->paginate(10);
    	//$data['dummy']=DummyText::first();
    	return view('admin.pages.template.template_list')->with($data);
    }



    public function temp_add_page(){
    	$data['dummy']=DummyText::first();
    	return view('admin.pages.template.template_add')->with($data);
    }


    public function temp_ins(Request $request){
    	//dd($request->all());
    		$request->validate([
            'name' => 'required',
            'image' => 'required',
            'dummy_name' => 'required',
            'dummy_email' => 'required',
            'dummy_ph' => 'required',
            'dummy_company' => 'required',
            'dummy_address' => 'required',
            'dummy_tag' => 'required',
            //'back_image' => 'required',
        ]);

        
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
            $destinationPath = "storage/app/public/template_back/";
            $img1 = str_replace('data:image/png;base64,', '', @$request->profile_picture_2);
            $img1 = str_replace(' ', '+', $img1);
            $image_base64 = base64_decode($img1);
            $img = time() . '-' . rand(1000, 9999) . '.png';
            $file = $destinationPath . $img;
            file_put_contents($file, $image_base64);
            chmod($file, 0755);
           // $bracelet->design_picture = $img;
        }


        $ins_temp=new TemplateModel;
        $ins_temp->name=$request->name;
        $ins_temp->image=$img;
        $ins_temp->dummy_name=$request->dummy_name;
        $ins_temp->dummy_email=$request->dummy_email;
        $ins_temp->dummy_ph=$request->dummy_ph;
        $ins_temp->dummy_company=$request->dummy_company;
        $ins_temp->dummy_tag=$request->dummy_tag;
        $ins_temp->dummy_address=$request->dummy_address;
        $ins_temp->price=$request->price;
        $ins_temp->save();

        return back()->with('success','Template added successfully');
    }





    public function active($id){
    	// dd($id);
    	$obj=TemplateModel::where('id','=',$id)->update(['status'=>'A']);
        return back()->with("success",'Template successfully activated');
    }


    public function inactive($id){
    	// dd($id);
    	$obj=TemplateModel::where('id','=',$id)->update(['status'=>'I']);
        return back()->with("success",'Template successfully deactivated');
    }


      public function delete($id){
    	// dd($id);
    	$obj=TemplateModel::where('id','=',$id)->update(['status'=>'D']);
        return back()->with("success",'Template successfully deleted');
    }



    public function view_temp($id){
     $data['template']=TemplateModel::where('id',$id)->first();
    	return view('admin.pages.template.template_view')->with($data);
    }



    public function edit_form($id){
    	$data['template']=TemplateModel::where('id',$id)->first();
    	return view('admin.pages.template.template_edit')->with($data);
    }




    public function update_temp(Request $request){
    	//dd($request->all());
    		$request->validate([
            'name' => 'required',
            //'image' => 'required',
            'dummy_name' => 'required',
            'dummy_email' => 'required',
            'dummy_ph' => 'required',
            'dummy_company' => 'required',
            'dummy_address' => 'required',
            'dummy_tag' => 'required',
        ]);


    		
    		if ($request->profile_picture) {
    			$srch=TemplateModel::where('id',$request->id)->first();
    			//dd($srch);
				@unlink('storage/app/public/template_front/' . $srch->image);
	            $destinationPath = "storage/app/public/template_front/";
	            $img1 = str_replace('data:image/png;base64,', '', @$request->profile_picture);
	            $img1 = str_replace(' ', '+', $img1);
	            $image_base64 = base64_decode($img1);
	            $img = time() . '-' . rand(1000, 9999) . '.png';
	            $file = $destinationPath . $img;
	            file_put_contents($file, $image_base64);
	            chmod($file, 0755);
	            $upd['image'] = $img;
            }


            if ($request->profile_picture_2) {
                $srch2=TemplateModel::where('id',$request->id)->first();
                //dd($srch2);
                @unlink('storage/app/public/template_back/' . $srch2->back_image);
                $destinationPath_2 = "storage/app/public/template_back/";
                $img2 = str_replace('data:image/png;base64,', '', @$request->profile_picture_2);
                $img2 = str_replace(' ', '+', $img2);
                $image_base64_2 = base64_decode($img2);
                $img_2 = time() . '-' . rand(1000, 9999) . '.png';
                $file_2 = $destinationPath_2 . $img_2;
                file_put_contents($file_2, $image_base64_2);
                chmod($file_2, 0755);
                $upd['back_image'] = $img_2;
            }
             	               
			    //  $img->crop(500, 500, 200, 200);
	           // $upd['image']=$input['imagename'];

    		$upd['name']=$request->name;
    		$upd['dummy_name']=$request->dummy_name;
    		$upd['dummy_email']=$request->dummy_email;
    		$upd['dummy_ph']=$request->dummy_ph;
    		$upd['dummy_company']=$request->dummy_company;
    		$upd['dummy_address']=$request->dummy_address;
    		$upd['dummy_tag']=$request->dummy_tag;
    		$u=TemplateModel::where('id',$request->id)->update($upd);
    		 return back()->with("success",'Template successfully updated');
    }



















    //--material type part


     public function mat_list(){
        $data['material']=Material_type::where('status','!=','D')->orderBy('id')->paginate(10);
        //$data['dummy']=DummyText::first();
        return view('admin.pages.material.material_list')->with($data);
    }



    public function mat_add_page(){
       // $data['dummy']=DummyText::first();
        return view('admin.pages.material.material_add');
    }


    public function mat_ins(Request $request){
        //dd($request->all());
            $request->validate([
            'name' => 'required',
            'price'=>  'required',
        ]);

     


        $ins_temp=new Material_type;
        $ins_temp->name=$request->name;
        $ins_temp->price=$request->price;
        $ins_temp->status='A';
        $ins_temp->save();

        return back()->with('success','Materail added successfully');
    }





    public function mat_active($id){
        // dd($id);
        $obj=Material_type::where('id','=',$id)->update(['status'=>'A']);
        return back()->with("success",'Template Material type successfully activated');
    }


    public function mat_inactive($id){
        // dd($id);
        $obj=Material_type::where('id','=',$id)->update(['status'=>'I']);
        return back()->with("success",'Template Material type successfully deactivated');
    }


      public function mat_delete($id){
        // dd($id);
        $obj=Material_type::where('id','=',$id)->update(['status'=>'D']);
        return back()->with("success",'Template Material type successfully deleted');
    }





    public function mat_edit_form($id){
        $data['material']=Material_type::where('id',$id)->first();
        return view('admin.pages.material.material_edit')->with($data);
    }




    public function update_mat(Request $request){
        //dd($request->all());
            $request->validate([
            'name' => 'required',
            'price'=>  'required',
        ]);

            $upd['name']=$request->name;
            $upd['price']=$request->price;
            $u=Material_type::where('id',$request->id)->update($upd);
             return back()->with("success",'Template successfully updated');
    }















    /*user added temp*/

    public function temp_added_by_user(){
        $data['templates']=TemplateModel::where('status','!=','D')->orderBy('id')->where('added_by','U')->paginate(10);
        //$data['dummy']=DummyText::first();
        return view('admin.pages.user_added_template.user_added_temp_list')->with($data);

    }


}
