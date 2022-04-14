<?php

namespace App\Http\Controllers\Admin\RePrint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RePrintModel;
use App\Models\Add_user_card;
use DB;
use App\Models\User_to_temp;

class ReprintRequestController extends Controller
{
    public function re_print_list(){
      $data['datas']=RePrintModel::orderBy('id','desc')->paginate(10);
      return view('admin.pages.reprint.reprint_list')->with($data);
    }


    public function do_print($id){
    	$u=RePrintModel::where('id',$id)->update(['admin_status'=>'P']);
    	return back()->with('success','re-print completed');
    }

     public function view_details($id){
    	$data['details']=RePrintModel::where('id',$id)->first();
    	return view('admin.pages.reprint.reprint_view_details')->with($data);
    }
}
