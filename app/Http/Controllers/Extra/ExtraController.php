<?php

namespace App\Http\Controllers\Extra;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Extra;
use Illuminate\Http\Request;

class ExtraController extends Controller
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
        $model = str_slug('extra','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $extra = Extra::where('name', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $extra = Extra::paginate($perPage);
            }

            return view('extra.extra.index', compact('extra'));
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
        $model = str_slug('extra','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('extra.extra.create');
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
        $model = str_slug('extra','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'price' => 'required'
		]);
            $requestData = $request->all();
            
            Extra::create($requestData);
            return redirect('extra/extra')->with('flash_message', 'Extra added!');
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
        $model = str_slug('extra','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $extra = Extra::findOrFail($id);
            return view('extra.extra.show', compact('extra'));
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
        $model = str_slug('extra','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $extra = Extra::findOrFail($id);
            return view('extra.extra.edit', compact('extra'));
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
        $model = str_slug('extra','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'price' => 'required'
		]);
            $requestData = $request->all();
            
            $extra = Extra::findOrFail($id);
             $extra->update($requestData);

             return redirect('extra/extra')->with('flash_message', 'Extra updated!');
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
        $model = str_slug('extra','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Extra::destroy($id);

            return redirect('extra/extra')->with('flash_message', 'Extra deleted!');
        }
        return response(view('403'), 403);

    }
}
