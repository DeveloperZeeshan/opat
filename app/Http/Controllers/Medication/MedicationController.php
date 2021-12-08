<?php

namespace App\Http\Controllers\Medication;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Medication;
use App\Company;
use App\Manager;
use App\Caretaker;
use App\Consumer;
use Illuminate\Http\Request;
use Auth;
use Session;
use URL;
class MedicationController extends Controller
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
//        return URL::previous();
        if (Session::has('check_consumer_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName()=='consumer.edit'  || Session::has('check_consumer_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName()=='consumer.show') {
            $consumer_id = Session::get('check_consumer_detail_session')['consumer_id'];
            $model = str_slug('medication','-');
            if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
                $keyword = $request->get('search');
                $perPage = 25;

                if (!empty($keyword)) {
                    $medication = Medication::where('consumer_id',$consumer_id)->where('consumer_id', 'LIKE', "%$keyword%")
                    ->orWhere('medication', 'LIKE', "%$keyword%")
                    ->orWhere('frequency_taken', 'LIKE', "%$keyword%")
                    ->orWhere('start_date', 'LIKE', "%$keyword%")
                    ->orWhere('end_date', 'LIKE', "%$keyword%")
                    ->orWhere('added_by', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
                } else {
                    $medication = Medication::where('consumer_id',$consumer_id)->paginate($perPage);
                }//end if else.
                return view('medication.medication.index', compact('medication'));
            }
        }else{
            $model = str_slug('medication','-');
            if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
                $keyword = $request->get('search');
                $perPage = 25;

                if (!empty($keyword)) {
                    $medication = Medication::where('consumer_id', 'LIKE', "%$keyword%")
                    ->orWhere('medication', 'LIKE', "%$keyword%")
                    ->orWhere('frequency_taken', 'LIKE', "%$keyword%")
                    ->orWhere('start_date', 'LIKE', "%$keyword%")
                    ->orWhere('end_date', 'LIKE', "%$keyword%")
                    ->orWhere('added_by', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
                } else {
                    $medication = Medication::paginate($perPage);
                }//end if else.
                return view('medication.medication.index', compact('medication'));
            }//end if else.
        }//end if else.
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('medication','-');
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
            }//end if else.

            if($is_company){
               $consumers = Consumer::where('company_id',$company->id)->get();
            }else{
                $consumers = Consumer::where('company_id',$company->company_id)->get();
            }//end if else.
            return view('medication.medication.create',compact('consumers'));
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
        $model = str_slug('medication','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if (auth()->user()->hasrole('company')){
                $requestData['added_by'] = Auth::user()->getCompanyDetail->id;
            }elseif(auth()->user()->hasrole('manager')){
                $requestData['added_by'] = Auth::user()->getManagerDetail->company_id;
            }else{
                $requestData['added_by'] = Auth::user()->getCaretakerDetail->company_id;
            }
            Medication::create($requestData);
            return redirect('medication/medication')->with('flash_message', 'Medication added!');
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
        $model = str_slug('medication','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $medication = Medication::findOrFail($id);
            return view('medication.medication.show', compact('medication'));
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
        $model = str_slug('medication','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $medication = Medication::findOrFail($id);
            $user_id                = Auth::user()->id;
            $company                =  Company::where('user_id',$user_id)->first(); 
            if (!$company) {
                $company                =  Manager::where('user_id',$user_id)->first(); 
            }if (!$company) {
                $company                =  Caretaker::where('user_id',$user_id)->first(); 
            }//end if else.
            if(auth()->user()->hasrole('company')){
            $consumers = Consumer::where('company_id',$company->id)->get();
            }else{
            $consumers = Consumer::where('company_id',$company->company_id)->get();
            }


            return view('medication.medication.edit', compact('medication','consumers'));
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
        $model = str_slug('medication','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $medication = Medication::findOrFail($id);
             $medication->update($requestData);

             return redirect('medication/medication')->with('flash_message', 'Medication updated!');
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
        $model = str_slug('medication','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Medication::destroy($id);

            return redirect('medication/medication')->with('flash_message', 'Medication deleted!');
        }
        return response(view('403'), 403);

    }
}
