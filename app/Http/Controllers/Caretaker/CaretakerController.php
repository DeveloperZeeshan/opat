<?php

namespace App\Http\Controllers\Caretaker;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Manager;
use App\Company;
use App\User;
use App\Profile;
use App\Package;
use Storage;
use App\Caretaker;
use App\Facility;
use Illuminate\Http\Request;


class CaretakerController extends Controller
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
        $company                =  Company::where('user_id',$user_id)->first();
        $is_company = true;
        if (!$company) {
            $company                =  Manager::where('user_id',$user_id)->first();
            $is_company = false;
        }if (!$company) {
            $company                =  Caretaker::where('user_id',$user_id)->first();
            $is_company = false;
        }


        $model = str_slug('caretaker','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $caretaker = Caretaker::where('company_id',$company->id)->where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('company_id', 'LIKE', "%$keyword%")
                ->orWhere('full_name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('nation_id_card', 'LIKE', "%$keyword%")
                ->orWhere('dob', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('postal', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                // $caretaker      = Caretaker::paginate($perPage);

                // dd($caretaker);
                if($is_company){
                    $caretaker      = Caretaker::where('company_id',$company->id)->paginate($perPage);
                }else{
                    $caretaker = Caretaker::where('company_id',$company->company_id??null)->paginate($perPage);
                }//end if else.

            }
            return view('caretaker.caretaker.index', compact('caretaker'));
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
        $model = str_slug('caretaker','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            if (isset(auth()->user()->getCompanyDetail->id)) {
                $company_id = auth()->user()->getCompanyDetail->id;
            }else{
                $company_id = auth()->user()->getManagerDetail->company_id;
            }//end if else.
            $facilities = Facility::where('company_id',$company_id)->get();
            return view('caretaker.caretaker.create',compact('action','facilities'));
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
        extract($request->all());
        $model = str_slug('caretaker','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'full_name'         => 'required',
			'email'             => 'required|max:191|email|unique:users',
			'password'          => 'required',
			'address'           => 'required',
			'status'            => 'required',
		]);
        try{
            if ($request->hasFile('image')) {
                $image              = Storage::disk('website')->put("profilePicture", $request->image);
            }else{ 
                $user_id                = Auth::user()->id;
                $company                =  Company::where('user_id',$user_id)->first(); 
                if (!$company) {
                    $company                =  Manager::where('user_id',$user_id)->first(); 
                    $image = $company->getCompanyDetail->getUserDetail->profile->pic;
                }if (!$company) {
                    $company                =  Caretaker::where('user_id',$user_id)->first(); 
                    $image = $company->getCompanyDetail->getUserDetail->profile->pic;
                }else{
                    $image = $company->getUserDetail->profile->pic;                    
                }//end if else.

            }//end if else.
        }catch(\Exception $e){
            $image = 'profilePicture/no_avatar.jpg';
        }//end 
            $requestData = $request->all();
            // Caretaker::create($requestData);
            $password               =  $request->password;
            $user_id                = \Auth::user()->id;
            $company                =  Company::where('user_id',$user_id)->first();
            if (!$company) {
                $company                =  Manager::where('user_id',$user_id)->first();
            }//end if.
            $user                   =  User::create(['name'=>$full_name,'email'=>$email,'password'=>bcrypt($password),'view_password'=>$password,'status'=>$status]);
            $userId                 =  $user->id;
            $profile                =  Profile::create(['user_id'=>$user->id,'phone'=>$phone,'country'=>$country,'city'=>$city,'postal'=>$postal,'address'=>$address,'pic'=>$image,'dob'=>$dob,'nation_id_card'=>$nation_id_card,'company_name'=>$company->name??"Not Available"]);
            if (auth()->user()->hasrole('company')) {
                $manager = Caretaker::create(['user_id' => $userId, 'company_id' => $company->id, 'package_id' => $company->package_id, 'facility_id' => $facility_id, 'status' => $status]);
            }
            else{
                $manager = Caretaker::create(['user_id' => $userId, 'company_id' => $company->company_id, 'package_id' => $company->package_id, 'facility_id' => $facility_id, 'status' => $status]);
            }
                $user->roles()->attach([1 => ['role_id' =>4, 'user_id' => $user->id]]);

            return redirect('caretaker/caretaker')->with('flash_message', 'Caretaker added!');
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
        $model = str_slug('caretaker','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $caretaker = Caretaker::findOrFail($id);
            return view('caretaker.caretaker.show', compact('caretaker'));
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
        $model = str_slug('caretaker','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $caretaker = Caretaker::findOrFail($id);
            if (isset(auth()->user()->getCompanyDetail->id)) {
                $company_id = auth()->user()->getCompanyDetail->id;
            }else{
                $company_id = auth()->user()->getManagerDetail->company_id;
            }//end if else.
            $facilities = Facility::where('company_id',$company_id)->get();
            return view('caretaker.caretaker.edit', compact('caretaker','action','facilities'));
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
        $model = str_slug('caretaker','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'full_name' => 'required',
			'email' => 'required',
			// 'password' => 'required',
			'nation_id_card' => 'required',
			'address' => 'required',
            'status' => 'required',
		]);
        /*try{
            $image                  = Storage::disk('website')->put("profilePicture", $request->image);
        }catch(\Exception $e){}//end 
       */
            $requestData = $request->all();
            
            // $caretaker = Caretaker::findOrFail($id);
            // $caretaker->update($requestData);

            $manager = Caretaker::where('id',$id)->first();
            Profile::where('user_id',$manager->user_id)->update(['nation_id_card'=>$nation_id_card,'dob'=>$dob,'country'=>$country,'city'=>$city,'address'=>$address,'postal'=>$postal,'phone'=>$phone]);
            User::where('id',$manager->user_id)->update(['email'=>$email,'name'=>$full_name,'status'=>$status]);

             return redirect('caretaker/caretaker')->with('flash_message', 'Caretaker updated!');
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
        $model = str_slug('caretaker','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Caretaker::destroy($id);

            return redirect('caretaker/caretaker')->with('flash_message', 'Caretaker deleted!');
        }
        return response(view('403'), 403);

    }
}
