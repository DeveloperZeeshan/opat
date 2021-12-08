<?php

namespace App\Http\Controllers\OurSolution;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\OurSolution;
use Illuminate\Http\Request;
use Storage;

class OurSolutionController extends Controller
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
        $model = str_slug('oursolution','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $oursolution = OurSolution::where('image', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $oursolution = OurSolution::paginate($perPage);
            }

            return view('ourSolution.our-solution.index', compact('oursolution'));
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
        $model = str_slug('oursolution','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('ourSolution.our-solution.create');
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
        $model = str_slug('oursolution','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
           if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }

            OurSolution::create($requestData);
            return redirect('ourSolution/our-solution')->with('flash_message', 'OurSolution added!');
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
        $model = str_slug('oursolution','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $oursolution = OurSolution::findOrFail($id);
            return view('ourSolution.our-solution.show', compact('oursolution'));
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
        $model = str_slug('oursolution','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $oursolution = OurSolution::findOrFail($id);
            return view('ourSolution.our-solution.edit', compact('oursolution'));
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
        $model = str_slug('oursolution','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
              if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }


            $oursolution = OurSolution::findOrFail($id);
             $oursolution->update($requestData);

             return redirect('ourSolution/our-solution')->with('flash_message', 'OurSolution updated!');
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
        $model = str_slug('oursolution','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            OurSolution::destroy($id);

            return redirect('ourSolution/our-solution')->with('flash_message', 'OurSolution deleted!');
        }
        return response(view('403'), 403);

    }
}
