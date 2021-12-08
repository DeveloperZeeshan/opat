<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Agent;
use App\Charter;
use Illuminate\Http\Request;

class AgentController extends Controller
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $agent = Agent::where('company_name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('tax_number', 'LIKE', "%$keyword%")
                ->orWhere('tax_office', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone_number', 'LIKE', "%$keyword%")
                ->orWhere('contact_person', 'LIKE', "%$keyword%")
                ->orWhere('notes', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $agent = Agent::paginate($perPage);
            }

            return view('agent.agent.index', compact('agent'));
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('agent.agent.create');
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

        $request->merge([
            'email' => json_encode($request->email),
            'contact_person' => json_encode($request->contact_person),
        ]);
  
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'company_name' => 'required',
			'address' => 'required'
		]);
            $requestData = $request->all();
            
            Agent::create($requestData);
            return redirect('agent/agent')->with('flash_message', 'Agent added!');
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $agent  = Agent::findOrFail($id);
            $charter= Charter::where('client_id',$id)->get(); 
            return view('agent.agent.show', compact('agent','charter'));
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $agent = Agent::findOrFail($id);
            return view('agent.agent.edit', compact('agent'));
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'company_name' => 'required',
			'address' => 'required'
		]);
            $requestData = $request->all();
            
            $agent = Agent::findOrFail($id);
             $agent->update($requestData);

             return redirect('agent/agent')->with('flash_message', 'Agent updated!');
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
        $model = str_slug('agent','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Agent::destroy($id);

            return redirect('agent/agent')->with('flash_message', 'Agent deleted!');
        }
        return response(view('403'), 403);

    }
}
