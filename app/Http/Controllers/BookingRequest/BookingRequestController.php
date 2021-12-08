<?php

namespace App\Http\Controllers\BookingRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\BookingRequest;
use Illuminate\Http\Request;

class BookingRequestController extends Controller
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
        $model = str_slug('bookingrequest','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null ||true) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $bookingrequest = BookingRequest::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('yacht_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $bookingrequest = BookingRequest::paginate($perPage);
            }

            return view('bookingrequest.booking-request.index', compact('bookingrequest'));
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
        $model = str_slug('bookingrequest','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null ||true) {
            return view('bookingrequest.booking-request.create');
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
        $model = str_slug('bookingrequest','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null ||true) {
            
            $requestData = $request->all();
            
            BookingRequest::create($requestData);
            return redirect('bookingrequest/booking-request')->with('flash_message', 'BookingRequest added!');
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
        $model = str_slug('bookingrequest','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null ||true) {
            $bookingrequest = BookingRequest::findOrFail($id);
            return view('bookingrequest.booking-request.show', compact('bookingrequest'));
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
        $model = str_slug('bookingrequest','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null ||true) {
            $bookingrequest = BookingRequest::findOrFail($id);
            return view('bookingrequest.booking-request.edit', compact('bookingrequest'));
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
        $model = str_slug('bookingrequest','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null ||true) {
            
            $requestData = $request->all();
            
            $bookingrequest = BookingRequest::findOrFail($id);
             $bookingrequest->update($requestData);

             return redirect('bookingrequest/booking-request')->with('flash_message', 'BookingRequest updated!');
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
        $model = str_slug('bookingrequest','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null ||true) {
            BookingRequest::destroy($id);

            return redirect('bookingrequest/booking-request')->with('flash_message', 'BookingRequest deleted!');
        }
        return response(view('403'), 403);

    }
}
