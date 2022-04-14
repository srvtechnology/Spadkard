<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\UserForgetPass;
use Hash;


class DashboardController extends Controller
{
    public function dashboard(){
    	return view('frontend.pages.dashboard.dashboard');
    }


    public function enter_mail(Request $request){
    
    $srch=User::where('email',$request->email)->first();
      if($srch){
          $code=mt_rand(100000,999999);
          $upd=User::where('id',$srch->id)->update(['email_vcode'=>$code]);
            $data = [
                  'email'=>$srch->email,
                  'name'=>$srch->name,
                  'email_vcode'=>$code,
                  'id'=>$srch->id,
              ];
            Mail::send(new UserForgetPass($data));
              return back()->with('success2','A reset password link send to your email');

      }else{
          return back()->with('error2','Email is wrong');
      }

    }



    public function resetPassowrd($id,$vcode){
       $data = User::where('email_vcode',$vcode)->where('id',$id)->first();
       if ($data===null) {
          return redirect()->route('welcome')->with('error2','Link expired');
       }
       return view('frontend.pages.dashboard.new_pass',compact('data'));
    }


    public function newPassword(Request $request){
        $password = $request->input('password'); 
        $updatepassword = User::where('id',$request->id)->update([
            'password'=>Hash::make($password),
            'email_vcode'=>''
        ]); 
         return redirect()->route('welcome')->with('success2','Password changed successfully');
    }
}
