<?php

namespace App\Http\Controllers\GetQuoteNow;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\GetQuoteNow;
use Illuminate\Http\Request;

class GetQuoteNowController extends Controller
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
        $model = str_slug('getquotenow','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $getquotenow = GetQuoteNow::where('name', 'LIKE', "%$keyword%")
                ->orWhere('number', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $getquotenow = GetQuoteNow::paginate($perPage);
            }

            return view('getQuoteNow.get-quote-now.index', compact('getquotenow'));
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
        $model = str_slug('getquotenow','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('getQuoteNow.get-quote-now.create');
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
        $model = str_slug('getquotenow','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            GetQuoteNow::create($requestData);
            return redirect('getQuoteNow/get-quote-now')->with('flash_message', 'GetQuoteNow added!');
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
        $model = str_slug('getquotenow','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $getquotenow = GetQuoteNow::findOrFail($id);
            return view('getQuoteNow.get-quote-now.show', compact('getquotenow'));
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
        $model = str_slug('getquotenow','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $getquotenow = GetQuoteNow::findOrFail($id);
            return view('getQuoteNow.get-quote-now.edit', compact('getquotenow'));
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
        $model = str_slug('getquotenow','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $getquotenow = GetQuoteNow::findOrFail($id);
             $getquotenow->update($requestData);

             return redirect('getQuoteNow/get-quote-now')->with('flash_message', 'GetQuoteNow updated!');
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
        $model = str_slug('getquotenow','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            GetQuoteNow::destroy($id);

            return redirect('getQuoteNow/get-quote-now')->with('flash_message', 'GetQuoteNow deleted!');
        }
        return response(view('403'), 403);

    }
}
