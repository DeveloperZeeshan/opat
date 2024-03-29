<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('/',function (){
    return view('welcome');
})->middleware('auth');*/

/*website routes start here*/
Route::get('/','WebsiteController@index')->name('/');
Route::get('cache-clear',function(){
  
    Artisan::call('optimize:clear');
    echo Artisan::output();
    print_r(Artisan::call('cache:clear'));
    print_r(Artisan::call('config:clear'));die;
    });

Route::get('about','WebsiteController@about')->name('about');
Route::post('Get_Quote_Now','WebsiteController@GetQuoteNow')->name('Get_Quote_Now');
Route::post('AskAQuestion','WebsiteController@AskAQuestion')->name('Ask_A_Question');
//Route::get('Get_Quote_Now','WebsiteController@GetQuoteNow')->name('Get_Quote_Now');
Route::get('news_and_events','WebsiteController@newsAndEvents')->name('news_and_events');
Route::get('blogs','WebsiteController@blogs')->name('blogs');
Route::get('privacy_policy','WebsiteController@privacyPolicy')->name('privacy_policy');
Route::get('faq','WebsiteController@faqs')->name('faq');
Route::get('sign_in','WebsiteController@signIn')->name('sign_in');
Route::get('sign_up/{id?}','WebsiteController@signUp')->name('sign_up');
Route::post('sign_up_custom_package','WebsiteController@signUpCustomPackage')->name('sign_up_custom_package');
Route::post('sign_up_custom_package_process','WebsiteController@signUpCustomPackageProcess')->name('sign_up_custom_package_process');
Route::post('signup_process','WebsiteController@signupProcess')->name('signup_process');
Route::post('submit_sign_in','WebsiteController@signinProcess')->name('submit_sign_in');
Route::post('contact_us','WebsiteController@contactUs')->name('contact_us');
Route::get('get_package_detail/{id?}','WebsiteController@getPackageDetail')->name('get_package_detail');
Route::post('signin_process','WebsiteController@signinProcess')->name('signin_process');
Route::get('packages_details_for_company','WebsiteController@packagesDetailsForcompany')->name('packages_details_for_company');
Route::post('news_letter','WebsiteController@newsLetter')->name('news_letter');
Route::get('about_us','WebsiteController@aboutUs')->name('about_us');
Route::get('check_package_expired_or_not','WebsiteController@checkPackageExpiredOrNot')->name('check_package_expired_or_not');
Route::get('update_company_status/{company_id?}/{user_id?}/{status?}','WebsiteController@updateCompanyStatus')->name('update_company_status');

Route::get('guest_signin_process','WebsiteController@guestSigninProcess')->name('guest_signin_process');
Route::post('creat_consumer_detail_session','WebsiteController@creatConsumerDetailSession')->name('creat_consumer_detail_session');

//transport tracker
Route::post('creat_transport_detail_session','WebsiteController@creatTransportDetailSession')->name('creat_transport_detail_session');





Route::get('/download/','WebsiteController@download')->name('download');





/*website routes end here*/



Route::group(['middleware' => ['auth', 'roles'],'roles' => ['admin','user','company','caretaker','consumer','guest','manager','lms','finance','career']], function () {
    Route::get('/dashboard', 'WebsiteController@dashboard')->name('dashboard');
    Route::get('account-settings','UsersController@getSettings');
    Route::post('account-settings','UsersController@saveSettings');
});

Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin'], function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard.index');
//    });
    Route::get('index2', function (){
        return view('dashboard.index2');
    });
    Route::get('index3', function (){
        return view('dashboard.index3');
    });
    Route::get('index4', function (){
        return view('ecommerce.index4');
    });
    Route::get('products', function (){
        return view('ecommerce.products');
    });
    Route::get('product-detail', function (){
        return view('ecommerce.product-detail');
    });
    Route::get('product-edit', function (){
        return view('ecommerce.product-edit');
    });
    Route::get('product-orders', function (){
        return view('ecommerce.product-orders');
    });
    Route::get('product-cart', function (){
        return view('ecommerce.product-cart');
    });
    Route::get('product-checkout', function (){
        return view('ecommerce.product-checkout');
    });
    Route::get('panels-wells', function (){
        return view('ui-elements.panels-wells');
    });
    Route::get('panel-ui-block', function (){
        return view('ui-elements.panel-ui-block');
    });
    Route::get('portlet-draggable', function (){
        return view('ui-elements.portlet-draggable');
    });
    Route::get('buttons', function (){
        return view('ui-elements.buttons');
    });
    Route::get('tabs', function (){
        return view('ui-elements.tabs');
    });
    Route::get('modals', function (){
        return view('ui-elements.modals');
    });
    Route::get('progressbars', function (){
        return view('ui-elements.progressbars');
    });
    Route::get('notification', function (){
        return view('ui-elements.notification');
    });
    Route::get('carousel', function (){
        return view('ui-elements.carousel');
    });
    Route::get('user-cards', function (){
        return view('ui-elements.user-cards');
    });
    Route::get('timeline', function (){
        return view('ui-elements.timeline');
    });
    Route::get('timeline-horizontal', function (){
        return view('ui-elements.timeline-horizontal');
    });
    Route::get('range-slider', function (){
        return view('ui-elements.range-slider');
    });
    Route::get('ribbons', function (){
        return view('ui-elements.ribbons');
    });
    Route::get('steps', function (){
        return view('ui-elements.steps');
    });
    Route::get('session-idle-timeout', function (){
        return view('ui-elements.session-idle-timeout');
    });
    Route::get('session-timeout', function (){
        return view('ui-elements.session-timeout');
    });
    Route::get('bootstrap-ui', function (){
        return view('ui-elements.bootstrap');
    });
    Route::get('starter-page', function (){
        return view('pages.starter-page');
    });
    Route::get('blank', function (){
        return view('pages.blank');
    });
    Route::get('blank', function (){
        return view('pages.blank');
    });
    Route::get('search-result', function (){
        return view('pages.search-result');
    });
    Route::get('custom-scroll', function (){
        return view('pages.custom-scroll');
    });
    Route::get('lock-screen', function (){
        return view('pages.lock-screen');
    });
    Route::get('recoverpw', function (){
        return view('pages.recoverpw');
    });
    Route::get('animation', function (){
        return view('pages.animation');
    });
    Route::get('profile', function (){
        return view('pages.profile');
    });
    Route::get('invoice', function (){
        return view('pages.invoice');
    });
    Route::get('gallery', function (){
        return view('pages.gallery');
    });
    Route::get('pricing', function (){
        return view('pages.pricing');
    });
    Route::get('400', function (){
        return view('pages.400');
    });
    Route::get('403', function (){
        return view('pages.403');
    });
    Route::get('404', function (){
        return view('pages.404');
    });
    Route::get('500', function (){
        return view('pages.500');
    });
    Route::get('503', function (){
        return view('pages.503');
    });
    Route::get('form-basic', function (){
        return view('forms.form-basic');
    });
    Route::get('form-layout', function (){
        return view('forms.form-layout');
    });
    Route::get('icheck-control', function (){
        return view('forms.icheck-control');
    });
    Route::get('form-advanced', function (){
        return view('forms.form-advanced');
    });
    Route::get('form-upload', function (){
        return view('forms.form-upload');
    });
    Route::get('form-dropzone', function (){
        return view('forms.form-dropzone');
    });
    Route::get('form-pickers', function (){
        return view('forms.form-pickers');
    });
    Route::get('basic-table', function (){
        return view('tables.basic-table');
    });
    Route::get('table-layouts', function (){
        return view('tables.table-layouts');
    });
    Route::get('data-table', function (){
        return view('tables.data-table');
    });
    Route::get('bootstrap-tables', function (){
        return view('tables.bootstrap-tables');
    });
    Route::get('responsive-tables', function (){
        return view('tables.responsive-tables');
    });
    Route::get('editable-tables', function (){
        return view('tables.editable-tables');
    });
    Route::get('inbox', function (){
        return view('inbox.inbox');
    });
    Route::get('inbox-detail', function (){
        return view('inbox.inbox-detail');
    });
    Route::get('compose', function (){
        return view('inbox.compose');
    });
    Route::get('contact', function (){
        return view('inbox.contact');
    });
    Route::get('contact-detail', function (){
        return view('inbox.contact-detail');
    });
    Route::get('calendar', function (){
        return view('extra.calendar');
    });
    Route::get('widgets', function (){
        return view('extra.widgets');
    });
    Route::get('morris-chart', function (){
        return view('charts.morris-chart');
    });
    Route::get('peity-chart', function (){
        return view('charts.peity-chart');
    });
    Route::get('knob-chart', function (){
        return view('charts.knob-chart');
    });
    Route::get('sparkline-chart', function (){
        return view('charts.sparkline-chart');
    });
    Route::get('simple-line', function (){
        return view('icons.simple-line');
    });
    Route::get('fontawesome', function (){
        return view('icons.fontawesome');
    });
    Route::get('map-google', function (){
        return view('maps.map-google');
    });
    Route::get('map-vector', function (){
        return view('maps.map-vector');
    });

    #Permission management
    Route::get('permission-management','PermissionController@getIndex');
    Route::get('permission/create','PermissionController@create');
    Route::post('permission/create','PermissionController@save');
    Route::get('permission/delete/{id}','PermissionController@delete');
    Route::get('permission/edit/{id}','PermissionController@edit');
    Route::post('permission/edit/{id}','PermissionController@update');

    #Role management
    Route::get('role-management','RoleController@getIndex');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@save');
    Route::get('role/delete/{id}','RoleController@delete');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/edit/{id}','RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log','LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    Route::get('users','UsersController@getIndex');
    Route::get('user/create','UsersController@create');
    Route::post('user/create','UsersController@save');
    Route::get('user/edit/{id}','UsersController@edit');
    Route::post('user/edit/{id}','UsersController@update');
    Route::get('user/delete/{id}','UsersController@delete');
    Route::get('user/deleted/','UsersController@getDeletedUsers');
    Route::get('user/restore/{id}','UsersController@restoreUser');
});

//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');


Route::get('auth/{provider}/','Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback','Auth\SocialLoginController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');
Auth::routes();


Auth::routes();



Route::resource('package/package', 'Package\\PackageController');

Route::resource('contact_us/contact-us', 'ContactUs\\ContactUsController');
Route::resource('company/company', 'Company\\CompanyController');
Route::resource('subscription/subscription', 'Subscription\\SubscriptionController');
Route::resource('manager/manager', 'Manager\\ManagerController');

Route::resource('caretaker/caretaker', 'Caretaker\\CaretakerController');
Route::resource('consumer/consumer', 'Consumer\\ConsumerController');
Route::resource('feedback/feedback', 'Feedback\\FeedbackController');
Route::resource('facility/facility', 'Facility\\FacilityController');
Route::resource('educationLevel/education-level', 'EducationLevel\\EducationLevelController');
Route::resource('rentPayment/rent-payment', 'RentPayment\\RentPaymentController');
Route::resource('medication/medication', 'Medication\\MedicationController');
Route::resource('incidentReport/incident-report', 'IncidentReport\\IncidentReportController');
Route::resource('rentSource/rent-source', 'RentSource\\RentSourceController');
Route::resource('mdocAgent/mdoc-agent', 'MdocAgent\\MdocAgentController');
Route::resource('consumerType/consumer-type', 'ConsumerType\\ConsumerTypeController');
Route::resource('jobType/job-type', 'JobType\\JobTypeController');
Route::resource('department/department', 'Department\\DepartmentController');
Route::resource('location/location', 'Location\\LocationController');
Route::resource('job/job', 'Job\\JobController');



//jobs
Route::get('job','WebsiteController@job')->name('job');


Route::post('apply-for-job-process','WebsiteController@applyForJobProcess')->name('apply_for_job_process');
Route::resource('jobRequest/job-request', 'JobRequest\\JobRequestController');
Route::resource('quiz/quiz', 'Quiz\\QuizController');


//Quiz

Route::get('add_qustion_div/{Questions_no?}/{id?}','WebsiteController@addQustionDiv')->name('add_qustion_div');
Route::get('assessment_answer_type_process/{type?}/{qustionno?}/{id?}','WebsiteController@assessmentAnswerTypeProcess')->name('assessment_answer_type_process');

Route::get('assessment','WebsiteController@assessment');
Route::post('quiz-submit','WebsiteController@quizSubmit')->name('quiz_submit');
Route::get('quiz-submit','WebsiteController@quizSubmit')->name('quiz_submit');

Route::resource('learningManagement/learning-management', 'LearningManagement\\LearningManagementController');
Route::resource('userAssessment/user-assessment', 'UserAssessment\\UserAssessmentController');
Route::get('create_lms_id_session/{id?}','WebsiteController@createLmsIdSession')->name('create_lms_id_session');
Route::get('show_lms_id_session/{id?}','WebsiteController@showLmsIdSession')->name('show_lms_id_session');
Route::resource('transportTracker/transport-tracker', 'TransportTracker\\TransportTrackerController');
//Transporrt tracking
Route::get('tracker_id_session/{id?}','WebsiteController@trackerIdSession')->name('tracker_id_session');
Route::get('cognitive_id_session/{id?}','WebsiteController@congitiveIdSession')->name('cognitive_id_session');
Route::get('service_id_session/{id?}','WebsiteController@serviceIdSession')->name('service_id_session');
Route::get('quick_links','WebsiteController@quickLinks')->name('quick_links');
//Route::get('calendar','WebsiteController@calendar')->name('calendar');
Route::resource('finance/finance', 'Finance\\FinanceController');
//Edit Rentpayment
Route::get('rent_payment_edit_record/{id?}', 'WebsiteController@rentPaymentEditRecord')->name('rent_payment_edit_record');
Route::post('check_email', 'WebsiteController@checkEmail')->name('check_email');
Route::get('calculate_milleage/{pickup?}/{drop_off?}' ,'WebsiteController@calculateMilleage')->name('calculate_milleage');
Route::get('learning' ,'WebsiteController@learnin
g')->name('learning');

//send email
Route::post('send-email' ,'WebsiteController@sendEmail')->name('send_email');

//transport tracker sub index page
Route::get('transport_tracker' ,'WebsiteController@subIndexTransportTracker')->name('sub_index');
//Rent Payment sub index page
Route::get('sub-index-rent-payment' ,'WebsiteController@subIndexRentPayment')->name('sub_index_rent_payment');
//Rent Payment email
Route::post('rent_payment_email' ,'WebsiteController@rentPaymentEmail')->name('rent_payment_email');
//Medication email
Route::post('medication_email' ,'WebsiteController@consumerMedicationEmail')->name('medication_email');
//Incident Report email
Route::post('incident_report_email' ,'WebsiteController@incidentReportEmail')->name('incident_report_email');
Route::resource('cognitivePsycological/cognitive-psycological', 'CognitivePsycological\\CognitivePsycologicalController');

//calender

Route::get('calendar/{id?}', 'YachtAvailablityController@index')->name('yacht-availablity');
Route::post('yacht-availablity-process', 'YachtAvailablityController@yachtAvailablityProcess')->name('yacht-availablity-process');
Route::get('get-events', 'YachtAvailablityController@getEvents')->name('get-events');
Route::post('delete-yacht-availablity', 'YachtAvailablityController@deleteYachtAvailablity')->name('delete-yacht-availablity');
Route::resource('socialServiceEligibility/social-service-eligibility', 'SocialServiceEligibility\\SocialServiceEligibilityController');

//Get Messages Count
Route::get('get_messages_count','WebsiteController@getMessagesCount')->name('get_messages_count');
//Feedback Reply
Route::post('feedback_reply','WebsiteController@feedbackReply')->name('feedback_reply');
Route::get('testing','WebsiteController@testing');
Route::resource('page/page', 'Page\\PageController');
Route::resource('ourSolution/our-solution', 'OurSolution\\OurSolutionController');
Route::resource('affordableCare/affordable-care', 'AffordableCare\\AffordableCareController');
Route::resource('providesYourCare/provides-your-care', 'ProvidesYourCare\\ProvidesYourCareController');
Route::resource('resource/resource', 'Resource\\ResourceController');
Route::resource('leadership/leadership', 'Leadership\\LeadershipController');
Route::resource('newsAndEvent/news-and-event', 'NewsAndEvent\\NewsAndEventController');
Route::resource('fAQ/f-a-q', 'FAQ\\FAQController');
Route::resource('getQuoteNow/get-quote-now', 'GetQuoteNow\\GetQuoteNowController');
Route::resource('askAQuestion/ask-a-question', 'AskAQuestion\\AskAQuestionController');

//Rent Payment Update
Route::get('rent_payment_update/{id?}/{value?}/{column?}' ,'WebsiteController@rentPaymentUpdate')->name('rent_payment_update');
Route::get('medication_update/{id?}/{value?}/{column?}' ,'WebsiteController@medicationUpdate')->name('medication_update');
Route::get('resource' ,'WebsiteController@resource')->name('resource');
