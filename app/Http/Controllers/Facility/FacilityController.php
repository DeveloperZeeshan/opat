<?php

namespace App\Http\Controllers\Facility;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Facility;
use Illuminate\Http\Request;
use App\Company;
use App\Manager;
use Auth;
class FacilityController extends Controller
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
        $model = str_slug('facility','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;
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

            if (!empty($keyword)) {
                $facility = Facility::where('company_id',$company->id)->where('name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->orWhere('zip_code', 'LIKE', "%$keyword%")
                ->orWhere('number_of_beds', 'LIKE', "%$keyword%")
                ->orWhere('rent_amount', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('fax', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                if($is_company){
                    $facility = Facility::where('company_id',$company->id)->paginate($perPage);
                }else{
                    $facility = Facility::where('company_id',$company->company_id)->paginate($perPage);
                }//end if else.
            }

            return view('facility.facility.index', compact('facility'));
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
        $model = str_slug('facility','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('facility.facility.create');
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
        $model = str_slug('facility','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'address' => 'required',
		]);
            $requestData = $request->all();
            
            Facility::create($requestData);
            return redirect('facility/facility')->with('flash_message', 'Facility added!');
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
        $model = str_slug('facility','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $facility = Facility::findOrFail($id);
            return view('facility.facility.show', compact('facility'));
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
        $model = str_slug('facility','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $facility = Facility::findOrFail($id);
            return view('facility.facility.edit', compact('facility'));
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
        $model = str_slug('facility','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'address' => 'required',
		]);
            $requestData = $request->all();
            
            $facility = Facility::findOrFail($id);
             $facility->update($requestData);

             return redirect('facility/facility')->with('flash_message', 'Facility updated!');
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
        $model = str_slug('facility','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Facility::destroy($id);

            return redirect('facility/facility')->with('flash_message', 'Facility deleted!');
        }
        return response(view('403'), 403);

    }
}
