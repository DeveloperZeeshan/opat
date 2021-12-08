<?php

namespace App\Http\Controllers\NewsLetter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
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
        $model = str_slug('newsletter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $newsletter = NewsLetter::where('email', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $newsletter = NewsLetter::paginate($perPage);
            }

            return view('newsletter.news-letter.index', compact('newsletter'));
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
        $model = str_slug('newsletter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('newsletter.news-letter.create');
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
        $model = str_slug('newsletter','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'email' => 'required'
		]);
            $requestData = $request->all();
            
            NewsLetter::create($requestData);
            return redirect('newsletter/news-letter')->with('flash_message', 'NewsLetter added!');
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
        $model = str_slug('newsletter','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $newsletter = NewsLetter::findOrFail($id);
            return view('newsletter.news-letter.show', compact('newsletter'));
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
        $model = str_slug('newsletter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $newsletter = NewsLetter::findOrFail($id);
            return view('newsletter.news-letter.edit', compact('newsletter'));
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
        $model = str_slug('newsletter','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'email' => 'required'
		]);
            $requestData = $request->all();
            
            $newsletter = NewsLetter::findOrFail($id);
             $newsletter->update($requestData);

             return redirect('newsletter/news-letter')->with('flash_message', 'NewsLetter updated!');
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
        $model = str_slug('newsletter','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            NewsLetter::destroy($id);

            return redirect('newsletter/news-letter')->with('flash_message', 'NewsLetter deleted!');
        }
        return response(view('403'), 403);

    }
}
