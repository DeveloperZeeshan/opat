<?php

namespace App\Http\Controllers\RentPayment;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\RentPayment;
use App\Company;
use App\Manager;
use App\Caretaker;
use App\Consumer;
use App\Finance;
use App\User;
use Illuminate\Http\Request;
use Auth;
use URL;
use Session;
class RentPaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {

        if (Session::has('check_consumer_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName()=='consumer.edit' || Session::has('check_consumer_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName()=='consumer.show') {
            $consumer_id = Session::get('check_consumer_detail_session')['consumer_id'];
            $model = str_slug('rentpayment','-');
            if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
                $keyword = $request->get('search');
                $perPage = 25;
                if (!empty($keyword)) {
                    $rentpayment = RentPayment::where('consumer_id',$consumer_id)->where('consumer_id', 'LIKE', "%$keyword%")
                    ->orWhere('rent_date', 'LIKE', "%$keyword%")
                    ->orWhere('bed_amount', 'LIKE', "%$keyword%")
                    ->orWhere('actual_amount', 'LIKE', "%$keyword%")
                    ->orWhere('added_by', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
                } else {
                    $rentAmount = RentPayment::where('consumer_id',$consumer_id)->pluck('bed_amount')->sum();
                    $RecievedAmount = RentPayment::where('consumer_id',$consumer_id)->pluck('recieved_amount')->sum();
                    $dueAmount = RentPayment::where('consumer_id',$consumer_id)->pluck('due_amount')->sum();
                    $rentpayment = RentPayment::orderBy('id','DESC')->where('consumer_id',$consumer_id)->paginate($perPage);
                }//end if else.
            }//end if else.
            return view('rentPayment.rent-payment.index', compact('rentpayment','rentAmount','RecievedAmount','dueAmount'));
        }
else{
            $model = str_slug('rentpayment','-');
            if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
                $keyword = $request->get('search');
                $perPage = 25;
                if (!empty($keyword)) {
                    $rentpayment = RentPayment::orderBy('id','DESC')->groupBy('consumer_id')->where('consumer_id', 'LIKE', "%$keyword%")
                    ->orWhere('rent_date', 'LIKE', "%$keyword%")
                    ->orWhere('bed_amount', 'LIKE', "%$keyword%")
                    ->orWhere('actual_amount', 'LIKE', "%$keyword%")
                    ->orWhere('added_by', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
                } else {
                    if(auth()->user()->hasrole('finance')){
//                        $companyId = Finance::where('user_id',Auth::id())->pluck('added_by_id');
//                        $RentPayments = RentPayment::where('company_id',$companyId)->get();
                        $user_id                = Auth::user()->id;
                        $company                =  Finance::where('user_id',$user_id)->first();
                        $rentAmount = RentPayment::pluck('bed_amount')->sum();
                        $RecievedAmount = RentPayment::pluck('recieved_amount')->sum();
                        $dueAmount = RentPayment::pluck('due_amount')->sum();
                        $rentpayment = RentPayment::where('company_id',$company->added_by_id)->orderBy('id','DESC')->paginate($perPage);

                    }
                    else{
                        $rentAmount = RentPayment::pluck('bed_amount')->sum();
                        $RecievedAmount = RentPayment::pluck('recieved_amount')->sum();
                        $dueAmount = RentPayment::pluck('due_amount')->sum();
                        $rentpayment = RentPayment::orderBy('id','DESC')->paginate($perPage);
//                        ->groupBy('consumer_id')
                    }
                }//end if else.
            }//end if else.
            return view('rentPayment.rent-payment.index', compact('rentpayment','rentAmount','RecievedAmount','dueAmount'));
        }//end if else.
        return response(view('403'), 403);

    }//end index function.

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('rentpayment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $user_id                = Auth::user()->id;
            $company                =  Company::where('user_id',$user_id)->first();
            $is_company = true;
            if (!$company) {
            $company                =  Manager::where('user_id',$user_id)->first();
                $is_company = false;
            }if (!$company) {
                $company                =  Caretaker::where('user_id',$user_id)->first();
                $is_company = false;
            }
            if (!$company) {
               $company = Finance::where('user_id', $user_id)->first();
                $is_company = false;
            }
                if($is_company){
                    $consumers = Consumer::where('company_id',$company->id)->get();
                }elseif(auth()->user()->hasrole('finance')){
                    $consumers = Consumer::where('company_id',$company->added_by_id)->get();
                }else{
                    $consumers = Consumer::where('company_id',$company->company_id)->get();
                }
            return view('rentPayment.rent-payment.create',compact('consumers'));
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('rentpayment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {

            $requestData = $request->all();
            $requestData['due_amount'] = $request->bed_amount- $request->recieved_amount;
            if (auth()->user()->hasrole('company')){
                $requestData['company_id'] = Auth::user()->getCompanyDetail->id;
            }elseif(auth()->user()->hasrole('manager')){
               $requestData['company_id'] = Auth::user()->getManagerDetail->company_id;
            }else{
              $companyId = Finance::where('user_id',Auth::id())->first();
                $requestData['company_id'] = $companyId->added_by_id;
            }

            RentPayment::create($requestData);
            return redirect('rentPayment/rent-payment')->with('flash_message', 'RentPayment added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('rentpayment','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $rentpayment = RentPayment::findOrFail($id);
            $companyId = Finance::where('user_id',Auth::id())->pluck('added_by_id');
            $rentpayments = RentPayment::where('consumer_id',$rentpayment->consumer_id)->get();
//            whereIn('company_id',$companyId)->
            $total = RentPayment::where('consumer_id',$rentpayment->consumer_id)->sum('due_amount');

            return view('rentPayment.rent-payment.show', compact('rentpayments','rentpayment','total'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('rentpayment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $user_id                = Auth::user()->id;
            $company                =  Company::where('user_id',$user_id)->first(); 
            if (!$company) {
                $company                =  Manager::where('user_id',$user_id)->first(); 
            }if (!$company) {
                $company                =  Caretaker::where('user_id',$user_id)->first(); 
            }//end if else.
             if (!$company) {
                $company                =  Finance::where('user_id',$user_id)->first(); 
                $company_id = $company->added_by_id;
                $consumers = Consumer::where('company_id',$company->id)->get();
                $rentpayment = RentPayment::findOrFail($id);
                return view('rentPayment.rent-payment.create',compact('consumers'));
            }
           
            $consumers = Consumer::where('company_id',$company->id)->get();
            $rentpayment = RentPayment::findOrFail($id);
            return view('rentPayment.rent-payment.edit', compact('rentpayment','consumers'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('rentpayment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $rentpayment = RentPayment::findOrFail($id);
             $rentpayment->update($requestData);

             return redirect('rentPayment/rent-payment')->with('flash_message', 'RentPayment updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('rentpayment','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            RentPayment::destroy($id);

            return redirect('rentPayment/rent-payment')->with('flash_message', 'RentPayment deleted!');
        }
        return response(view('403'), 403);

    }
}
