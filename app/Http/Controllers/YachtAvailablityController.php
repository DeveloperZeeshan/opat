<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yacht;
use Auth;
use Mail;
use App\YachtAvailablity;
use App\Company;
use App\Caretaker;
use App\Manager;


class YachtAvailablityController extends Controller{
    public function __construct(){

    }//end constructor.
    public function index($id=null){
//        if($id=='all'){
//            YachtAvailablity::where('id','>=',1)->update(['notification'=>0]);
//        }else
        if($id !=null && $id !='all'){
            YachtAvailablity::where('id',$id)->update(['notification'=>0]);
        }//end if.
        $user_id                = Auth::user()->id;
        $company                =  Company::where('user_id',$user_id)->first();
        if (!$company) {
            $company            =  Manager::where('user_id',$user_id)->first();
        }if (!$company) {
            $company            =  Caretaker::where('user_id',$user_id)->first();
        }//end if else
        if (auth()->user()->hasrole('company')) {
            if($id !=null && $id !='all')
                $yachtAvailablities = YachtAvailablity::where('is_deleted', 'false')->where('company_id', $company->id)->with('getYacht')->where('id',$id)->get();
            else
                $yachtAvailablities = YachtAvailablity::where('is_deleted', 'false')->where('company_id', $company->id)->with('getYacht')->get();
        }else {
            if($id !=null && $id !='all')
                $yachtAvailablities = YachtAvailablity::where('is_deleted', 'false')->where('company_id', $company->company_id)->with('getYacht')->where('id',$id)->get();
            else
                $yachtAvailablities = YachtAvailablity::where('is_deleted', 'false')->where('company_id', $company->company_id)->with('getYacht')->get();
        }//end if else.
        $yachts = [];
    	return view('yachtAvailablity.yachtAvailablity.index',compact('yachtAvailablities','yachts'));
    }//end index function.
    public function yachtAvailablityProcess(Request $request){
        extract($request->all());
        if($action_type=='new_record'){
            $user_id                = Auth::user()->id;
            $company                =  Company::where('user_id',$user_id)->first();
            if (!$company) {
                $company            =  Manager::where('user_id',$user_id)->first();
            }if (!$company) {
                $company            =  Caretaker::where('user_id',$user_id)->first();
            }//end if else.
            if (auth()->user()->hasrole('company')) {
                YachtAvailablity::create(['user_id' => Auth::id(),'company_id'=>$company->id,'date' => $date, 'title' => $title, 'subject' => $subject, 'comment' => $comment]);
            }else{
                YachtAvailablity::create(['user_id' => Auth::id(),'company_id'=>$company->company_id, 'date' => $date, 'title' => $title, 'subject' => $subject, 'comment' => $comment]);
            }
                $data = [
                'no_reply' => 'finance@yopmail.com',
                'email' => 'zib@tafsol.com',
                'date' => $date,
                'title' => $title,
                'subject' => $subject,
                'comment' => $comment,
            ];
            try {
                $result = Mail::send('website.calendar_email', ['data' => $data], function ($message) use ($data) {
                    $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);

                });

//               var_dump($result);die();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
    		return back()->with(['type'=>'success','msg'=>'Added Successfully.']);
        }elseif($action_type=='update_record'){
            YachtAvailablity::where('id',$id)->update(['title'=>$title,'subject'=>$subject,'comment'=>$comment]);
            return back()->with(['type'=>'success','msg'=>'Updated Successfully.']);
        }else{
            return back()->with(['type'=>'error','msg'=>'Unable to Process.']);
        }//end if else.
    }//end yachtAvailablityProcess function.
    public function deleteYachtAvailablity(Request $request){

        if(YachtAvailablity::where('id',$request->id)->update(['is_deleted'=>'true'])){
            return json_encode(['result'=>'success']);
        }else{
            return json_encode(['result'=>'fail']);
        }//end if else.
    }//end deleteYachtAvailablity function.
}//end class.
