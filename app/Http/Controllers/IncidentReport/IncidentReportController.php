<?php

namespace App\Http\Controllers\IncidentReport;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\IncidentReport;
use Illuminate\Http\Request;
use Session;
use URL;
use Auth;
use App\Company;
use App\Manager;
use App\Caretaker;
use App\Consumer;
class IncidentReportController extends Controller
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

        //used for index page ....
        /*if (Session::has('check_consumer_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName()=='consumer.index') {*/
        if (Session::has('check_consumer_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName()=='consumer.edit' || Session::has('check_consumer_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName()=='consumer.show') {
            $consumer_id = Session::get('check_consumer_detail_session')['consumer_id'];                        
            $model = str_slug('incidentreport','-');
            if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
                $keyword = $request->get('search');
                $perPage = 25;

                if (!empty($keyword)) {
                    $incidentreport = IncidentReport::where('consumer_id',$consumer_id)->where('consumer_id', 'LIKE', "%$keyword%")
                    ->orWhere('nature_of_incident', 'LIKE', "%$keyword%")
                    ->orWhere('incident_detail', 'LIKE', "%$keyword%")
                    ->orWhere('additional_notes', 'LIKE', "%$keyword%")
                    ->orWhere('incident_date', 'LIKE', "%$keyword%")
                    ->orWhere('report_created_by', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
                } else {
                    $incidentreport = IncidentReport::where('consumer_id',$consumer_id)->paginate($perPage);
                }

                return view('incidentReport.incident-report.index', compact('incidentreport'));
            } 
        }else{
            $model = str_slug('incidentreport','-');            
            if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
                $keyword = $request->get('search');
                $perPage = 25;

                if (!empty($keyword)) {
                    $incidentreport = IncidentReport::where('consumer_id', 'LIKE', "%$keyword%")
                    ->orWhere('nature_of_incident', 'LIKE', "%$keyword%")
                    ->orWhere('incident_detail', 'LIKE', "%$keyword%")
                    ->orWhere('additional_notes', 'LIKE', "%$keyword%")
                    ->orWhere('incident_date', 'LIKE', "%$keyword%")
                    ->orWhere('report_created_by', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
                } else {
                    $incidentreport = IncidentReport::paginate($perPage);
                }

                return view('incidentReport.incident-report.index', compact('incidentreport'));
            }
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
        $model = str_slug('incidentreport','-');
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
            return view('incidentReport.incident-report.create',compact('consumers'));
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
        $model = str_slug('incidentreport','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if (auth()->user()->hasrole('company')){
                $requestData['report_created_by'] = Auth::user()->getCompanyDetail->id;
            }elseif(auth()->user()->hasrole('manager')){
               $requestData['report_created_by'] = Auth::user()->getManagerDetail->company_id;
            }else{
                $requestData['report_created_by'] = Auth::user()->getCaretakerDetail->company_id;
            }
            IncidentReport::create($requestData);
            return redirect('incidentReport/incident-report')->with('flash_message', 'IncidentReport added!');
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
        $model = str_slug('incidentreport','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $incidentreport = IncidentReport::findOrFail($id);
            return view('incidentReport.incident-report.show', compact('incidentreport'));
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
        $model = str_slug('incidentreport','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $incidentreport = IncidentReport::findOrFail($id);
            $user_id                = Auth::user()->id;
            $company                =  Company::where('user_id',$user_id)->first(); 
            if (!$company) {
                $company                =  Manager::where('user_id',$user_id)->first(); 
            }if (!$company) {
                $company                =  Caretaker::where('user_id',$user_id)->first(); 
            }//end if else.
            if(auth()->user()->hasrole('company')) {
                $consumers = Consumer::where('company_id', $company->id)->get();
            }else{
                $consumers = Consumer::where('company_id', $company->company_id)->get();
            }
            return view('incidentReport.incident-report.edit', compact('incidentreport','consumers'));
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
        $model = str_slug('incidentreport','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $incidentreport = IncidentReport::findOrFail($id);
             $incidentreport->update($requestData);

             return redirect('incidentReport/incident-report')->with('flash_message', 'IncidentReport updated!');
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
        $model = str_slug('incidentreport','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            IncidentReport::destroy($id);

            return redirect('incidentReport/incident-report')->with('flash_message', 'IncidentReport deleted!');
        }
        return response(view('403'), 403);

    }
}
