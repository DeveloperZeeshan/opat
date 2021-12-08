<?php

namespace App\Http\Controllers\CognitivePsycological;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Session;
use App\Consumer;
use Auth;
use App\CognitivePsycological;
use Illuminate\Http\Request;

class CognitivePsycologicalController extends Controller
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
//        if (Session::has('check_transport_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'transport-tracker.index') {
//            $consumer_id = Session::get('check_transport_detail_session')['transport_id'];}
//            $transporttracker = TransportTracker::where('consumer_id',$consumer_id)->paginate(10);
//            return view('transportTracker.transport-tracker.sub_index', compact('transporttracker'));
        $model = str_slug('cognitivepsycological','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $cognitivepsycological = CognitivePsycological::where('memory_problem', 'LIKE', "%$keyword%")
                ->orWhere('perception', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%")
                ->orWhere('critical_thinking', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $cognitive_session_id = Session::get('cognitive_session_id');
                $consumer = Consumer::find($cognitive_session_id);
                $cognitivepsycological = CognitivePsycological::where('consumer_id',$consumer->id)->paginate($perPage);
            }

            return view('cognitivePsycological.cognitive-psycological.index', compact('cognitivepsycological'));
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
        $model = str_slug('cognitivepsycological','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $cognitive_session_id = Session::get('cognitive_session_id');
            $consumer = Consumer::find($cognitive_session_id);
            return view('cognitivePsycological.cognitive-psycological.create',compact('consumer'));
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
        $model = str_slug('cognitivepsycological','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $requestData = $request->all();
            $requestData['added_by']= Auth::id();
            CognitivePsycological::create($requestData);
            return redirect('cognitivePsycological/cognitive-psycological')->with('flash_message', 'CognitivePsycological added!');
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
        $model = str_slug('cognitivepsycological','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $cognitivepsycological = CognitivePsycological::findOrFail($id);
            return view('cognitivePsycological.cognitive-psycological.show', compact('cognitivepsycological'));
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
        $model = str_slug('cognitivepsycological','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $cognitivepsycological = CognitivePsycological::findOrFail($id);
            return view('cognitivePsycological.cognitive-psycological.edit', compact('cognitivepsycological'));
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
        $model = str_slug('cognitivepsycological','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $cognitivepsycological = CognitivePsycological::findOrFail($id);
             $cognitivepsycological->update($requestData);

             return redirect('cognitivePsycological/cognitive-psycological')->with('flash_message', 'CognitivePsycological updated!');
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
        $model = str_slug('cognitivepsycological','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CognitivePsycological::destroy($id);

            return redirect('cognitivePsycological/cognitive-psycological')->with('flash_message', 'CognitivePsycological deleted!');
        }
        return response(view('403'), 403);

    }
}
