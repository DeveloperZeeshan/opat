<?php

namespace App\Http\Controllers\Period;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
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
        $model = str_slug('period','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null ||true) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $period = Period::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $period = Period::paginate($perPage);
            }

            return view('period.period.index', compact('period'));
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
        $model = str_slug('period','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null ||true) {
            return view('period.period.create');
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
        $model = str_slug('period','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null ||true) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            Period::create($requestData);
            return redirect('Period/period')->with('flash_message', 'Period added!');
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
        $model = str_slug('period','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null ||true) {
            $period = Period::findOrFail($id);
            return view('period.period.show', compact('period'));
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
        $model = str_slug('period','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null ||true) {
            $period = Period::findOrFail($id);
            return view('period.period.edit', compact('period'));
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
        $model = str_slug('period','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null ||true) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $period = Period::findOrFail($id);
             $period->update($requestData);

             return redirect('Period/period')->with('flash_message', 'Period updated!');
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
        $model = str_slug('period','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null ||true) {
            Period::destroy($id);

            return redirect('Period/period')->with('flash_message', 'Period deleted!');
        }
        return response(view('403'), 403);

    }
}
