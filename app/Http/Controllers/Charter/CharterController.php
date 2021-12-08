<?php

namespace App\Http\Controllers\Charter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Charter;
use App\Yacht;
use App\Client;
use App\Agent;
use App\Extra;
use Illuminate\Http\Request;

class CharterController extends Controller
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
        $model = str_slug('charter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $charter = Charter::where('charter_code', 'LIKE', "%$keyword%")
                ->orWhere('yacht_id', 'LIKE', "%$keyword%")
                ->orWhere('from_to_date', 'LIKE', "%$keyword%")
                ->orWhere('from_to_marin', 'LIKE', "%$keyword%")
                ->orWhere('charter_price', 'LIKE', "%$keyword%")
                ->orWhere('client_id', 'LIKE', "%$keyword%")
                ->orWhere('agent_id', 'LIKE', "%$keyword%")
                ->orWhere('extra_id', 'LIKE', "%$keyword%")
                ->orWhere('extra_price', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $charter = Charter::paginate($perPage);
            }
            return view('charter.charter.index', compact('charter'));
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
        $model = str_slug('charter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $yachts  = Yacht::where('status','active')->get();
            $clients = Client::where('status','active')->get();
            $agents  = Agent::where('status','active')->get();
            $extras  = Extra::where('status','active')->get();
            return view('charter.charter.create',compact('yachts','clients','agents','extras'));
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
    public function store(Request $request){
        $model = str_slug('charter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			 'charter_code' => 'required',
			 'yacht_id' => 'required',
			 'from_to_date' => 'required',
			 'client_id' => 'required',
			 // 'agent_id' => 'required',
            ]);
            extract($request->all());
            $requestData = ['charter_code'=>$charter_code,'yacht_model'=>$yacht_model,'yacht_id'=>$yacht_id,'from_to_date'=>$from_to_date,'from_to_marin'=>$from_to_marin,'charter_price'=>$charter_price,'client_id'=>$client_id,'agent_id'=>json_encode($agent_id),'extra_id'=>json_encode($extra_id),'extra_price'=>$extra_price,'status'=>$status];    
            Charter::create($requestData);
            return redirect('charter/charter')->with('flash_message', 'Charter added!');
        }//end if.
        return response(view('403'), 403);
    }//end store function.

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('charter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $charter = Charter::findOrFail($id);
            return view('charter.charter.show', compact('charter'));
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
        $model = str_slug('charter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $charter = Charter::findOrFail($id);
            $yachts  = Yacht::where('status','active')->get();
            $clients = Client::where('status','active')->get();
            $agents  = Agent::where('status','active')->get();
            $extras  = Extra::where('status','active')->get();
            return view('charter.charter.edit',compact('charter','yachts','clients','agents','extras'));
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
        $model = str_slug('charter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
                'charter_code' => 'required',
                'yacht_id' => 'required',
                'from_to_date' => 'required',
                'client_id' => 'required',
                // 'agent_id' => 'required',
            ]);
            extract($request->all());
            $requestData = ['charter_code'=>$charter_code,'yacht_model'=>$yacht_model,'yacht_id'=>$yacht_id,'from_to_date'=>$from_to_date,'from_to_marin'=>$from_to_marin,'charter_price'=>$charter_price,'client_id'=>$client_id,'agent_id'=>json_encode($agent_id),'extra_id'=>json_encode($extra_id),'extra_price'=>$extra_price,'status'=>$status,'bank_transfer_amount'=>$bank_transfer_amount,'bank_transfer_code'=>$bank_transfer_code,'credit_card'=>$credit_card,'date_of_each_payment'=>$date_of_each_payment];

            $charter = Charter::findOrFail($id);
            $charter->update($requestData);

            return redirect('charter/charter')->with('flash_message', 'Charter updated!');
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
    public function destroy($id,Request $request)
    {
        $model = str_slug('charter','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Charter::destroy($id);
            if(isset($request->page)){
                return back()->with('flash_message', 'Charter deleted!');
            }//end if.
            return redirect('charter/charter')->with('flash_message', 'Charter deleted!');
        }
        return response(view('403'), 403);

    }
}
