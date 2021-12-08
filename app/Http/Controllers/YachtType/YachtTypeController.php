<?php

namespace App\Http\Controllers\YachtType;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\YachtType;
use Illuminate\Http\Request;

class YachtTypeController extends Controller
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
        $model = str_slug('yachttype','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $yachttype = YachtType::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $yachttype = YachtType::paginate($perPage);
            }

            return view('yachttype.yacht-type.index', compact('yachttype'));
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
        $model = str_slug('yachttype','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('yachttype.yacht-type.create');
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
        $model = str_slug('yachttype','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            YachtType::create($requestData);
            return redirect('YachtType/yacht-type')->with('flash_message', 'YachtType added!');
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
        $model = str_slug('yachttype','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $yachttype = YachtType::findOrFail($id);
            return view('yachttype.yacht-type.show', compact('yachttype'));
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
        $model = str_slug('yachttype','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $yachttype = YachtType::findOrFail($id);
            return view('yachttype.yacht-type.edit', compact('yachttype'));
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
        $model = str_slug('yachttype','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $yachttype = YachtType::findOrFail($id);
             $yachttype->update($requestData);

             return redirect('YachtType/yacht-type')->with('flash_message', 'YachtType updated!');
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
        $model = str_slug('yachttype','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            YachtType::destroy($id);

            return redirect('YachtType/yacht-type')->with('flash_message', 'YachtType deleted!');
        }
        return response(view('403'), 403);

    }
}
