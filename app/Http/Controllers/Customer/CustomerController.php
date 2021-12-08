<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Client;
use App\Charter;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null || true) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $client = Client::where('name', 'LIKE', "%$keyword%")
                ->orWhere('surname', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('passport_id', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('tax_number', 'LIKE', "%$keyword%")
                ->orWhere('notes', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $client = Client::paginate($perPage);
            }

            return view('customer.customer.index', compact('client'));
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('customer.customer.create');
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            Client::create($requestData);
            return redirect('customer/customer')->with('flash_message', 'Customer added!');
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
        $model = str_slug('customer','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null || true) {
            $keyword = '';//$request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $client = Client::with('getClientCharters')->where('id',$id)->where('name', 'LIKE', "%$keyword%")
                ->orWhere('surname', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('passport_id', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('tax_number', 'LIKE', "%$keyword%")
                ->orWhere('notes', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->first();//paginate($perPage);
            } else {
                $client = Client::with('getClientCharters')->where('id',$id)->first();//($perPage);
            }
            return view('customer.customer.charter_list', compact('client'));


/*
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null || true) {
            $client = Client::with('getClientCharters')->findOrFail($id);
        }*/
        return response(view('403'), 403);
    }
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $client = Client::findOrFail($id);
            return view('client.client.edit', compact('client'));
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $client = Client::findOrFail($id);
             $client->update($requestData);

             return redirect('client/client')->with('flash_message', 'Client updated!');
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
        $model = str_slug('client','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Client::destroy($id);

            return redirect('client/client')->with('flash_message', 'Client deleted!');
        }
        return response(view('403'), 403);

    }
}
