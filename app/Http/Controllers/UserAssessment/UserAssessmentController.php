<?php

namespace App\Http\Controllers\UserAssessment;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\UserAssessment;
use Illuminate\Http\Request;

class UserAssessmentController extends Controller
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
        $model = str_slug('userassessment','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $userassessment = UserAssessment::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('company_id', 'LIKE', "%$keyword%")
                ->orWhere('caretaker_id', 'LIKE', "%$keyword%")
                ->orWhere('quiz_id', 'LIKE', "%$keyword%")
                ->orWhere('answer', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $userassessment = UserAssessment::paginate($perPage);
            }

            return view('userAssessment.user-assessment.index', compact('userassessment'));
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
        $model = str_slug('userassessment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('userAssessment.user-assessment.create');
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
        $model = str_slug('userassessment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            UserAssessment::create($requestData);
            return redirect('userAssessment/user-assessment')->with('flash_message', 'UserAssessment added!');
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
        $model = str_slug('userassessment','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $userassessment = UserAssessment::findOrFail($id);
            return view('userAssessment.user-assessment.show', compact('userassessment'));
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
        $model = str_slug('userassessment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $userassessment = UserAssessment::findOrFail($id);
            return view('userAssessment.user-assessment.edit', compact('userassessment'));
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
        $model = str_slug('userassessment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $userassessment = UserAssessment::findOrFail($id);
             $userassessment->update($requestData);

             return redirect('userAssessment/user-assessment')->with('flash_message', 'UserAssessment updated!');
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
        $model = str_slug('userassessment','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            UserAssessment::destroy($id);

            return redirect('userAssessment/user-assessment')->with('flash_message', 'UserAssessment deleted!');
        }
        return response(view('403'), 403);

    }
}
