<?php

namespace App\Http\Controllers\SocialServiceEligibility;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\SocialService;
use Session;
use App\Consumer;
use App\SocialServiceEligibility;
use Illuminate\Http\Request;

class SocialServiceEligibilityController extends Controller
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
        $model = str_slug('socialserviceeligibility','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $socialserviceeligibility = SocialServiceEligibility::where('consumer_name', 'LIKE', "%$keyword%")
                ->orWhere('eligibility', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $service_session_id = Session::get('service_session_id');
                $consumer = Consumer::find($service_session_id);
                $socialserviceeligibility = SocialServiceEligibility::where('consumer_id',$consumer->user_id)->paginate($perPage);
            }

            return view('socialServiceEligibility.social-service-eligibility.index', compact('socialserviceeligibility'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('socialserviceeligibility','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $service_session_id = Session::get('service_session_id');
            $consumer = Consumer::find($service_session_id);
            $service =  SocialService::all();
            return view('socialServiceEligibility.social-service-eligibility.create',compact('service','consumer'));
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
        $model = str_slug('socialserviceeligibility','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $requestData['eligibility'] = implode(",", $request->eligibility);

            SocialServiceEligibility::create($requestData);
            return redirect('socialServiceEligibility/social-service-eligibility')->with('flash_message', 'SocialServiceEligibility added!');
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
        $model = str_slug('socialserviceeligibility','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $socialserviceeligibility = SocialServiceEligibility::findOrFail($id);
            return view('socialServiceEligibility.social-service-eligibility.show', compact('socialserviceeligibility'));
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
        $model = str_slug('socialserviceeligibility','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $socialserviceeligibility = SocialServiceEligibility::findOrFail($id);
            $service =  SocialService::all();
            return view('socialServiceEligibility.social-service-eligibility.edit', compact('socialserviceeligibility','service'));
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
        $model = str_slug('socialserviceeligibility','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $socialserviceeligibility = SocialServiceEligibility::findOrFail($id);
             $socialserviceeligibility->update($requestData);

             return redirect('socialServiceEligibility/social-service-eligibility')->with('flash_message', 'SocialServiceEligibility updated!');
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
        $model = str_slug('socialserviceeligibility','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SocialServiceEligibility::destroy($id);

            return redirect('socialServiceEligibility/social-service-eligibility')->with('flash_message', 'SocialServiceEligibility deleted!');
        }
        return response(view('403'), 403);

    }
}
