<?php

namespace App\Http\Controllers\CharterType;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CharterType;
use Illuminate\Http\Request;

class CharterTypeController extends Controller
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
        $model = str_slug('chartertype','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $chartertype = CharterType::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $chartertype = CharterType::paginate($perPage);
            }

            return view('chartertype.charter-type.index', compact('chartertype'));
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
        $model = str_slug('chartertype','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('chartertype.charter-type.create');
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
        $model = str_slug('chartertype','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            CharterType::create($requestData);
            return redirect('chartertype/charter-type')->with('flash_message', 'CharterType added!');
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
        $model = str_slug('chartertype','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $chartertype = CharterType::findOrFail($id);
            return view('chartertype.charter-type.show', compact('chartertype'));
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
        $model = str_slug('chartertype','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $chartertype = CharterType::findOrFail($id);
            return view('chartertype.charter-type.edit', compact('chartertype'));
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
        $model = str_slug('chartertype','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $chartertype = CharterType::findOrFail($id);
             $chartertype->update($requestData);

             return redirect('chartertype/charter-type')->with('flash_message', 'CharterType updated!');
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
        $model = str_slug('chartertype','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CharterType::destroy($id);

            return redirect('chartertype/charter-type')->with('flash_message', 'CharterType deleted!');
        }
        return response(view('403'), 403);

    }
}
