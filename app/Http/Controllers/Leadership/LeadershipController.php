<?php

namespace App\Http\Controllers\Leadership;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Leadership;
use Illuminate\Http\Request;
use Storage;

class LeadershipController extends Controller
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
        $model = str_slug('leadership','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $leadership = Leadership::where('image', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('designation', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $leadership = Leadership::paginate($perPage);
            }

            return view('leadership.leadership.index', compact('leadership'));
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
        $model = str_slug('leadership','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('leadership.leadership.create');
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
        $model = str_slug('leadership','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }
            Leadership::create($requestData);
            return redirect('leadership/leadership')->with('flash_message', 'Leadership added!');
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
        $model = str_slug('leadership','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $leadership = Leadership::findOrFail($id);
            return view('leadership.leadership.show', compact('leadership'));
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
        $model = str_slug('leadership','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $leadership = Leadership::findOrFail($id);
            return view('leadership.leadership.edit', compact('leadership'));
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
        $model = str_slug('leadership','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }
            $leadership = Leadership::findOrFail($id);
             $leadership->update($requestData);

             return redirect('leadership/leadership')->with('flash_message', 'Leadership updated!');
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
        $model = str_slug('leadership','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Leadership::destroy($id);

            return redirect('leadership/leadership')->with('flash_message', 'Leadership deleted!');
        }
        return response(view('403'), 403);

    }
}
