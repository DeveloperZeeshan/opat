<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Job;
use App\Location;
use App\Department;
use App\JobType;
use Illuminate\Http\Request;

class JobController extends Controller
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
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $job = Job::where('title', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('department', 'LIKE', "%$keyword%")
                ->orWhere('jobType', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $job = Job::paginate($perPage);
            }

            return view('job.job.index', compact('job'));
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
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $cities = Location::where('status',1)->get();
            $departments = Department::where('status',1)->get();
            $jobTypes = JobType::where('status',1)->get();
            return view('job.job.create',compact('cities','departments','jobTypes'));
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
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required',
			
		]);
            $requestData['title'] = $request->title;
            $requestData['user_id'] = Auth()->id();
            $requestData['location'] = $request->location;
            $requestData['description'] = $request->description;
            $requestData['city_id'] = $request->city_id;
            $requestData['department_id'] = $request->department_id;
            $requestData['job_type_id'] = $request->job_type_id;
            $requestData['status'] = $request->status;
            Job::create($requestData);
            return redirect('job/job')->with('flash_message', 'Job added!');
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
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $job = Job::findOrFail($id);
            return view('job.job.show', compact('job'));
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
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
             $cities = Location::where('status',1)->get();
            $departments = Department::where('status',1)->get();
            $jobTypes = JobType::where('status',1)->get();
            $job = Job::findOrFail($id);
            return view('job.job.edit', compact('job','cities','departments','jobTypes'));
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
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required',
			
		]);
            $requestData = $request->all();
            
            $job = Job::findOrFail($id);
             $job->update($requestData);

             return redirect('job/job')->with('flash_message', 'Job updated!');
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
        $model = str_slug('job','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Job::destroy($id);

            return redirect('job/job')->with('flash_message', 'Job deleted!');
        }
        return response(view('403'), 403);

    }
}
