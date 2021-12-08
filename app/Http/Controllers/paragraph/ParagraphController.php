<?php

namespace App\Http\Controllers\paragraph;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Paragraph;
use Illuminate\Http\Request;

class ParagraphController extends Controller
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
        $model = str_slug('paragraph','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $paragraph = Paragraph::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $paragraph = Paragraph::paginate($perPage);
            }

            return view('paragraph.paragraph.index', compact('paragraph'));
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
        $model = str_slug('paragraph','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('paragraph.paragraph.create');
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
        $model = str_slug('paragraph','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required',
			'description' => 'required'
		]);
            $requestData = $request->all();
            
            Paragraph::create($requestData);
            return redirect('paragraph/paragraph')->with('flash_message', 'Paragraph added!');
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
        $model = str_slug('paragraph','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $paragraph = Paragraph::findOrFail($id);
            return view('paragraph.paragraph.show', compact('paragraph'));
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
        $model = str_slug('paragraph','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $paragraph = Paragraph::findOrFail($id);
            return view('paragraph.paragraph.edit', compact('paragraph'));
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

        $model = str_slug('paragraph','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'description' => 'required'
		]);
            $requestData = $request->all();
            
            $paragraph = Paragraph::findOrFail($id);
             $paragraph->update($requestData);

             return redirect('paragraph/paragraph')->with('flash_message', 'Paragraph updated!');
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
        $model = str_slug('paragraph','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Paragraph::destroy($id);

            return redirect('paragraph/paragraph')->with('flash_message', 'Paragraph deleted!');
        }
        return response(view('403'), 403);

    }
}
