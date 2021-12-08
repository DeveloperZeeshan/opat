<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Resource;
use Illuminate\Http\Request;
use Storage;

class ResourceController extends Controller
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
        $model = str_slug('resource','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $resource = Resource::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $resource = Resource::paginate($perPage);
            }

            return view('resource.resource.index', compact('resource'));
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
        $model = str_slug('resource','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('resource.resource.create');
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
        $model = str_slug('resource','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }

            Resource::create($requestData);
            return redirect('resource/resource')->with('flash_message', 'Resource added!');
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
        $model = str_slug('resource','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $resource = Resource::findOrFail($id);
            return view('resource.resource.show', compact('resource'));
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
        $model = str_slug('resource','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $resource = Resource::findOrFail($id);
            return view('resource.resource.edit', compact('resource'));
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
        $model = str_slug('resource','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }
            $resource = Resource::findOrFail($id);
             $resource->update($requestData);

             return redirect('resource/resource')->with('flash_message', 'Resource updated!');
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
        $model = str_slug('resource','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Resource::destroy($id);

            return redirect('resource/resource')->with('flash_message', 'Resource deleted!');
        }
        return response(view('403'), 403);

    }
}
