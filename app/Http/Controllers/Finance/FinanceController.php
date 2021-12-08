<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use App\Finance;
use App\Profile;
use Illuminate\Http\Request;

class FinanceController extends Controller
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
        $model = str_slug('finance','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $finance = Finance::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('added_by_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $finance = Finance::paginate($perPage);
            }

            return view('finance.finance.index', compact('finance'));
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
        $model = str_slug('finance','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('finance.finance.create');
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

        $model = str_slug('finance','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            // return  $requestData = $request->all();
            $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password), 'status' => $request->status]);
            $userId = $user->id;
            Profile::create(['user_id' => $userId]);
            $user->roles()->attach([1 => ['role_id' => 9, 'user_id' => $user->id]]);
            $requestData['name'] = $request->name;
            $requestData['email'] = $request->email;
            $requestData['password'] = $request->password;
            $requestData['phone'] = $request->phone;
            if (auth()->user()->hasrole('company')){
                $requestData['added_by_id'] = Auth::user()->getCompanyDetail->id;
            }else{
                $requestData['added_by_id'] = Auth::user()->getManagerDetail->company_id;
            }
            $requestData['user_id']= $user->id;
            $requestData['status']= $request->status;
            Finance::create($requestData);
            return redirect('finance/finance')->with('flash_message', 'Finance added!');
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
        $model = str_slug('finance','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $finance = Finance::findOrFail($id);
            return view('finance.finance.show', compact('finance'));
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
        $model = str_slug('finance','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $finance = Finance::findOrFail($id);
            return view('finance.finance.edit', compact('finance'));
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
        $model = str_slug('finance','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
           // return $requestData = $request->all();
            
           // return $userId                 =  $user->id;
            $requestData['name']= $request->name;
            $requestData['email']= $request->email;
            $requestData['password']= $request->password;
            $requestData['phone']= $request->phone;
            if (auth()->user()->hasrole('company')){
                $requestData['added_by_id'] = Auth::user()->getCompanyDetail->id;
            }else{
                $requestData['added_by_id'] = Auth::user()->getManagerDetail->company_id;
            }
            $requestData['status']= $request->status;             
            $finance = Finance::findOrFail($id);
            $finance->update($requestData);
            return redirect('finance/finance')->with('flash_message', 'Finance updated!');
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
        $model = str_slug('finance','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Finance::destroy($id);

            return redirect('finance/finance')->with('flash_message', 'Finance deleted!');
        }
        return response(view('403'), 403);

    }
}
