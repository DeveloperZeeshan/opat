<?php

namespace App\Http\Controllers\NewsAndEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\NewsAndEvent;
use Illuminate\Http\Request;
use Storage;

class NewsAndEventController extends Controller
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
        $model = str_slug('newsandevent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $newsandevent = NewsAndEvent::where('image', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('event_title', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $newsandevent = NewsAndEvent::paginate($perPage);
            }

            return view('newsAndEvent.news-and-event.index', compact('newsandevent'));
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
        $model = str_slug('newsandevent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('newsAndEvent.news-and-event.create');
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
        $model = str_slug('newsandevent','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }

            NewsAndEvent::create($requestData);
            return redirect('newsAndEvent/news-and-event')->with('flash_message', 'NewsAndEvent added!');
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
        $model = str_slug('newsandevent','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $newsandevent = NewsAndEvent::findOrFail($id);
            return view('newsAndEvent.news-and-event.show', compact('newsandevent'));
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
        $model = str_slug('newsandevent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $newsandevent = NewsAndEvent::findOrFail($id);
            return view('newsAndEvent.news-and-event.edit', compact('newsandevent'));
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
        $model = str_slug('newsandevent','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            if($request->hasFile('image')) {
            try {
                $image = Storage::disk('website')->put('image', $request->image??'');
                $requestData['image'] = $image;
            }catch (\Exception $e) {}//end try catch.
         }

            $newsandevent = NewsAndEvent::findOrFail($id);
             $newsandevent->update($requestData);

             return redirect('newsAndEvent/news-and-event')->with('flash_message', 'NewsAndEvent updated!');
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
        $model = str_slug('newsandevent','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            NewsAndEvent::destroy($id);

            return redirect('newsAndEvent/news-and-event')->with('flash_message', 'NewsAndEvent deleted!');
        }
        return response(view('403'), 403);

    }
}
