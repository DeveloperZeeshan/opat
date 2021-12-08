<?php

namespace App\Http\Controllers\Manager;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Manager;
use App\Company;
use App\User;
use App\Profile;
use App\Package;

use Storage;
use Illuminate\Http\Request;

class ManagerController extends Controller
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
        $user_id                = Auth::user()->id;
        $company                = Company::where('user_id',$user_id)->first();
        $model = str_slug('manager','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $manager = Manager::where('full_name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('nation_id_card', 'LIKE', "%$keyword%")
                ->orWhere('dob', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('company_id', 'LIKE', "%$keyword%")
                ->orWhere('package_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $manager = Manager::with('getProfileDetail')->where('company_id',$company->id)->paginate($perPage);
            }

            return view('manager.manager.index', compact('manager'));
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
        $action = 'create';
        $model = str_slug('manager','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('manager.manager.create',compact('action'));
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
    public function store(Request $request){
//        return $request->all();
        extract($request->all());
        $model = str_slug('manager','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'full_name'         => 'required',
			'phone'             => 'required',
            'email'             => 'required|max:191|email|unique:users',
			'password'          => 'required',
			'nation_id_card'    => 'required|max:191|unique:profiles',
    		'status'            => 'required',
            
			// 'package_id' => 'required'
		]);
        try{
            if ($request->hasFile('image')) {
                $image                  = Storage::disk('website')->put("profilePicture", $request->image);
            }else{
                $image = 'profilePicture/no_avatar.jpg';
            }//end if else.
        }catch(\Exception $e){}//end 
            $password               =  $request->password;
            $user_id                = \Auth::user()->id;
            $company                =  Company::with('getUserDetail')->where('user_id',$user_id)->first(); 
            $user                   =  User::create(['name'=>$full_name,'email'=>$email,'password'=>bcrypt($password),'view_password'=>$password,'status'=>$status]);
            $userId                 =  $user->id;
            $profile                =  Profile::create(['user_id'=>$user->id,'phone'=>$phone,'country'=>$country,'city'=>$city,'postal'=>$postal,'address'=>$address,'pic'=>$image,'dob'=>$dob,'nation_id_card'=>$nation_id_card,'company_name'=>$company->getUserDetail->name??"Not Available"]);
            $manager                =  Manager::create(['user_id'=>$userId,'company_id'=>$company->id,'package_id'=>$company->package_id]);
            $user->roles()->attach([1 => ['role_id' =>6, 'user_id' => $user->id]]);
            return redirect('manager/manager')->with('flash_message', 'Manager added!');
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
        $model = str_slug('manager','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $manager = Manager::findOrFail($id);
            return view('manager.manager.show', compact('manager'));
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
        $action = 'edit';
        $model = str_slug('manager','-');
        $allPackages = Package::all();
        $manager = Manager::where('id',$id)->first();
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $manager = Manager::findOrFail($id);
            return view('manager.manager.edit', compact('manager','action','allPackages'));
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
        extract($request->all());
        $model = str_slug('manager','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
                'full_name' => 'required',
                'phone' => 'required',
                'nation_id_card' => 'required',
                'image' => 'required',
                'status' => 'required',
               
		]);
        try{
            $image                  = Storage::disk('website')->put("profilePicture", $request->image);
        }catch(\Exception $e){}//end 
            $requestData = $request->all();
            
            $manager = Manager::where('id',$id)->first();
            Profile::where('user_id',$manager->user_id)->update(['nation_id_card'=>$nation_id_card,'dob'=>$dob,'pic'=>$image,'country'=>$country,'city'=>$city,'address'=>$address,'postal'=>$postal,'phone'=>$phone]);
            User::where('id',$manager->user_id)->update(['email'=>$email,'name'=>$full_name,'status'=>$status]);
            

             return redirect('manager/manager')->with('flash_message', 'Manager updated!');
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
        $model = str_slug('manager','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Manager::destroy($id);

            return redirect('manager/manager')->with('flash_message', 'Manager deleted!');
        }
        return response(view('403'), 403);

    }
}
