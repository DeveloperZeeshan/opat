<?php

namespace App\Http\Controllers\SpecialOffer;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\SpecialOffer;
use App\Yacht;
use Illuminate\Http\Request;

class SpecialOfferController extends Controller
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
        $model = str_slug('specialoffer','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $specialoffer = SpecialOffer::where('yacht', 'LIKE', "%$keyword%")
                ->orWhere('date_from', 'LIKE', "%$keyword%")
                ->orWhere('date_to', 'LIKE', "%$keyword%")
                ->orWhere('pickup', 'LIKE', "%$keyword%")
                ->orWhere('drop_off', 'LIKE', "%$keyword%")
                ->orWhere('discount', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orderBy('position_order','ASC')->paginate($perPage);
            } else {
                $specialoffer = SpecialOffer::orderBy('position_order','ASC')->paginate($perPage);
            }

            return view('specialoffer.special-offer.index', compact('specialoffer'));
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
        $model = str_slug('specialoffer','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $yachts = Yacht::wherestatus('active')->get();
            return view('specialoffer.special-offer.create',compact('yachts'));
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
        $model = str_slug('specialoffer','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            SpecialOffer::create($requestData);
            return redirect('specialoffer/special-offer')->with('flash_message', 'SpecialOffer added!');
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
        $model = str_slug('specialoffer','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $specialoffer = SpecialOffer::findOrFail($id);
            return view('specialoffer.special-offer.show', compact('specialoffer'));
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
        $model = str_slug('specialoffer','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $specialoffer = SpecialOffer::findOrFail($id);
            $yachts = Yacht::wherestatus('active')->get();
            return view('specialoffer.special-offer.edit', compact('specialoffer','yachts'));
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
        $model = str_slug('specialoffer','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $specialoffer = SpecialOffer::findOrFail($id);
             $specialoffer->update($requestData);

             return redirect('specialoffer/special-offer')->with('flash_message', 'SpecialOffer updated!');
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
        $model = str_slug('specialoffer','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SpecialOffer::destroy($id);

            return redirect('specialoffer/special-offer')->with('flash_message', 'SpecialOffer deleted!');
        }
        return response(view('403'), 403);

    }
}
