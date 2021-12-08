<?php

namespace App\Http\Controllers\AffordableCare;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AffordableCare;
use Illuminate\Http\Request;
use Storage;

class AffordableCareController extends Controller
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
        $model = str_slug('affordablecare','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $affordablecare = AffordableCare::where('image', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $affordablecare = AffordableCare::paginate($perPage);
            }

            return view('affordableCare.affordable-care.index', compact('affordablecare'));
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
        $model = str_slug('affordablecare','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('affordableCare.affordable-care.create');
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
        $model = str_slug('affordablecare','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }

            AffordableCare::create($requestData);
            return redirect('affordableCare/affordable-care')->with('flash_message', 'AffordableCare added!');
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
        $model = str_slug('affordablecare','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $affordablecare = AffordableCare::findOrFail($id);
            return view('affordableCare.affordable-care.show', compact('affordablecare'));
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
        $model = str_slug('affordablecare','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $affordablecare = AffordableCare::findOrFail($id);
            return view('affordableCare.affordable-care.edit', compact('affordablecare'));
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
        $model = str_slug('affordablecare','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }

            $affordablecare = AffordableCare::findOrFail($id);
             $affordablecare->update($requestData);

             return redirect('affordableCare/affordable-care')->with('flash_message', 'AffordableCare updated!');
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
        $model = str_slug('affordablecare','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            AffordableCare::destroy($id);

            return redirect('affordableCare/affordable-care')->with('flash_message', 'AffordableCare deleted!');
        }
        return response(view('403'), 403);

    }
}
