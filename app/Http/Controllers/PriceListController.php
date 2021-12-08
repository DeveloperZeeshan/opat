<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\PriceList;
use Illuminate\Http\Request;
use App\YachtType;
use App\Period;
class PriceListController extends Controller
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
        $model = str_slug('price-list','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null || true) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $priceList = PriceList::where('name', 'LIKE', "%$keyword%")
                ->orWhere('price_detail', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $priceList = PriceList::paginate($perPage);
            }

            return view('price-list.price-list.index', compact('priceList'));
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
        $yachtTypes = YachtType::with('getPriceList')->get();
        $periods   = Period::get();
        $model = str_slug('price-list','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null || true) {
            return view('price-list.price-list.create',compact('yachtTypes','periods'));
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
        $model = str_slug('price-list','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null || true) {
            
            $requestData = $request->all();
            foreach ($request->period_id as $key => $value) {
                PriceList::create(['yacht_type_id'=>$request->yacht_type_id,'period_id'=>$value,'price_detail'=>$request->price_detail[$key]]);
            }//end if else.
            return redirect('price-list')->with('flash_message', 'Price Added!');
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
        $model = str_slug('price-list','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null || true) {
            $priceList = PriceList::findOrFail($id);
            return view('price-list.price-list.show', compact('priceList'));
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
        $model = str_slug('price-list','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null ||true) {
            $priceList = PriceList::findOrFail($id);
            return view('price-list.price-list.edit', compact('priceList'));
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
        $model = str_slug('price-list','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null || true) {
            
            $requestData = $request->all();
            
            $offer = PriceList::findOrFail($id);
             $offer->update($requestData);

             return redirect('price-list')->with('flash_message', 'Price List Request updated!');
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
        $model = str_slug('price-list','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null || true) {
            PriceList::destroy($id);

            return redirect('price-list')->with('flash_message', 'Price Deleted!');
        }
        return response(view('403'), 403);

    }
}
