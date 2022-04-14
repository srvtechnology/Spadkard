<?php

namespace App\Http\Controllers\Admin\PrintPart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_to_temp;
use App\Models\Add_user_card;


class PrintController extends Controller

{
      public function print_list(){
      $all_users_to_tmp=Add_user_card::orderBy('id')->whereIn('admin_status',['I','C'])->pluck('user_to_temp_id')->toArray();
      $unique_users=array_unique($all_users_to_tmp);

      $data['print_req_users']=User_to_temp::whereIn('id',$unique_users)->paginate(10);
      //dd($data['print_req_users']);
      // dd($unique_users);
      return view('admin.pages.print_req.print_req_list')->with($data);

    }



    public function all_req_print_list($id){
    	//dd($id);
    	$data['print_req']=Add_user_card::orderBy('id')->where('user_to_temp_id',$id)->where('status','A')->where('print_status','P')->where('admin_status','I')->paginate(10);
    	 return view('admin.pages.print_req.print_req_child_list')->with($data);
    }



    public function print_card($id){
    	$upd=Add_user_card::where('id',$id)->update(['admin_status'=>'C']);
    	return back()->with('success','Print Completed');

    }



    public function completed_print($id){
    	$data['print_comp']=Add_user_card::orderBy('id')->where('user_to_temp_id',$id)->where('status','A')->where('print_status','P')->where('admin_status','C')->paginate(10);
    	 return view('admin.pages.print_req.complete_print')->with($data);
    }



    public function view_details($id){
    	$data['details']=Add_user_card::where('id',$id)->first();
    	return view('admin.pages.print_req.details')->with($data);
    }
}
