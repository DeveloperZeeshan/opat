<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use App\Consumer;
use App\Quiz;
use App\User;
use App\Company;
use App\Manager;
use Session;
use Illuminate\Http\Request;

class QuizController extends Controller
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
        $model = str_slug('quiz','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $quiz = Quiz::where('question', 'LIKE', "%$keyword%")
                ->orWhere('answer', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                if(auth()->user()->hasRole('company') || auth()->user()->hasRole('manager') ){
                  $quiz = Quiz::where('user_id',Auth()->user()->id)->paginate($perPage);
                }else{
                 $quiz = Quiz::paginate($perPage);
                }//end if else.
               
            }
            return view('quiz.quiz.index', compact('quiz'));
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
        $model = str_slug('quiz','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
             $lms_session_id = Session::get('lms_session_id');
            return view('quiz.quiz.create',compact('lms_session_id'));
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
        // return $request->all();
        $model = str_slug('quiz','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            foreach ($request->question as $key => $item) {

                    Quiz::create([
                        'question'       => $item['question'],
                        'question_type'  => $item['type'],
                        'option'         => json_encode($item['option']??['123','sdsd']),
                        'correct_answer' => $item['Ans']??'',
                        'user_id' => Auth()->user()->id,
                        'lms_id' => $request->lms_id,
                    ]);
                }
            return redirect('quiz/quiz')->with('flash_message', 'Quiz added!');
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
        //dont delete.
        // Consumer::where('user_id',$user_id)->first();;
        $model = str_slug('quiz','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            // return Auth()->user();
        //     // return $company = Company::where('user_id',Auth()->user()->$id)->get();
        // $user_id                = Auth::user()->id;
        // $company                =  Company::where('company_id',auth()->user()->getCompanyDetail->id)->first(); 
        // if (!$company) {
        //     $company                =  Manager::where('user_id',$user_id)->first(); 
        // }
        //     $assessment = Quiz::where('comapny_id', $company_id)->get();
         
        if(isset(Auth::user()->getConsumerDetail) && Auth::user()->getConsumerDetail->company_id){
            $companyForConsumer = Auth::user()->getConsumerDetail->company_id;
            $user_idManager = Manager::where('company_id',$companyForConsumer)->pluck('user_id');
            $user_idCompany = Company::where('company_id',$companyForConsumer)->pluck('user_id');
        }elseif(isset(Auth::user()->getManagerDetail) && Auth::user()->getManagerDetail->company_id){
            $companyForConsumer = Auth::user()->getManagerDetail->company_id;
            $user_idManager = Manager::where('company_id',$companyForConsumer)->pluck('user_id'); 
            $user_idCompany = Company::where('company_id',$companyForConsumer)->pluck('user_id');
        }//end if.
            $assessment = Quiz::whereIn('user_id',$user_idManager)->Orwhere('user_id',$user_idCompany)->get();
             $lms_session_id = Session::get('lms_session_id');
            return view('quiz.quiz.show', compact('assessment','lms_session_id'));
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
        $model = str_slug('quiz','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $quiz = Quiz::findOrFail($id);
            return view('quiz.quiz.edit', compact('quiz'));
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
        $model = str_slug('quiz','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
             foreach ($request->question as $key => $item) {
                    $quiz = Quiz::findOrFail($id);
                    $quiz->update([
                        'question'       => $item['question'],
                        'question_type'  => $item['type'],
                        'option'         => json_encode($item['option']??['123','sdsd']),
                        'correct_answer' => $item['Ans']??'',
                        'user_id' => Auth()->user()->id,
                    ]);
                }

             return redirect('quiz/quiz')->with('flash_message', 'Quiz updated!');
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
        $model = str_slug('quiz','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Quiz::destroy($id);

            return redirect('quiz/quiz')->with('flash_message', 'Quiz deleted!');
        }
        return response(view('403'), 403);

    }
}
