<?php

namespace App\Http\Controllers\ProvidesYourCare;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ProvidesYourCare;
use Illuminate\Http\Request;
use Storage;

class ProvidesYourCareController extends Controller
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
        $model = str_slug('providesyourcare','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $providesyourcare = ProvidesYourCare::where('image', 'LIKE', "%$keyword%")
                ->orWhere('number', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('heading', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $providesyourcare = ProvidesYourCare::paginate($perPage);
            }

            return view('providesYourCare.provides-your-care.index', compact('providesyourcare'));
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
        $model = str_slug('providesyourcare','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('providesYourCare.provides-your-care.create');
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
        $model = str_slug('providesyourcare','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }

            ProvidesYourCare::create($requestData);
            return redirect('providesYourCare/provides-your-care')->with('flash_message', 'ProvidesYourCare added!');
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
        $model = str_slug('providesyourcare','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $providesyourcare = ProvidesYourCare::findOrFail($id);
            return view('providesYourCare.provides-your-care.show', compact('providesyourcare'));
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
        $model = str_slug('providesyourcare','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $providesyourcare = ProvidesYourCare::findOrFail($id);
            return view('providesYourCare.provides-your-care.edit', compact('providesyourcare'));
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
        $model = str_slug('providesyourcare','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }

            $providesyourcare = ProvidesYourCare::findOrFail($id);
             $providesyourcare->update($requestData);

             return redirect('providesYourCare/provides-your-care')->with('flash_message', 'ProvidesYourCare updated!');
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
        $model = str_slug('providesyourcare','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ProvidesYourCare::destroy($id);

            return redirect('providesYourCare/provides-your-care')->with('flash_message', 'ProvidesYourCare deleted!');
        }
        return response(view('403'), 403);

    }
}
