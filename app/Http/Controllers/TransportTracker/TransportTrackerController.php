<?php

namespace App\Http\Controllers\TransportTracker;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Session;
use App\TransportTracker;
use App\Consumer;
use Illuminate\Http\Request;
use URL;
class TransportTrackerController extends Controller
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
//            return URL::previous();
        if (Session::has('tracker_session_id') && app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'consumer.show') {
            $consumer_id = Session::get('tracker_session_id');
            $model = str_slug('transporttracker', '-');
            if (auth()->user()->permissions()->where('name', '=', 'view-' . $model)->first() != null) {
                $keyword = $request->get('search');
                $perPage = 25;

                if (!empty($keyword)) {
                    $transporttracker = TransportTracker::orderBy('id', 'DESC')->groupBy('consumer_id')->where('consumer_id', 'LIKE', "%$keyword%")
                        ->orWhere('pickup', 'LIKE', "%$keyword%")
                        ->orWhere('drop_off', 'LIKE', "%$keyword%")
                        ->orWhere('amount', 'LIKE', "%$keyword%")
                        ->orWhere('distance', 'LIKE', "%$keyword%")
                        ->orWhere('added_by', 'LIKE', "%$keyword%")
                        ->orWhere('status', 'LIKE', "%$keyword%")
                        ->paginate($perPage);
                } else {
                    $customerVisit = TransportTracker::pluck('purpose')->count();
                    $milleage = TransportTracker::pluck('milleage')->sum();
                    $milleage = round($milleage, 2);
                    $amount = TransportTracker::pluck('amount')->sum();
                    $amount = round($amount, 2);
                    $visitors = TransportTracker::count();
                    $transporttracker = TransportTracker::where('consumer_id', $consumer_id)->orderBy('id', 'DESC')->groupBy('consumer_id')->paginate($perPage);
                    return view('transportTracker.transport-tracker.index', compact('transporttracker', 'customerVisit', 'milleage', 'amount', 'visitors'));
                }
            }
        }else {
            $model = str_slug('transporttracker', '-');
                if (auth()->user()->permissions()->where('name', '=', 'view-' . $model)->first() != null) {
                    $keyword = $request->get('search');
                    $perPage = 25;

                    if (!empty($keyword)) {
                        $transporttracker = TransportTracker::orderBy('id', 'DESC')->groupBy('consumer_id')->where('consumer_id', 'LIKE', "%$keyword%")
                            ->orWhere('pickup', 'LIKE', "%$keyword%")
                            ->orWhere('drop_off', 'LIKE', "%$keyword%")
                            ->orWhere('amount', 'LIKE', "%$keyword%")
                            ->orWhere('distance', 'LIKE', "%$keyword%")
                            ->orWhere('added_by', 'LIKE', "%$keyword%")
                            ->orWhere('status', 'LIKE', "%$keyword%")
                            ->paginate($perPage);
                    } else {
                        $customerVisit = TransportTracker::pluck('purpose')->count();
                        $milleage = TransportTracker::pluck('milleage')->sum();
                        $milleage = round($milleage, 2);
                        $amount = TransportTracker::pluck('amount')->sum();
                        $amount = round($amount, 2);
                        $visitors = TransportTracker::count();
                        $transporttracker = TransportTracker::orderBy('id', 'DESC')->groupBy('consumer_id')->paginate($perPage);
                    }
                }

                return view('transportTracker.transport-tracker.index', compact('transporttracker', 'customerVisit', 'milleage', 'amount', 'visitors'));
            }
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('transporttracker','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $tracker_session_id = Session::get('tracker_session_id');
            $consumer = Consumer::find($tracker_session_id);
            return view('transportTracker.transport-tracker.create',compact('consumer'));
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
        $model = str_slug('transporttracker','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
               
            $request->all();
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
                    $ditance = round($distance,2);
                    $duration = $result[0]->elements[0]->duration->value;
                    $duration = $duration / 3600;
                    $estimated_cost = ($distance*5);
                    $estimated_cost = round($estimated_cost, 1);
                    $quotation['duration'] = $result[0]->elements[0]->duration->text;
                // $quotation['distances'] = $result[0]->elements[0]->distance->text; 
                // $quotation['estimated_cost'] = round($estimated_cost);
               
            } catch (\Exception $e) {
                return $e->getMessage();
                return back();
            }

        
//           return $requestData = $request->all();
            
            TransportTracker::create(['consumer_name'=>$request->consumer_name,'consumer_id'=>$request->consumer_id,'pickup'=>$request->pickup,'drop_off'=>$request->drop_off,'added_by'=>$request->added_by,'amount'=>$estimated_cost,'milleage'=>$distance ,'notes'=>$request->notes,'purpose'=>$request->purpose,'time'=>$quotation['duration'],'status'=>$request->status]);
            return redirect('transportTracker/transport-tracker')->with('flash_message', 'TransportTracker added!');
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
        $model = str_slug('transporttracker','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $transporttracker = TransportTracker::findOrFail($id);
            return view('transportTracker.transport-tracker.show',compact('transporttracker'));
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
        $model = str_slug('transporttracker','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $tracker_session_id = Session::get('tracker_session_id');
            $consumer = Consumer::find($tracker_session_id);
            $transporttracker = TransportTracker::findOrFail($id);
            return view('transportTracker.transport-tracker.edit',compact('consumer','transporttracker'));
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
        $model = str_slug('transporttracker','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
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
                $ditance = round($distance, 1);
                $duration = $result[0]->elements[0]->duration->value;
                $duration = $duration / 3600;
                $estimated_cost = ($distance*5);
                $estimated_cost = round($estimated_cost, 1);
                // $quotation['distances'] = $result[0]->elements[0]->distance->text;
                // $quotation['duration'] = $result[0]->elements[0]->duration->text;
                // $quotation['estimated_cost'] = round($estimated_cost);

            } catch (\Exception $e) {
                return $e->getMessage();
                return back();
            }
            $requestData = $request->all();
            
             $transporttracker = TransportTracker::findOrFail($id);
             $transporttracker->update($requestData);

             return redirect('transportTracker/transport-tracker')->with('flash_message', 'TransportTracker updated!');
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
        $model = str_slug('transporttracker','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            TransportTracker::destroy($id);

            return redirect('transportTracker/transport-tracker')->with('flash_message', 'TransportTracker deleted!');
        }
        return response(view('403'), 403);

    }
}
