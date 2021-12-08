<?php

namespace App\Http\Controllers\JobRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\JobRequest;
use Illuminate\Http\Request;

class JobRequestController extends Controller
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
        $model = str_slug('jobrequest','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $jobrequest = JobRequest::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('job_id', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->orWhere('notes', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $jobrequest = JobRequest::paginate($perPage);
            }

            return view('jobRequest.job-request.index', compact('jobrequest'));
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
        $model = str_slug('jobrequest','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('jobRequest.job-request.create');
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
        $model = str_slug('jobrequest','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            JobRequest::create($requestData);
            return redirect('jobRequest/job-request')->with('flash_message', 'JobRequest added!');
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
        $model = str_slug('jobrequest','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $jobrequest = JobRequest::findOrFail($id);
            return view('jobRequest.job-request.show', compact('jobrequest'));
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
        $model = str_slug('jobrequest','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $jobrequest = JobRequest::findOrFail($id);
            return view('jobRequest.job-request.edit', compact('jobrequest'));
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
        $model = str_slug('jobrequest','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $jobrequest = JobRequest::findOrFail($id);
             $jobrequest->update($requestData);

             return redirect('jobRequest/job-request')->with('flash_message', 'JobRequest updated!');
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
        $model = str_slug('jobrequest','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            JobRequest::destroy($id);

            return redirect('jobRequest/job-request')->with('flash_message', 'JobRequest deleted!');
        }
        return response(view('403'), 403);

    }
}
