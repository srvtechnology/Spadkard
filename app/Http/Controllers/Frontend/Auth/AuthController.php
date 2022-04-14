<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function user_logout(){
       // dd("Auth::user()->id");
        Session::flush();
        Auth::logout();
        return redirect()->route('welcome');
    }



    public function edit_profile_page(){
    	$data['user']=User::where('id',Auth::user()->id)->first();
    	return view('frontend.pages.dashboard.edit_profile')->with($data);
    }

    public function update_user(Request $request){
        //dd($request->all());
    	$upd['name']=$request->name;
    	$upd['email']=$request->email;
    	$upd['mobile']=$request->ph;

    	$u= User::where('id',Auth::user()->id)->update($upd);

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
                    $updatepassword = User::where('id',Auth::user()->id)->update([
                        'password'=>\Hash::make($request->input('newPassword')),
                        'name'=>$request->name,
                        'email'=>$request->email,
                    ]);
                    return redirect()->back()->with('success','Profile updated successfully with password..');
                }
         }
         else{
          return redirect()->back()->with('success','Profile updated successfully ');
         }
              

    }
}
