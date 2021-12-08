<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
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
        $model = str_slug('contactus','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $contactus = ContactUs::where('full_name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $contactus = ContactUs::paginate($perPage);
            }

            return view('contact_us.contact-us.index', compact('contactus'));
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
        $model = str_slug('contactus','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('contact_us.contact-us.create');
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
        
        $model = str_slug('contactus','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'full_name' => 'required',
			'phone' => 'required',
			'email' => 'required',
			'message' => 'required'
		]);
            $requestData = $request->all();
            
            ContactUs::create($requestData);
            return redirect('contact_us/contact-us')->with('flash_message', 'ContactU added!');
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
        $model = str_slug('contactus','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $contactus = ContactUs::findOrFail($id);
            return view('contact_us.contact-us.show', compact('contactus'));
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
        $model = str_slug('contactus','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $contactus = ContactUs::findOrFail($id);
            return view('contact_us.contact-us.edit', compact('contactus'));
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
        $model = str_slug('contactus','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'full_name' => 'required',
			'phone' => 'required',
			'email' => 'required',
			'message' => 'required'
		]);
            $requestData = $request->all();
            
            $contactus = ContactUs::findOrFail($id);
             $contactus->update($requestData);

             return redirect('contact_us/contact-us')->with('flash_message', 'ContactU updated!');
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
        $model = str_slug('contactus','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ContactUs::destroy($id);

            return redirect('contact_us/contact-us')->with('flash_message', 'ContactU deleted!');
        }
        return response(view('403'), 403);

    }
}
