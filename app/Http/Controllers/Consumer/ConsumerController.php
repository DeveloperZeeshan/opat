<?php

namespace App\Http\Controllers\Consumer;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Manager;
use App\Company;
use App\User;
use App\Profile;
use App\Package;
use Storage;
use App\Caretaker;
use App\Consumer;
use App\ConsumerType;
use App\MdocAgent;
use App\RentSource;
use App\EducationLevel;
use Illuminate\Http\Request;

class ConsumerController extends Controller
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

        $model = str_slug('consumer','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $consumer = Consumer::where('user_id', 'LIKE', "%$keyword%")
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
                if($is_company){
                    $consumer = Consumer::where('company_id',$company->id??null)->paginate($perPage);
                }else{
                    $consumer = Consumer::where('company_id',$company->company_id??null)->paginate($perPage);
                }//end if else.
            }

            return view('consumer.consumer.index', compact('consumer'));
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
        $model = str_slug('consumer','-');
        $user_id                = Auth::user()->id;
        $company                =  Company::where('user_id',$user_id)->first();
        if (!$company) {
            $company            =  Manager::where('user_id',$user_id)->first();
        }if (!$company) {
        $company            =  Caretaker::where('user_id',$user_id)->first();
        }//end if else.
        if(auth()->user()->hasrole('company')) {
          $caretakers = Caretaker::where('company_id', $company->id)->get();
        }else{
            $caretakers = Caretaker::where('company_id', $company->company_id)->get();
        }
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $consumerTypes   = ConsumerType::where('status',1)->get();
            $mdocAgents      = MdocAgent::where('status',1)->get();
            $rentSources     = RentSource::where('status',1)->get();
            $educationLevels = EducationLevel::where('status',1)->get();
            return view('consumer.consumer.create',compact('action','caretakers','consumerTypes','mdocAgents','rentSources','educationLevels'));
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
        return $request->all();
        extract($request->all());
        $model = str_slug('consumer','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'full_name'         => 'required',
			'email'             => 'required|max:191|email|unique:users',
			'password'          => 'required',
			'nation_id_card'    => 'required|max:191',
			'address'           => 'required',
     		'status'            => 'required',
		]);
        try{
            $image              = Storage::disk('website')->put("profilePicture", $request->image);
        }catch(\Exception $e){}//end 
//            return $request->all();
            $password               =  $request->password;
            $user_id                = Auth::user()->id;
            $company                =  Company::where('user_id',$user_id)->first(); 
            if (!$company) {
                $company            =  Manager::where('user_id',$user_id)->first(); 
            }if (!$company) {
                $company            =  Caretaker::where('user_id',$user_id)->first(); 
            }//end if else.
            $user                   =  User::create(['name'=>$full_name,'email'=>$email,'password'=>bcrypt($password),'view_password'=>$password,'status'=>$status]);
            $userId                 =  $user->id;
            $profile                =  Profile::create(['user_id'=>$userId??'','facility_name'=>$facility_name??'','phone'=>$phone??'','country'=>$country??'','city'=>$city??'','postal'=>$postal??'','address'=>$address??'','pic'=>$image??'','dob'=>$dob??'','nation_id_card'=>$nation_id_card??'','caretaker_id'=>$caretaker_id??'' ,'project_exit_date'=>$project_exit_date??'','effective_leave_date'=>$effective_leave_date??'','thirty_day_notice'=>$thirty_day_notice??'','extension_granted'=>$extension_granted??'','ninty_day_extension'=>$ninty_day_extension??'','monthly_rent_amount'=>$monthly_rent_amount??'','entry_date'=>$entry_date??'','bed_hold_amount'=>$bed_hold_amount??'','date_of_bedhold_reciept'=>$date_of_bedhold_reciept??'','rent_source_id'=>$rent_source_id??'','mdoc_agent_id'=>$mdoc_agent_id??'','educationl_level_id'=>$educationl_level_id??'','consumer_type_id'=>$consumer_type_id??'','bridge_card_eligible'=>$bridge_card_eligible??'','injury'=>$injury??'','notes'=>$notes??'','company_name'=>$company->name??'','bridge_card_eligible_check'=>$company->bridge_card_eligible_check??'','gov_assistance_eligible'=>$company->gov_assistance_eligible??'','injury_check'=>$company->injury_check??'']);

            if (auth()->user()->hasrole('company')){
                $consumer                =  Consumer::create(['user_id'=>$userId,'company_id'=>$company->id,'package_id'=>$company->package_id,'caretaker_id'=>$caretaker_id]);

            }else{
                $consumer                =  Consumer::create(['user_id'=>$userId,'company_id'=>$company->company_id,'package_id'=>$company->package_id,'caretaker_id'=>$caretaker_id]);
            }
            $user->roles()->attach([1 => ['role_id' =>5, 'user_id' => $user->id]]);
            return redirect('consumer/consumer')->with('flash_message', 'Consumer added!');
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
        $user_id                = Auth::user()->id;
        $company                =  Company::where('user_id',$user_id)->first();
        if (!$company) {
            $company                =  Manager::where('user_id',$user_id)->first();
        }if (!$company) {
            $company                =  Caretaker::where('user_id',$user_id)->first();
        }
        $model = str_slug('consumer','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $consumer = Consumer::with('getUserDetail')->findOrFail($id);
            return view('consumer.consumer.show', compact('consumer'));
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
        $model = str_slug('consumer','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $consumer = Consumer::findOrFail($id);
            $user_id                = Auth::user()->id;
            $company                =  Company::where('user_id',$user_id)->first(); 
            if (!$company) {
                $company            =  Manager::where('user_id',$user_id)->first(); 
            }if (!$company) {
                $company            =  Caretaker::where('user_id',$user_id)->first(); 
            }//end if else.
            if(auth()->user()->hasrole('company')) {
                $caretakers = Caretaker::where('company_id', $company->id)->get();
            }else{
                $caretakers = Caretaker::where('company_id', $company->company_id)->get();
            }
            $rentSources     = RentSource::where('status',1)->get();
            $mdocAgents      = MdocAgent::where('status',1)->get();
            $educationLevels = EducationLevel::where('status',1)->get();
            $consumerTypes   = ConsumerType::where('status',1)->get();
            return view('consumer.consumer.edit', compact('consumer','action','caretakers','rentSources','mdocAgents','educationLevels','consumerTypes'));
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
        $model = str_slug('consumer','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'full_name' => 'required',
			'email' => 'required',
			// 'password' => 'required',
			'nation_id_card' => 'required',
			'address' => 'required',
            'image' => 'required',
            'status' => 'required',
		]);
        try{
            $image                  = Storage::disk('website')->put("profilePicture", $request->image);
        }catch(\Exception $e){}//end 
            // $requestData = $request->all();
            
            // $consumer = Consumer::findOrFail($id);
            //  $consumer->update($requestData);

            $manager = Consumer::where('id',$id)->first();
            Profile::where('user_id',$manager->user_id)->update(['facility_name'=>$facility_name??'','phone'=>$phone??'','country'=>$country??'','city'=>$city??'','postal'=>$postal??'','address'=>$address??'','pic'=>$image??'','dob'=>$dob??'','nation_id_card'=>$nation_id_card??'','caretaker_id'=>$caretaker_id??'' ,'project_exit_date'=>$project_exit_date??'','effective_leave_date'=>$effective_leave_date??'','thirty_day_notice'=>$thirty_day_notice??'','extension_granted'=>$extension_granted??'','ninty_day_extension'=>$ninty_day_extension??'','monthly_rent_amount'=>$monthly_rent_amount??'','entry_date'=>$entry_date??'','bed_hold_amount'=>$bed_hold_amount??'','date_of_bedhold_reciept'=>$date_of_bedhold_reciept??'','rent_source_id'=>$rent_source_id??'','mdoc_agent_id'=>$mdoc_agent_id??'','educationl_level_id'=>$educationl_level_id??'','consumer_type_id'=>$consumer_type_id??'','bridge_card_eligible'=>$bridge_card_eligible??'','injury'=>$injury??'','notes'=>$notes??'','company_name'=>$company->name??'','bridge_card_eligible_check'=>$company->bridge_card_eligible_check??'','gov_assistance_eligible'=>$company->gov_assistance_eligible??'','injury_check'=>$company->injury_check??'']);
            User::where('id',$manager->user_id)->update(['email'=>$email,'name'=>$full_name,'status'=>$status]);

             return redirect('consumer/consumer')->with('flash_message', 'Consumer updated!');
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
        $model = str_slug('consumer','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Consumer::destroy($id);

            return redirect('consumer/consumer')->with('flash_message', 'Consumer deleted!');
        }
        return response(view('403'), 403);

    }
}
