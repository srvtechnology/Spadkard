<?php

namespace App\Http\Controllers\Admin\CardPrice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardPriceModel;

class CardPriceController extends Controller
{
    public function price_list(){
    	$data['lists']=CardPriceModel::orderBy('id')->paginate(10);
    	return view('admin.pages.card_price.price_list')->with($data);
    }



    public function add_price_page(){
    	return view('admin.pages.card_price.price_add');
    }






    public function ins_card_price(Request $request){
    	$request->validate([
            'card_no_from' => 'required',
            'card_no_to' => 'required',
            'price' => 'required',
        ]);

	      $from=$request->card_no_from +1-1;
	      $to=$request->card_no_to +1-1;

	      //Checking that card no already exists or not
	       $check1 = CardPriceModel::where('card_no_from','<=',(int)$from)->where('card_no_to','>=',(int)$from)->count();
	       

	       $check2 = CardPriceModel::where('card_no_from','<=',(int)$to)->where('card_no_to','>=',(int)$to)->count();


	       $check3 = CardPriceModel::where('card_no_from','<=',(int)$to)->where('card_no_from','>=',(int)$from)->where('card_no_to','<=',(int)$to)->count();



           $check4 = CardPriceModel::where('card_no_from','<',(int)$from)->where('card_no_to','>',(int)(int)$to)->count();

           // dd($check1,$check2,$check3,$check4);

            if (@$check1>0) {
            return redirect()->back()->with('error','This Card Number Range Already Exits');
	        }
	        if (@$check2>0) {
	            return redirect()->back()->with('error','This Card Number Range Already Exits');
	        }
	        if (@$check3>0) {
	            return redirect()->back()->with('error','This Card Number Range Already Exits');
	        }
	         if (@$check4>0) {
	            return redirect()->back()->with('error','This Card Number Range Already Exits');
	        }


        $ins=new CardPriceModel;
        $ins->card_no_from=$request->card_no_from;
        $ins->card_no_to=$request->card_no_to;
        $ins->price=$request->price;
        $ins->save();

        return back()->with('success','Price added for cards');

    }


    public function edit_price_page($id){
    	$data['card_price']=CardPriceModel::where('id',$id)->first();
    	return view('admin.pages.card_price.price_edit')->with($data);
    }


    public function update_card_price(Request $request){
       $request->validate([
            'card_no_from' => 'required',
            'card_no_to' => 'required',
            'price' => 'required',
        ]);

    	 $from=$request->card_no_from +1-1;
	      $to=$request->card_no_to +1-1;

	      //Checking that card no already exists or not
	       $check1 = CardPriceModel::where('card_no_from','<=',(int)$from)->where('card_no_to','>=',(int)$from)->where('id','!=',$request->id)->count();
	       

	       $check2 = CardPriceModel::where('card_no_from','<=',(int)$to)->where('card_no_to','>=',(int)$to)->where('id','!=',$request->id)->count();


	       $check3 = CardPriceModel::where('card_no_from','<=',(int)$to)->where('card_no_from','>=',(int)$from)->where('id','!=',$request->id)->where('card_no_to','<=',(int)$to)->count();



           $check4 = CardPriceModel::where('card_no_from','<',(int)$from)->where('card_no_to','>',(int)(int)$to)->where('id','!=',$request->id)->count();

            // dd($check1,$check2,$check3,$check4);

            if (@$check1>0) {
            return redirect()->back()->with('error','This Card Number Range Already Exits');
	        }
	        if (@$check2>0) {
	            return redirect()->back()->with('error','This Card Number Range Already Exits');
	        }
	        if (@$check3>0) {
	            return redirect()->back()->with('error','This Card Number Range Already Exits');
	        }
	         if (@$check4>0) {
	            return redirect()->back()->with('error','This Card Number Range Already Exits');
	        }


        $upd=[];
    	if($request->card_no_from){
          $upd['card_no_from']=$request->card_no_from;
    	}
    	if($request->card_no_to){
          $upd['card_no_to']=$request->card_no_to;
    	}
    	if($request->price){
          $upd['price']=$request->price;
    	}

    	$upd=CardPriceModel::where('id',$request->id)->update($upd);
    	return back()->with('success','Updated');

    }



    public function delete($id){
    	$srch=CardPriceModel::where('id',$id)->first();
    	if($srch){
    	$upd=CardPriceModel::where('id',$id)->delete();
    	return back()->with('success','Updated');
        }else{
        	return back()->with('success','This id does not exists');
        }
    }
}
