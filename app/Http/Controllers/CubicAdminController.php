<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsLetter;
use App\Yacht;
use App\Client;
use App\Agent;
use App\Charter;
use Mail;
use App\SpecialOffer;
use App\GalleryImage;
class CubicAdminController extends Controller{
    public function index(){
	    $newsLetters= NewsLetter::orderBy('id','DESC')->paginate(5);
	    $yacht 		= Yacht::orderBy('id','DESC')->first();
		return view('dashboard.index',compact('newsLetters','yacht'));
    }//end index function.
    public function sendEmail(Request $request){
    	extract($request->all());
    	$data = ['subject'=>$subject,'body'=>$body];
		try{
 	    	Mail::send('website.email.common', ['data'=>$data],function($message)use($data,$to){
	      		$message->to($to, $data['subject']??"Not Available")->subject($data['subject']??"".' '.date('d-m-Y'));
	      	});			
			return back()->with(['type'=>'success','msg'=>'Email Sent Successfully.']);
		}catch(\Exception $e){
			return back()->with(['type'=>'error','msg'=>'Unable to process request, try again.']);
			return $e->getMessage();
		}
	}//end sendEmail function
	public function getClient(){
 		$clients = Client::where('status','active')->get();
		$msg = "";
		$data['data'] = [];
		foreach ($clients as $key=>$client) {
			array_push($data['data'], ['id'=>++$key,'name'=>$client->name,'surname'=>$client->surname,'passport_id'=>$client->passport_id]);
		}//end 
		return json_encode($data);
	}//end getClient function.

	public function getAgent(){
 		$agents = Agent::where('status','active')->get();
		$msg = "";
		$data['data'] = [];
		foreach ($agents as $key=>$agent) {
			array_push($data['data'], ['id'=>$agent->id,'name'=>$agent->name]);
		}//end 
		return json_encode($data);
	}//end getClient function.

	public function getCharterCode(Request $request){
		if($charter = Charter::where('charter_code',$request->field )->orWhere('charter_code', 'like', '%' . $request->field . '%')->orderBy('id','DESC')->first()){
			$charter_code_no = str_pad(preg_replace('/\D/', '', $charter->charter_code)+ 1, 5, 0, STR_PAD_LEFT);
		}else{
			$charter_code_no = str_pad(0 + 1, 5, 0, STR_PAD_LEFT);;
		}//end if else.
		//this is the title of yacht first 2 characters.
		return $request->field.$charter_code_no;
	}//end getCharterCode.

 	public function changeSpecialOfferPosition(Request $request){
 		$i=1;
		foreach($request->position as $k=>$v){
			echo $v;
            SpecialOffer::where('id',$v)->update(['position_order'=>$i]);
			$i++;
		}

    die;
    }//

    public function deleteYachtImage(Request $request){

		$yacht_qury = Yacht::where('id',$request->id)->update([$request->column=>"null"]);
         return true;
     }

     public function deleteYachtGalleryImages(Request $request){

		$yacht_qury = GalleryImage::where('id',$request->id)->update(["name"=>"null"]);
         return true;
     }


}//end class.
