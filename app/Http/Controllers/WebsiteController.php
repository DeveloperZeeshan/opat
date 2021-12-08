<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Stripe\Plan;
use Validator;
use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\ContactUs;
use App\GetQuoteNow;
use App\Page;
use App\OurSolution;
use App\AskAQuestion;
use App\FAQ;
use App\Leadership;
use App\AffordableCare;
use App\ProvidesYourCare;
use App\NewsAndEvent;
use App\Package;
use App\Company;
use App\Caretaker;
use App\Manager;
use App\Finance;
use App\Resource;
use App\Role;
use App\Facility;
use App\Consumer;
use App\RentPayment;
use App\IncidentReport;
use App\Medication;
use App\Job;
use App\JobType;
use App\Department;
use App\LearningManagement;
use App\TransportTracker;
use App\Location;
use App\JobRequest;
use App\Quiz;
use App\Yacht;
use App\Feedback;
use App\YachtAvailablity;
use Storage;
use Auth;
use DB;
use Redirect;
use Session;
use View;
use Mail;
use URL;
use App\UserAssessment;
use Illuminate\Support\Facades\Artisan;


//stripe

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Stripe\Price;
use Stripe\StripeClient;
use App\Subscription;

class WebsiteController extends Controller
{
    public function __construct()
    {
    }//end constructor.

    public function index()
    {
        $packages = Package::where('status', 1)->get();
        $page = Page::get();
        $oursolutions = OurSolution::get();
        $affordablecare = AffordableCare::get();
        $providescare = ProvidesYourCare::get();
        $resources = Resource::get();
        return view('website.index', compact('packages','page','oursolutions','affordablecare','providescare','resources'));
    }//end index function.

    public function dashboard()
    {
        if (auth()->user()->hasRole('admin')) {
            // developer dashboard.
            return view('dashboard.index');
        } elseif (auth()->user()->hasRole('user')) {
            // website admin dashboard
            $company       =  Company::count();
            $companyactive       =  Company::where('status',1)->count();
            $activeusers = User::where('status',1)->count();
            $users = User::count();
            $recievedAmount = RentPayment::pluck('recieved_amount')->sum();
            $dueAmount = RentPayment::pluck('due_amount')->sum();
            $managersCount = Manager::count();
            $caretakerCount = Caretaker::count();
            $consumerCount = Consumer::count();
            $packagesCount = Package::count();
            $feedbackCount = Feedback::count();
            return view('dashboard.website_admin_dashboard',compact('company','companyactive','managersCount','caretakerCount','consumerCount','packagesCount','feedbackCount','users','activeusers','recievedAmount','dueAmount'));
        } elseif (auth()->user()->hasRole('lms')) {
            // website admin dashboard
            return view('dashboard.lms_dashboard');
        } elseif (auth()->user()->hasRole('company')) {
            // company dashboard
            $managersCount = Manager::where('company_id', auth()->user()->getCompanyDetail->id)->count();
            $facilityCount = Facility::where('company_id', auth()->user()->getCompanyDetail->id)->count();
            $caretakerCount = Caretaker::where('company_id', auth()->user()->getCompanyDetail->id)->count();
            $consumerCount = Consumer::where('company_id', auth()->user()->getCompanyDetail->id)->count();
            return view('dashboard.company_dashboard', compact('managersCount', 'facilityCount', 'caretakerCount', 'consumerCount'));
        } elseif (auth()->user()->hasRole('caretaker')) {
            // caretaker dashboard
            $user_id                = Auth::user()->id;
            $company                =  Caretaker::where('user_id',$user_id)->first();
            $rentPaymentCount = RentPayment::where('company_id',$company->company_id)->sum('actual_amount');
            $residentsCount = Consumer::where('company_id', $company->company_id)->count();
            $incidentReportsCount = IncidentReport::where('report_created_by',$company->company_id)->count();
            $medicationReportsCount = Medication::where('added_by',$company->company_id)->count();
            $yachts = Yacht::all();
            $yachtAvailablities = YachtAvailablity::where('is_deleted','false')->with('getYacht')->get();
            return view('dashboard.caretaker_dashboard', compact('residentsCount','rentPaymentCount', 'incidentReportsCount', 'medicationReportsCount','yachts','yachtAvailablities'));
        } elseif (auth()->user()->hasRole('consumer')) {
            // consumer dashboard
            return view('dashboard.consumer_dashboard');
        } elseif (auth()->user()->hasRole('manager')) {
            // manager dashboard
            $companyId = Manager::where('user_id',Auth::id())->pluck('company_id');
            $incidentReportsCount = IncidentReport::where('report_created_by', $companyId)->count();
            $medicationReportsCount = Medication::where('added_by', $companyId)->count();
            $rentPaymentCount = RentPayment::where('added_by', Auth::id())->sum('actual_amount');
            $ResidentsCount = Consumer::where('company_id', $companyId)->count();
            $caretakersCount = Caretaker::where('company_id', $companyId)->count();
            $rentPaymentDueCount = RentPayment::where('added_by', Auth::id())->sum('due_amount');
            $facilityCount = Facility::where('company_id', $companyId)->count();

            return view('dashboard.manager_dashboard', compact('rentPaymentCount', 'incidentReportsCount', 'medicationReportsCount','ResidentsCount','caretakersCount','rentPaymentDueCount','facilityCount'));
        } elseif (auth()->user()->hasRole('guest')) {
            // guest dashboard
            return view('dashboard.guest_dashboard');
        } elseif (auth()->user()->hasRole('career')) {
            // guest dashboard
            return view('dashboard.career_dashboard');
        } else {
            // default dashboard
            $companyId = Finance::where('user_id',Auth::id())->pluck('added_by_id');
            $rentPaymentCount = RentPayment::where('company_id',$companyId)->sum('actual_amount');
            return view('dashboard.finance_dashboard', compact('rentPaymentCount'));
        }//end if else.
    }//end

    public function about()
    {   $page = Page::get();
        $leaderShips = Leadership::get();
         $providescare = ProvidesYourCare::get();
         $resources = Resource::get();
        return view('website.about',compact('page','leaderShips','providescare','resources'));
    }//end about function.

    public function newsAndEvents()
    {
        $page = Page::get();
        $newsAndEvents = NewsAndEvent::get();
        return view('website.news_and_events',compact('page','newsAndEvents'));
    }// end news and event function

    public function blogs()
    {
        return view('website.blog');
    }// end blog function

    public function privacyPolicy()
    {
        $page = Page::get();
        return view('website.privacy_policy',compact('page'));
    }// end privacy function

    public function faqs()
    {   $faqs = FAQ::get();
        $page = Page::get();
        return view('website.faq',compact('faqs','page'));
    }// end faqs function

    public function signIn()
    {
        if (!Auth::check()) {
            return view('website.login');
        } else {
            return redirect('dashboard');
        }//end if.
    }// end faqs function

    public function signUp($packageId = null)
    {
        $package = Package::where('id', $packageId)->first();
        $userRoles = Role::wherename('company')->orWhere('name', 'consumer')->get();
        return view('website.sign_up', compact('package', 'userRoles'));
    }// end faqs function

    public function signUpCustomPackage(Request $request)
    {
        extract($request->all());
        $packageId = Package::create(['name' => $custom_package_name, 'price' => $custom_package_price, 'logo' => 'packages/default.png', 'beds' => $beds, 'caretakers' => $caretakers, 'managers' => $managers, 'lms_access' => 1, 'status' => 0, 'is_custom_package' => 1, 'description' => $description])->id;
        $packagesDetails = Package::where('status', 1)->get();
        $userRoles = Role::wherename('company')->orWhere('name', 'consumer')->get();
        return redirect()->route('sign_up', ['id' => $packageId]);
        // return view('website.sign_up',compact('packagesDetails','packageId','userRoles'));
    }// end signUpCustomPackage function

    public function signUpCustomPackageProcess(Request $request)
    {
        return $request->all();
        $packagesDetails = Package::where('status', 1)->get();
        $userRoles = Role::wherename('company')->orWhere('name', 'consumer')->get();
        return view('website.sign_up', compact('packagesDetails', 'packageId', 'userRoles'));
    }// end signUpCustomPackageProcess function


    public function signupProcess(Request $request)
    {
        return $request->all();
        if($request->package != 1){
            try {
                    Stripe::setApiKey('sk_test_51IwCsLHvXmO4xH0sbyJLDB0i5Ig84QIhLN66UNHOZ2h0gHPfNCWHi0lOUxiTQB0wnNAeDhmhfbOyJJRAjzTobNXN005gh2UgIa');

                    $stripe = new \Stripe\StripeClient(
                        'sk_test_51IwCsLHvXmO4xH0sbyJLDB0i5Ig84QIhLN66UNHOZ2h0gHPfNCWHi0lOUxiTQB0wnNAeDhmhfbOyJJRAjzTobNXN005gh2UgIa'
                    );

                $customer = Customer::create(array(
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken
                ));
                $packages = Package::where('id', $request->package)->first();
                $product = $stripe->products->create([
                    'name' => $packages->name,
                ]);
                $price = $stripe->prices->create([
                    'unit_amount' => $packages->price * 100,
                    'currency' => 'usd',
                    'recurring' => ['interval' => 'day'],
                    'product' => $product->id,
                ]);
                $charge = Charge::create(array(
                    'customer' => $customer->id,
                    'amount' => $packages->price * 100,
                    'currency' => 'usd',
                ));
                $subscription = $stripe->subscriptions->create([
                    'customer' => "$customer->id",
                    'items' => [
                        [
                            'price' => "$price->id",
                            'quantity' => '1',
                        ],
                    ],
                ]);
                if (isset($stripeTokenType) && isset($stripeToken)) {

                }//end if else.
                $subscription = Subscription::create(['subscription_type_id' => $subscription->id, 'customer_id' => $customer->id, 'receipt_url' => $charge->receipt_url, 'email' => $customer->email]);
                extract($request->all());
                $validatedData = $request->validate([
                    'name' => 'required|max:191',
                    'email' => 'required|max:191|email|unique:users',
                    'phone' => 'required|max:191',
                    'address' => 'required|max:191',
                    'postal' => 'required|max:191',
                    'country' => 'required|max:191',
                    'password' => 'required|max:191',
                    'picture' => 'required|max:4048',
                ]);
                try {
                    $image = Storage::disk('website')->put("profilePicture", $request->picture);
                } catch (\Exception $e) {
                    $image = 'profilePicture/default.jpg';
                }//end
                try {

                    if (isset($package) && Package::find($package)->price <= 0) {
                        $user = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt($password), 'view_password' => $password, 'status' => 1]);
                    } elseif (isset($package) && Package::find($package)->is_custom_package == 1) {
                        $user = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt($password), 'view_password' => $password, 'status' => 0]);
                    } else {
                        $user = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt($password), 'view_password' => $password, 'status' => 1]);
                    }//end if else.
                    if ($company_name != null) {
                        $profile = Profile::create(['user_id' => $user->id, 'company_name' => $company_name, 'phone' => $phone, 'country' => $country, 'city' => $city, 'postal' => $postal, 'address' => $address, 'pic' => $image]);
                    } else {
                        $profile = Profile::create(['user_id' => $user->id, 'phone' => $phone, 'country' => $country, 'city' => $city, 'postal' => $postal, 'address' => $address, 'pic' => $image]);
                    }//end if.
                    $user->roles()->attach([1 => ['role_id' => $user_role, 'user_id' => $user->id]]);
                    // 3 user_role for company
                    if ($user_role == 3) {
                        if (isset($package) && Package::find($package)->is_custom_package == 1) {
                            Company::create(['user_id' => $user->id, 'package_id' => $package, 'status' => 0, 'payment_status' => 0, 'is_custom_package_user' => 1]);
                        } elseif (isset($package) && Package::find($package)->price <= 0) {
                            Company::create(['user_id' => $user->id, 'package_id' => $package, 'status' => 1, 'payment_status' => 0, 'is_custom_package_user' => 0]);
                        } else {
                            Company::create(['user_id' => $user->id, 'package_id' => $package, 'status' => 1, 'payment_status' => 1, 'is_custom_package_user' => 0]);
                        }//end if else.
                    }//end if

                    return redirect('sign_in')->with('success', 'Registration successfully');
                } catch (\Exception $e) {
                    // return redirect('sign_in')->with('error', 'Unable to create account try again.');
                    return redirect('sign_in')->with('error', 'Unable to create account try again.' . $e->getMessage());
                }//end try catch.

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
//        return $request->all();
            extract($request->all());
            $validatedData = $request->validate([
                'name' => 'required|max:191',
                'email' => 'required|max:191|email|unique:users',
                'phone' => 'required|max:191',
                'address' => 'required|max:191',
                'postal' => 'required|max:191',
                'country' => 'required|max:191',
                'password' => 'required|max:191',
                'picture' => 'required|max:4048',
            ]);
            try {
                $image = Storage::disk('website')->put("profilePicture", $request->picture);
            } catch (\Exception $e) {
                $image = 'profilePicture/default.jpg';
            }//end
            try {
                extract($request->all());
                if (isset($package) && Package::find($package)->price <= 0) {
                    $user = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt($password), 'view_password' => $password, 'status' => 1]);
                } elseif (isset($package) && Package::find($package)->is_custom_package == 1) {
                    $user = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt($password), 'view_password' => $password, 'status' => 0]);
                } else {
                    $user = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt($password), 'view_password' => $password, 'status' => 1]);
                }//end if else.
                if ($company_name != null) {
                    $profile = Profile::create(['user_id' => $user->id, 'company_name' => $company_name, 'phone' => $phone, 'country' => $country, 'city' => $city, 'postal' => $postal, 'address' => $address, 'pic' => $image]);
                } else {
                    $profile = Profile::create(['user_id' => $user->id, 'phone' => $phone, 'country' => $country, 'city' => $city, 'postal' => $postal, 'address' => $address, 'pic' => $image]);
                }//end if.
                $user->roles()->attach([1 => ['role_id' => $user_role, 'user_id' => $user->id]]);
                // 3 user_role for company
                if ($user_role == 3) {
                    if (isset($package) && Package::find($package)->is_custom_package == 1) {
                        Company::create(['user_id' => $user->id, 'package_id' => $package, 'status' => 0, 'payment_status' => 0, 'is_custom_package_user' => 1]);
                    } elseif (isset($package) && Package::find($package)->price <= 0) {
                        Company::create(['user_id' => $user->id, 'package_id' => $package, 'status' => 1, 'payment_status' => 0, 'is_custom_package_user' => 0]);
                    } else {
                        Company::create(['user_id' => $user->id, 'package_id' => $package, 'status' => 1, 'payment_status' => 1, 'is_custom_package_user' => 0]);
                    }//end if else.
                }//end if

                return redirect('sign_in')->with('success', 'Registration successfully');
            } catch (\Exception $e) {
                // return redirect('sign_in')->with('error', 'Unable to create account try again.');
                return redirect('sign_in')->with('error', 'Unable to create account try again.' . $e->getMessage());
            }//end try catch.

    }//end signupProces function.

    public function contactUs(Request $request)
    {
        if ($request != null) {
            $check_email_and_number = ContactUs::where('email', $request->email)->first();
            if ($check_email_and_number == "") {
                $contact_us = new ContactUs();
                $contact_us->full_name = $request->full_name;
                $contact_us->phone = $request->phone;
                $contact_us->email = $request->email;
                $contact_us->message = $request->message;
                $contact_us->save();
                return back()->with('success','your message has been send');
            } else {
                return back()->with('error','your message has been cancel');
            }//end if else
        }//end if.
        return response()->json(['msg' => 'errors', 'data' => 'Please Enter Some Inputs, Thank you.']);
    }// end faqs function

    public function newsLetter(Request $request)
    {
        $check_email = DB::table('news_letter')->where('email', $request->subscribe_email)->first();
        if ($check_email == null) {
            DB::table('news_letter')->insert(['email' => $request->email, 'date' => date('Y-m-d'), 'time' => date('h:i:s', time())]);
            return response()->json(['msg' => 'success', 'data' => 'Your Request has been Submitted Successfully, Thank you.']);
        } else {
            return response()->json(['msg' => 'error', 'data' => 'Your Have Been Subscribe Already, Thank you.']);
        }//end if else.
    }// end faqs function

    //ajax requests
    public function getPackageDetail(Request $request, $id = null)
    {
        extract($request->all());
        $packages = Package::all();
        return view('website.packages_details_for_company', compact('packages'));
    }//end getPackageDetail function

    public function packagesDetailsForcompany(Request $request, $id = null)
    {
        $packages = Package::wherestatus(1)->get();
        return view('website.packages_details_for_company', compact('packages'));
    }//end packagesDetailsForcompany function.

    public function signinProcess(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                Session::flush();
                return redirect('sign_in')->with('error', 'Account Deactivated, Contact Admin For Activation.');
            } else {
                return redirect('dashboard');
            }//end if.
        } else {
            return redirect('sign_in')->with('error', 'These credentials do not match our records.');
        }//end if.
    }//end signinProcess function.

    public function guestSigninProcess(Request $request)
    {
        if (Auth::attempt(['email' => 'guest@opat.com', 'password' => '123456'])) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                Session::flush();
                return redirect('sign_in')->with('error', 'Account Deactivated, Contact Admin For Activation.');
            } else {
                return redirect('dashboard');
            }//end if.
        } else {
            return redirect('sign_in')->with('error', 'These credentials do not match our records.');
        }//end if.
    }//end guestSigninProcess function.

    public function checkPackageExpiredOrNot(Request $request = null)
    {
        $user_id = \Auth::user()->id;
        $company = Company::where('user_id', $user_id)->first();

        $check_email = Manager::where('company_id');
        if ($check_email == null) {
            DB::table('news_letter')->insert(['email' => $request->email, 'date' => date('Y-m-d'), 'time' => date('h:i:s', time())]);
            return response()->json(['msg' => 'success', 'data' => 'your Request has been Submitted Successfully, Thank you.']);
        } else {
            return response()->json(['msg' => 'error', 'data' => 'You have Been Subscribed Already, Thank you.']);
        }//end if else.
    }//end checkPackageExpiredOrNot function.

    public function updateCompanyStatus($company_id, $user_id, $status)
    {
        if ($status == 1) {
            Company::where('id', $company_id)->where('user_id', $user_id)->update(['status' => 0]);
            User::where('id', $user_id)->update(['status' => 0]);
            return redirect()->back();
        } else {
            Company::where('id', $company_id)->where('user_id', $user_id)->update(['status' => 1]);
            User::where('id', $user_id)->update(['status' => 1]);
            return redirect()->back();
        }//end if else.
    }//end updateCompanyStatus function.

    public function creatConsumerDetailSession(Request $request)
    {
        extract($request->all());
        Session::forget('check_consumer_detail_session');
        Session::put('check_consumer_detail_session', ['type' => $type, 'consumer_id' => $consumer_id]);
        if (Session::get('check_consumer_detail_session')) {
            return response()->json(['result' => 'ok', 'type' => $type]);
        } else {
            return response()->json(['result' => 'error', 'type' => $type]);
        }//end if else.
    }//end creatConsumerDetailSession function.


    public function creatTransportDetailSession(Request $request)
    {
        extract($request->all());
        Session::forget('check_transport_detail_session');
        Session::put('check_transport_detail_session', ['type' => $type, 'transport_id' => $transport_id]);
        if (Session::get('check_transport_detail_session')) {
            return response()->json(['result' => 'ok', 'type' => $type]);
        } else {
            return response()->json(['result' => 'error', 'type' => $type]);
        }//end if else.
    }//end creatTransportDetailSession function.


    public function download()
    {

        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName = env('DB_HOST');
        $mysqlUserName = env('DB_USERNAME');
        $mysqlPassword = env('DB_PASSWORD');
        $DbName = env('DB_DATABASE');
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';


        $queryTables = \DB::select(\DB::raw('SHOW TABLES'));
        foreach ($queryTables as $table) {
            foreach ($table as $tName) {
                $tables[] = $tName;
            }
        }
        // $tables  = array("users","products","categories"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();
        $output = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }

        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);

    }

    public function job(Request $request)
    {
        $jobs = Job::simplePaginate(3);
        $jobTypes = JobType::get();
        $departments = Department::get();
        $locations = Location::get();
        return view('website.jobs', compact('jobs', 'jobTypes', 'departments', 'locations'));

    }

    public function applyForJobProcess(Request $request)
    {
        try {
            extract($request->all());
            if ($request->hasFile('attachment')) {
                $jobAttachment = $this->storeImage('JobRequests', $request->attachment)??"";
            } else {
                $jobAttachment = '';
            }//end if else.
            if (JobRequest::create(['name' => $name, 'email' => $email, 'job_id' => $job_id, 'attachment' => $jobAttachment, 'notes' => $message, 'status' => 1])) {
                return redirect()->back()->with(['type' => 'success', 'message' => 'Request completed successfully, wait for response.']);
            } else {
                return redirect()->back()->with(['type' => 'error', 'message' => 'unable to process request, try again.']);
            }//end if else.
        } catch (\Exception $e) {
            //return $e->getMessage();
            return redirect()->back()->with(['type' => 'error', 'message' => 'unable to process request, try again.']);
        }//end try catch.
    }//end applyForJobProcess function.


    public function addQustionDiv($Questions_no, $id)
    {
        if ($id == 'no') {
            return (string)view('includes.add_qustion_div', compact('Questions_no'));
        } else {
            $qustion = Quiz::where('id', $id)->first();
            return (string)view('includes.add_qustion_div', compact('Questions_no', 'qustion'));
        }//end if else.
    }

    public function assessmentAnswerTypeProcess(Request $request, $type, $Questions_no, $id)
    {
        if ($id == 'no') {
            if ($type == 'mcqs') {
                return view('website.ajax.assesment_type_mcqs_ajax', compact('Questions_no'));
            } elseif ($type == 'true_false') {
                return view('website.ajax.assesment_type_truefalse_ajax', compact('Questions_no'));
            } elseif ($type == 'free_text') {
                return view('website.ajax.assesment_type_freetext_ajax', compact('Questions_no'));
            }//end if.
        } else {
            $qustion = Quiz::where('id', $id)->first();
            if ($type == 'mcqs') {
                return view('website.ajax.assesment_type_mcqs_ajax', compact('Questions_no', 'qustion'));
            } elseif ($type == 'true_false') {
                return view('website.ajax.assesment_type_truefalse_ajax', compact('Questions_no', 'qustion'));
            } elseif ($type == 'free_text') {
                return view('website.ajax.assesment_type_freetext_ajax', compact('Questions_no', 'qustion'));
            }//end if.
        }//end if
    }//end assessmentAnswerTypeProcess Function


    public function assessment(Request $request)
    {
        $assessment = Quiz::get();
        return view('website.assessment', compact('assessment'));
    }

    public function quizSubmit(Request $request)
    {
// return $request->all();
        foreach ($request->answer as $value) {
            UserAssessment::create(['question_id' => $value['question'], 'name' => $request->name, 'email' => $request->email, 'answer' => $value['ans']]);
        }
        return redirect()->back();

    }

    public function createLmsIdSession(Request $request, $quiz_id)
    {
        Session::put('lms_session_id', $quiz_id);
        return 1;
    }//end createQuizSession function.

    public function showLmsIdSession(Request $request, $quiz_id)
    {
        Session::put('lms_session_id', $quiz_id);
        return 1;
    }//end createQuizSession function.

    public function trackerIdSession(Request $request, $consumer_id)
    {
        Session::put('tracker_session_id', $consumer_id);
        return 1;
    }//end createQuizSession function.


    public function congitiveIdSession(Request $request, $consumer_id)
    {
        Session::put('cognitive_session_id', $consumer_id);
        return 1;

    }//end createCognitive function.
    public function serviceIdSession(Request $request, $consumer_id)
    {
        Session::put('service_session_id', $consumer_id);
        return 1;

    }//end createCognitive function.

    public function quickLinks(Request $request)
    {
        $learningmanagement = learningmanagement::get();
        $assessment = Quiz::get();
        // $lms_session_id = Session::get('lms_session_id');
        return view('website.quick-links', compact('assessment', 'learningmanagement'));
    }//end Career function.

    public function calendar(Request $request)
    {
        return view('consumer.consumer.calender');
    }//end Career function.

    public function rentPaymentEditRecord(Request $request, $id)
    {
        $rentpayment = RentPayment::findOrFail($id);
        return (string)view('includes.rent_payment_edit_modal', compact('rentpayment'));
    }//end

    public function checkEmail(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return 'yes';
        } else {
            return 'no';
        }
    }

    public function calculateMilleage(Request $request, $pickup, $drop_off)
    {
        // return $request->all();
        $pickup_address = $request->pickup;
        $delivery_address = $request->drop_off;
        //API key
        $apiKey = 'AIzaSyDqZjG9qZvf6WN42Q0CQqFsEp-RZdfwBwI';
        //Address Formatting
        $formatted_pickup_address = str_replace(' ', '+', $pickup_address);
        $formatted_delivery_address = str_replace(' ', '+', $delivery_address);
        try {
            $response = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=' . $formatted_pickup_address . '&destinations=' . $formatted_delivery_address . '&mode=driving&key=' . $apiKey);
            $response = json_decode($response);
            $result = $response->rows;
            if ($result[0]->elements[0]->status == 'ZERO_RESULTS') {
                return back();

            }
            $distance = $result[0]->elements[0]->distance->value;
            $distance = $distance / 1609.344;
            $distance = round($distance, 2);
            $duration = $result[0]->elements[0]->duration->value;
            $duration = $duration / 3600;
            $estimated_cost = ($distance * 5);
            // $quotation['distances'] = $result[0]->elements[0]->distance->text;
            // $quotation['duration'] = $result[0]->elements[0]->duration->text;
            // $quotation['estimated_cost'] = round($estimated_cost);

        } catch (\Exception $e) {
            return $e->getMessage();
            return back();
        }
        return (['type' => 'success', 'msg' => 'success', 'responseText' => $distance]);
    }

    public function sendEmail(Request $request)
    {
        $data = [
            'no_reply' => Auth::user()->email,
            'email' => $request->email,
            'subject' => 'Transport Tracker Invoice',
            'pickup' => $request->pickup,
            'dropoff' => $request->dropoff,
            'amount' => $request->amount,
            'milleage' => $request->milleage,
            'timetaken' => $request->timetaken,
            'notes' => $request->notes,

        ];
        try {
            $result = Mail::send('website.tracker_email_send', ['data' => $data], function ($message) use ($data) {
                $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);
            });

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect()->back()->with('message', 'Submitted Successfully!');
    }

    public function learning(Request $request)
    {
        $learningmanagement = LearningManagement::where('id', 1)->first();
        return view('website.learning', compact('learningmanagement'));
    }

    public function subIndexTransportTracker(Request $request)
    {
        // return app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
        // return Session::all();die;
        if (Session::has('check_transport_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'transport-tracker.index') {
            $consumer_id = Session::get('check_transport_detail_session')['transport_id'];
            $transporttracker = TransportTracker::where('consumer_id',$consumer_id)->paginate(10);
            return view('transportTracker.transport-tracker.sub_index', compact('transporttracker'));
        }
    }

    public function subIndexRentPayment(Request $request)
    {
//        if (Session::has('check_consumer_detail_session') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'rentpayment.sub_index') {
//            $consumer_id = Session::get('check_consumer_detail_session')['consumer_id'];
        $rentpayment = RentPayment::paginate(10);
        return view('rentPayment.rent-payment.sub_index', compact('rentpayment'));
//        }

    }//end class.

    public function rentPaymentEmail(Request $request)
    {
        $rentPayment =  RentPayment::where('consumer_id',$request->consumer_id)->with('getConsumerDetail')->get()->toArray();
        $total = RentPayment::where('consumer_id',$request->consumer_id)->sum('due_amount');
        $data = [
            'no_reply' => Auth::user()->email,
            'email' => $request->email,
            'caretaker_name' => $request->caretaker_name,
            'caretaker_address' => $request->caretaker_address,
            'invoice_date' => $request->invoice_date,
            'due_amount' => $total,
            'rentPayment' => $rentPayment,
            'subject' => 'Rent Payment Inovoice',
        ];
        try {
            $result = Mail::send('website.rentpayment_email_send', ['data' => $data], function ($message) use ($data) {
                $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);

            });

//               var_dump($result);die();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect()->back()->with('message', 'Submitted Successfully!');
    }

    public function consumerMedicationEmail(Request $request)
    {
        $medication =  Medication::where('consumer_id',$request->consumer_id)->get()->toArray();
        $data = [
            'no_reply' => Auth::user()->email,
            'email' => $request->email,
            'caretaker_name' => $request->caretaker_name,
            'caretaker_address' => $request->caretaker_address,
            'invoice_date' => $request->invoice_date,
            'medication'=>$medication,
            'subject' => 'Medication Invoice',
        ];
        try {
            $result = Mail::send('website.medication_email_send', ['data' => $data], function ($message) use ($data) {
                $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);

            });
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect()->back()->with('message', 'Submitted Successfully!');
    }
    public function incidentReportEmail(Request $request)
    {
        $incidentReport =  IncidentReport::where('consumer_id',$request->consumer_id)->get()->toArray();
        $data = [
            'no_reply' => Auth::user()->email,
            'email' => $request->email,
            'caretaker_name' => $request->caretaker_name,
            'caretaker_address' => $request->caretaker_address,
            'invoice_date' => $request->invoice_date,
            'incidentReport'=>$incidentReport,
            'subject' => 'Incident Report Inovoice',
        ];
        try {
            $result = Mail::send('website.incident_report_email_send', ['data' => $data], function ($message) use ($data) {
                $message->from($data['no_reply'])->to($data['email'])->subject($data['subject']);

            });
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect()->back()->with('message', 'Submitted Successfully!');
    }

    //Get Notificaion Messages Count
    public function getMessagesCount(){
        try {
            $user_id = Auth::user()->id;
            $company = Company::where('user_id', $user_id)->first();
            if (!$company) {
                $company = Manager::where('user_id', $user_id)->first();
            }
            if (!$company) {
                $company = Caretaker::where('user_id', $user_id)->first();
            }//end if else
            if (auth()->user()->hasrole('company')) {
                $allNotifications = YachtAvailablity::wherenotification(1)->where('company_id', $company->id)->orderBy('id', 'DESC')->get();
            } else {
                $allNotifications = YachtAvailablity::wherenotification(1)->where('company_id', $company->company_id)->orderBy('id', 'DESC')->get();
            }//end if else.
        }catch (\Exception $e) {
            return;
        }
        return (string) view('includes.get_notifications',compact('allNotifications'));
    }//end getMessagesCount function.

    public function GetQuoteNow(Request $request)
    {
        GetQuoteNow::create($request->all());
        return back()->with('success','your message has been send');
    }//end GetQuoteNow function.
    public function AskAQuestion(Request $request)
    {
        AskAQuestion::create($request->all());
        return back()->with('success','your message has been send');
    }//end AskAQuestion function.
    public function testing(){
        echo phpinfo();
    }
    public function feedbackReply(Request $request){
//        return $request->all();
        $feedbackReply = Feedback::where('id', $request->feedback_id)->update(['message_reply'=>$request->feedback_reply_message]);
        return back();
    }

//    Rent Payment Update
    public function rentPaymentUpdate($id,$value,$column){
        if($column == 'bed_amount') {
            $rentPayment = RentPayment::where('id', $id)->update(['bed_amount' => $value]);
        }
        elseif($column == 'rent_date') {
            $rentPayment = RentPayment::where('id', $id)->update(['rent_date' => $value]);
        }
        elseif($column == 'recieved_amount') {
            $rentPayment = RentPayment::where('id', $id)->update(['recieved_amount' => $value]);
        }
        elseif($column == 'due_amount') {
            $rentPayment = RentPayment::where('id', $id)->update(['due_amount' => $value]);
        }

            return back();
    }

//    Medication Update
    public function medicationUpdate($id,$value,$column){
        if($column == 'start_date') {
            $medication = Medication::where('id', $id)->update(['start_date' => $value]);
        }
        elseif($column == 'medication') {
            $medication  = Medication::where('id', $id)->update(['medication' => $value]);
        }
        elseif($column == 'frequency_taken') {
            $medication  = Medication::where('id', $id)->update(['frequency_taken' => $value]);
        }
        return back();
    }
    public function resource(){
        $resource = LearningManagement::get();
        return view('website.resource',compact('resource'));
    }

}