<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\SpecialOfferRequest;
use Illuminate\Http\Request;

class SpecialOfferRequestController extends Controller
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
        $model = str_slug('special-offer-request','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null || true) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $specialOfferRequest = SpecialOfferRequest::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('comment', 'LIKE', "%$keyword%")
                ->orWhere('offer_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $specialOfferRequest = SpecialOfferRequest::paginate($perPage);
            }

            return view('special-offer-requests.special-offer-requests.index', compact('specialOfferRequest'));
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
        $model = str_slug('special-offer-request','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null || true) {
            return view('offer.offer.create');
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
/*        $model = str_slug('specialOffer-request','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Offer::create($requestData);
            return redirect('Offer/offer')->with('flash_message', 'Offer added!');
        }*/
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
        $model = str_slug('specialOffer-request','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null || true) {
            $specialOfferRequest = SpecialOfferRequest::findOrFail($id);
            return view('special-offer-requests.special-offer-requests.show', compact('specialOfferRequest'));
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
        $model = str_slug('special-offer-request','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null ||true) {
            $specialOfferRequest = SpecialOfferRequest::findOrFail($id);
            return view('special-offer-requests.special-offer-requests.edit', compact('specialOfferRequest'));
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
        $model = str_slug('special-offer-request','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null || true) {
            
            $requestData = $request->all();
            
            $offer = SpecialOfferRequest::findOrFail($id);
             $offer->update($requestData);

             return redirect('special-offer-request')->with('flash_message', 'Special Offer Request updated!');
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
        $model = str_slug('special-offer-requested','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null || true) {
            SpecialOfferRequest::destroy($id);

            return redirect('special-offer-request')->with('flash_message', 'Offer deleted!');
        }
        return response(view('403'), 403);

    }
}
