<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        $model = str_slug('company','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $company = Company::where('package_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('column_1', 'LIKE', "%$keyword%")
                ->orWhere('column_2', 'LIKE', "%$keyword%")
                ->orWhere('column_3', 'LIKE', "%$keyword%")
                ->orWhere('column_4', 'LIKE', "%$keyword%")
                ->orWhere('column_5', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $company = Company::paginate($perPage);
            }

            return view('company.company.index', compact('company'));
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
        $model = str_slug('company','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('company.company.create');
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
        $model = str_slug('company','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'package_id' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            Company::create($requestData);
            return redirect('company/company')->with('flash_message', 'Company added!');
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
        $model = str_slug('company','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $company = Company::findOrFail($id);
            return view('company.company.show', compact('company'));
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
        $model = str_slug('company','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $company = Company::findOrFail($id);
            return view('company.company.edit', compact('company'));
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
        $model = str_slug('company','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'package_id' => 'required',
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            $company = Company::findOrFail($id);
             $company->update($requestData);

             return redirect('company/company')->with('flash_message', 'Company updated!');
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
        $model = str_slug('company','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Company::destroy($id);

            return redirect('company/company')->with('flash_message', 'Company deleted!');
        }
        return response(view('403'), 403);

    }
}
