<?php

namespace App\Http\Controllers\LearningManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Storage;
use Auth;
use App\LearningManagement;
use Illuminate\Http\Request;
use App\Consumer;
use App\Quiz;
use App\User;
use App\Company;
use App\Manager;
class LearningManagementController extends Controller
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
        $model = str_slug('learningmanagement','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $learningmanagement = LearningManagement::where('lecture', 'LIKE', "%$keyword%")
                ->orWhere('upload_file', 'LIKE', "%$keyword%")
                ->orWhere('upload_video', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                if(auth()->user()->hasRole('company') || auth()->user()->hasRole('manager') ){
                  $quiz = Quiz::where('user_id',Auth()->user()->id)->paginate($perPage);
                }else{
                 $learningmanagement = learningmanagement::paginate($perPage);
                }//end if else.
               
            }
            return view('learningManagement.learning-management.index', compact('learningmanagement'));
        }
        return response(view('403'), 403);

    }

        //Don't delete
        // if(auth()->user()->hasRole('company') || auth()->user()->hasRole('manager') ){
        //             $learningmanagement = LearningManagement::where('user_id',Auth()->user()->id)->paginate($perPage);
        //         }else{
        //          if(isset(Auth::user()->getConsumerDetail) && Auth::user()->getConsumerDetail->company_id){
        //             $companyForConsumer = Auth::user()->getConsumerDetail->company_id;
        //             $user_idManager = Manager::where('company_id',$companyForConsumer)->pluck('user_id');
        //             $user_idCompany = Company::where('id',$companyForConsumer)->pluck('user_id');

        //         }elseif(isset(Auth::user()->getManagerDetail) && Auth::user()->getManagerDetail->company_id){
        //             $companyForConsumer = Auth::user()->getManagerDetail->company_id;
        //             $user_idManager = Manager::where('company_id',$companyForConsumer)->pluck('user_id');
        //             $user_idCompany = Company::where('id',$companyForConsumer)->pluck('user_id');
        //         }//end if.
          // $learningmanagement = LearningManagement::whereIn('user_id',$user_idManager)->Orwhere('user_id',$user_idCompany)->paginate($perPage);
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('learningmanagement','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('learningManagement.learning-management.create');
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
        $model = str_slug('learningmanagement','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            if ($request->hasFile('upload_video')) {
                try {
                   $video = Storage::disk('website')->put('video', $request->upload_video??'');
                } catch (\Exception $e) {
                }
            }
//            if ($request->hasFile('upload_file')) {
//                try {
//                   $file = Storage::disk('website')->put('file', $request->upload_file??'');
//                } catch (\Exception $e) {
//                }
//            }
            $requestData['lecture'] = $request->lecture??'';
            $requestData['description'] = $request->description??'';
            $requestData['upload_video'] = $video??'';
            $requestData['link'] = $request->link??'';
            $requestData['user_id'] =  Auth::id();
//            $requestData['upload_video'] = $video??'';
//            $requestData['status'] = $request->status??'';
            LearningManagement::create($requestData);
            return redirect('learningManagement/learning-management')->with('flash_message', 'LearningManagement added!');
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
        $model = str_slug('learningmanagement','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $learningmanagement = LearningManagement::findOrFail($id);
            return view('learningManagement.learning-management.show', compact('learningmanagement'));
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
        $model = str_slug('learningmanagement','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $learningmanagement = LearningManagement::findOrFail($id);
            return view('learningManagement.learning-management.edit', compact('learningmanagement'));
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
        $model = str_slug('learningmanagement','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
             $requestData = $request->all();
            if ($request->hasFile('upload_video')) {
                try {
                    $video = Storage::disk('website')->put('video', $request->upload_video??'');
                    $requestData['upload_video'] = $video;
                    $learningmanagement = LearningManagement::findOrFail($id);
                    $learningmanagement->update($requestData);

                } catch (\Exception $e) {
                }
            }//end trycatch.
            else{

            }
//            if($request->hasFile('upload_file')){
//                try{
//                $file      = Storage::disk('website')->put('file',$request->upload_file??'');
//                $requestData['upload_file'] = $file;
//                $learningmanagement = LearningManagement::findOrFail($id);
//                $learningmanagement->update($requestData);
//                }catch(\Exception $e){
//                }
//            }
            $requestData['lecture'] = $request->lecture;
            $requestData['description'] = $request->description;
            $requestData['link'] = $request->link;
//            $requestData['status'] = $request->status;
            $learningmanagement = LearningManagement::findOrFail($id);
             $learningmanagement->update($requestData);

             return redirect('learningManagement/learning-management')->with('flash_message', 'LearningManagement updated!');
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
        $model = str_slug('learningmanagement','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            LearningManagement::destroy($id);

            return redirect('learningManagement/learning-management')->with('flash_message', 'LearningManagement deleted!');
        }
        return response(view('403'), 403);

    }
}
