<?php

namespace App\Http\Controllers\DocsAndInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\DocsAndInfo;
use Illuminate\Http\Request;
use Storage;
class DocsAndInfoController extends Controller
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
        $model = str_slug('docsandinfo','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $docsandinfo = DocsAndInfo::where('name', 'LIKE', "%$keyword%")
                ->orWhere('file', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $docsandinfo = DocsAndInfo::paginate($perPage);
            }

            return view('docsandinfo.docs-and-info.index', compact('docsandinfo'));
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
        $model = str_slug('docsandinfo','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('docsandinfo.docs-and-info.create');
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
        $model = str_slug('docsandinfo','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'file' => 'required|max:10000|mimes:doc,docx,pdf,xlsx,xls,jpg,png,jpeg,ppt,pptx,txt,pdf'
		]);
        //here Storage::disk('website') is the storage disk setup menually in filesystem.php for uploading website files/images.     
            $file='';
            try{
                $file = Storage::disk('website')->put('docsandinfo', $request->file);
            }catch(\Exception $e){}//end trycatch.            
            DocsAndInfo::create(['name'=>$request->name,'file'=>$file]);
            return redirect('docsandinfo/docs-and-info')->with('flash_message', 'Docs And Info added!');
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
        $model = str_slug('docsandinfo','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $docsandinfo = DocsAndInfo::findOrFail($id);
            return view('docsandinfo.docs-and-info.show', compact('docsandinfo'));
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
        $model = str_slug('docsandinfo','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $docsandinfo = DocsAndInfo::findOrFail($id);
            return view('docsandinfo.docs-and-info.edit', compact('docsandinfo'));
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
        $model = str_slug('docsandinfo','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'file' => 'max:10000|mimes:doc,docx,pdf,xlsx,xls,jpg,png,jpeg,ppt,pptx,txt,pdf'
		]);
            $requestData = $request->all();
            
            $docsandinfo = DocsAndInfo::findOrFail($id);
            $file =$docsandinfo->file;
            if ($request->file) {
                $file = Storage::disk('website')->put('docsandinfo', $request->file);
            }//end if.
            $docsandinfo->update(['name'=>$request->name,'file'=>$file]);
            return redirect('docsandinfo/docs-and-info')->with('flash_message', 'DocsAndInfo updated!');
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
        $model = str_slug('docsandinfo','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            $doc = DocsAndInfo::find($id);
            \File::delete(public_path('website').'/'.$doc->file);;
            DocsAndInfo::destroy($id);
            return redirect('docsandinfo/docs-and-info')->with('flash_message', 'DocsAndInfo deleted!');
        }
        return response(view('403'), 403);

    }
}
