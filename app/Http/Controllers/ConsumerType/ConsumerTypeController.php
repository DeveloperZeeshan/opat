<?php

namespace App\Http\Controllers\ConsumerType;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ConsumerType;
use Illuminate\Http\Request;

class ConsumerTypeController extends Controller
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
        $model = str_slug('consumertype','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $consumertype = ConsumerType::where('name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $consumertype = ConsumerType::paginate($perPage);
            }

            return view('consumerType.consumer-type.index', compact('consumertype'));
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
        $model = str_slug('consumertype','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('consumerType.consumer-type.create');
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
        $model = str_slug('consumertype','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            ConsumerType::create($requestData);
            return redirect('consumerType/consumer-type')->with('flash_message', 'ConsumerType added!');
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
        $model = str_slug('consumertype','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $consumertype = ConsumerType::findOrFail($id);
            return view('consumerType.consumer-type.show', compact('consumertype'));
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
        $model = str_slug('consumertype','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $consumertype = ConsumerType::findOrFail($id);
            return view('consumerType.consumer-type.edit', compact('consumertype'));
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
        $model = str_slug('consumertype','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $consumertype = ConsumerType::findOrFail($id);
             $consumertype->update($requestData);

             return redirect('consumerType/consumer-type')->with('flash_message', 'ConsumerType updated!');
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
        $model = str_slug('consumertype','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ConsumerType::destroy($id);

            return redirect('consumerType/consumer-type')->with('flash_message', 'ConsumerType deleted!');
        }
        return response(view('403'), 403);

    }
}
