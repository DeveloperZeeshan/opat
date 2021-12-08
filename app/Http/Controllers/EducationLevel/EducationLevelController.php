<?php

namespace App\Http\Controllers\EducationLevel;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
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
        $model = str_slug('educationlevel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $educationlevel = EducationLevel::where('name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $educationlevel = EducationLevel::paginate($perPage);
            }

            return view('educationLevel.education-level.index', compact('educationlevel'));
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
        $model = str_slug('educationlevel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('educationLevel.education-level.create');
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
        $model = str_slug('educationlevel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            EducationLevel::create($requestData);
            return redirect('educationLevel/education-level')->with('flash_message', 'EducationLevel added!');
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
        $model = str_slug('educationlevel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $educationlevel = EducationLevel::findOrFail($id);
            return view('educationLevel.education-level.show', compact('educationlevel'));
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
        $model = str_slug('educationlevel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $educationlevel = EducationLevel::findOrFail($id);
            return view('educationLevel.education-level.edit', compact('educationlevel'));
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
        $model = str_slug('educationlevel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $educationlevel = EducationLevel::findOrFail($id);
             $educationlevel->update($requestData);

             return redirect('educationLevel/education-level')->with('flash_message', 'EducationLevel updated!');
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
        $model = str_slug('educationlevel','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            EducationLevel::destroy($id);

            return redirect('educationLevel/education-level')->with('flash_message', 'EducationLevel deleted!');
        }
        return response(view('403'), 403);

    }
}
