<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;
use Mail;
use App\Mail\AdminForgetPassword;

class DashboardController extends Controller
{
    
    public function dashboard(){
      	return view('admin.pages.dashboard.dashboard');
    }





       public function edit_view(){
        //dd(Auth::guard('admin')->user()->id);
        $data['admin']=Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('admin.pages.dashboard.edit_profile')->with($data);
    }






    public function update(Request $request){
    	//dd($request->all());
    	 if($request->img){
        $image = $request->img;
          $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
          $image->move("storage/app/public/admin",$filename);


            if($request->old_password && $request->newPassword && $request->confirm){
                //dd("j");
                $request->validate([
                   'old_password'        => 'required|string|min:8',
                   'newPassword'=> 'required|min:8|required_with:confirm|same:confirm',
                   'confirm'=>'required|min:8', 
                 ]);
                $oldpassword = $request->input('old_password');
                if (!\Hash::check($oldpassword,Auth::guard('admin')->user()->password)) {
                    return redirect()->back()->with('error','You have entered wrong old password.');
                }else{
                    $updatepassword = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'password'=>\Hash::make($request->input('newPassword')),
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'image'=>$filename,
                    ]);
                    return redirect()->back()->with('success','Profile updated successfully with password and image..');
                }

            }
            else{
               $updatepassword = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'image'=>$filename,
                    ]);
                    return redirect()->back()->with('success','Profile updated successfully with image ');
            }

    }
    //////else for no image------
    else{

            if($request->old_password && $request->newPassword && $request->confirm){
            //dd("j");
                $request->validate([
                   'old_password'        => 'required|string|min:8',
                   'newPassword'=> 'required|min:8|required_with:confirm|same:confirm',
                   'confirm'=>'required|min:8', 
                 ]);
                $oldpassword = $request->input('old_password');
                if (!\Hash::check($oldpassword,Auth::guard('admin')->user()->password)) {
                    return redirect()->back()->with('error','You have entered wrong old password.');
                }else{
                    $updatepassword = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'password'=>\Hash::make($request->input('newPassword')),
                        'name'=>$request->name,
                        'email'=>$request->email,
                    ]);
                    return redirect()->back()->with('success','Profile updated successfully with password..');
                }

         }else{
           $updatepassword = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
            ]);
            return redirect()->back()->with('success','Profile updated successfully ');
         }
    }
    }






    


    public function mail_page(){
      return view('admin.pages.fgp.enter_mail');
    }





    public function code_gen(Request $request){
     // dd($request->all());
      $srch=Admin::where('email',$request->email)->first();
      if($srch){
          $code=mt_rand(100000,999999);
          $upd=Admin::where('id',$srch->id)->update(['email_vcode'=>$code]);
            $data = [
                  'email'=>$srch->email,
                  'name'=>$srch->name,
                  'email_vcode'=>$code,
                  'id'=>$srch->id,
              ];
            Mail::send(new AdminForgetPassword($data));
              return back()->with('success','A reset password link send to your email');

      }else{
          return back()->with('error','Email is wrong');
      }
    }





   public function resetPassowrd($id,$vcode){
       $data = Admin::where('email_vcode',$vcode)->where('id',$id)->first();
       if ($data===null) {
          return redirect()->route('admin.login')->with('error','Link expired');
       }
       return view('admin.pages.fgp.newpass',compact('data'));
    }





    public function newPassword(Request $request){
        $password = $request->input('password'); 
        $updatepassword = Admin::where('id',$request->id)->update([
            'password'=>Hash::make($password),
            'email_vcode'=>''
        ]); 
         return redirect()->route('admin.login')->with('success','Password changed successfully');
    }











}
