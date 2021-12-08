<?php

namespace App\Http\Controllers\RentSource;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\RentSource;
use Illuminate\Http\Request;

class RentSourceController extends Controller
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
        $model = str_slug('rentsource','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $rentsource = RentSource::where('name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $rentsource = RentSource::paginate($perPage);
            }

            return view('rentSource.rent-source.index', compact('rentsource'));
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
        $model = str_slug('rentsource','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('rentSource.rent-source.create');
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
        $model = str_slug('rentsource','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            RentSource::create($requestData);
            return redirect('rentSource/rent-source')->with('flash_message', 'RentSource added!');
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
        $model = str_slug('rentsource','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $rentsource = RentSource::findOrFail($id);
            return view('rentSource.rent-source.show', compact('rentsource'));
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
        $model = str_slug('rentsource','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $rentsource = RentSource::findOrFail($id);
            return view('rentSource.rent-source.edit', compact('rentsource'));
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
        $model = str_slug('rentsource','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $rentsource = RentSource::findOrFail($id);
             $rentsource->update($requestData);

             return redirect('rentSource/rent-source')->with('flash_message', 'RentSource updated!');
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
        $model = str_slug('rentsource','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            RentSource::destroy($id);

            return redirect('rentSource/rent-source')->with('flash_message', 'RentSource deleted!');
        }
        return response(view('403'), 403);

    }
}
