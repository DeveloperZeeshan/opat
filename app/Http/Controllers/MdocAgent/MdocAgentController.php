<?php

namespace App\Http\Controllers\MdocAgent;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MdocAgent;
use Illuminate\Http\Request;

class MdocAgentController extends Controller
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
        $model = str_slug('mdocagent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $mdocagent = MdocAgent::where('name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $mdocagent = MdocAgent::paginate($perPage);
            }

            return view('mdocAgent.mdoc-agent.index', compact('mdocagent'));
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
        $model = str_slug('mdocagent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('mdocAgent.mdoc-agent.create');
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
        $model = str_slug('mdocagent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            MdocAgent::create($requestData);
            return redirect('mdocAgent/mdoc-agent')->with('flash_message', 'MdocAgent added!');
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
        $model = str_slug('mdocagent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $mdocagent = MdocAgent::findOrFail($id);
            return view('mdocAgent.mdoc-agent.show', compact('mdocagent'));
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
        $model = str_slug('mdocagent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $mdocagent = MdocAgent::findOrFail($id);
            return view('mdocAgent.mdoc-agent.edit', compact('mdocagent'));
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
        $model = str_slug('mdocagent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $mdocagent = MdocAgent::findOrFail($id);
             $mdocagent->update($requestData);

             return redirect('mdocAgent/mdoc-agent')->with('flash_message', 'MdocAgent updated!');
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
        $model = str_slug('mdocagent','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            MdocAgent::destroy($id);

            return redirect('mdocAgent/mdoc-agent')->with('flash_message', 'MdocAgent deleted!');
        }
        return response(view('403'), 403);

    }
}
