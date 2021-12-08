<?php

namespace App\Http\Controllers\Yacht;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Yacht;
use App\YachtType;
use App\CharterType;
use App\GalleryImage;
use Illuminate\Http\Request;
use Storage;
class YachtController extends Controller
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
        $model = str_slug('yacht','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null ||true) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $yacht = Yacht::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $yacht = Yacht::paginate($perPage);
            }

            return view('yacht.yacht.index', compact('yacht'));
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
        $yachtTypes   = YachtType::all();
        $charterTypes = CharterType::all();
        $model = str_slug('yacht','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null || true) {
            return view('yacht.yacht.create',compact('yachtTypes','charterTypes'));
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
        extract($request->all());
        $background_image   ='';
        $foreground_image   ='';
        $search_result_image='';
        $specification_image='';
        try{
            $background_image    = Storage::disk('website')->put('yachts', $request->background_image);
            $foreground_image    = Storage::disk('website')->put('yachts', $request->foreground_image);
            $search_result_image = Storage::disk('website')->put('yachts', $request->search_result_image);
            $specification_image = Storage::disk('website')->put('yachts', $request->specification_image);
        }catch(\Exception $e){}//end trycatch.
        if(isset($charter_type_id)){
            $charter_type_id = implode(',',$charter_type_id);
        }else{
            $charter_type_id = '';
        }//end if.
        $requestData =  ['name'=>$name,'yacht_type_id'=>$yacht_type_id,'charter_type_id'=>$charter_type_id,'cabins'=>$cabins??"",'berths'=>$berths,'owner_email'=>$owner_email,'description'=>$description,'background_image'=>$background_image,'foreground_image'=>$foreground_image,'search_result_image'=>$search_result_image,'embed_video_id'=>$embed_video_id,'specification_text'=>$specification_text,'specification_image'=>$specification_image,'loa'=>$loa,'beam'=>$beam??"",'draft'=>$draft,'sail_area'=>$sail_area,'engine'=>$engine,'fuel_tank'=>$fuel_tank,'water_tank'=>$water_tank??"",'base'=>$base,'base_text'=>$base_text,'model'=>$model,'ship_owner'=>$ship_owner,'company_full_address'=>$company_full_address,'tax_number'=>$tax_number,'tax_office'=>$tax_office,'built_year'=>$built_year,'port_of_registry'=>$port_of_registry,'number_of_registry'=>$number_of_registry,'license_registry_number'=>$license_registry_number];
        $model = str_slug('yacht','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null || true) {
            $this->validate($request, [
			'name' => 'required'
		]);        
           $yacht = Yacht::create($requestData);
            if(isset($gallery_images)){
                foreach ($gallery_images as $key => $gallery_image) {
                    $gallery_image       = Storage::disk('website')->put('yachts', $request->gallery_images[$key]);
                    GalleryImage::create(['yacht_id'=>$yacht->id,'name'=>$gallery_image]);    
                }//end foreach        
            }//end if.
            return redirect('Yacht/yacht')->with('flash_message', 'Yacht added!');
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
        $model = str_slug('yacht','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null ||true) {
            $yacht = Yacht::findOrFail($id);
            return view('yacht.yacht.show', compact('yacht'));
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
        $yachtTypes   = YachtType::all();
        $charterTypes = CharterType::all();
        $model = str_slug('yacht','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null ||true) {
            $yacht = Yacht::findOrFail($id);
            return view('yacht.yacht.edit', compact('yacht','yachtTypes','charterTypes'));
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
        extract($request->all());
        $model = str_slug('yacht','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null ||true) {
            $this->validate($request, [
	           'name' => 'required'
            ]);
            $requestData = $request->all();
            if (isset($request->charter_type_id)) {
                $request->merge(['charter_type_id' => implode(',',$request->charter_type_id)]);     
            }//end if.
            $yacht = Yacht::findOrFail($id);
            if ($image_delete[0]!=null) {
                foreach($image_delete as $val){
                    if (strpos($val, ',') !== false) {
                        foreach (explode(',',$val) as $key => $column_name) {
                           Yacht::where('id',$id)->update([$column_name=>' ']);
                        }//end foreach.
                    }else{
                        Yacht::where('id',$id)->update([$val=>' ']);
                    }//end if else.
                }//end foreach.
            }//END IF
            if ($image_delete_gallry[0]!=null) {
                foreach($image_delete_gallry as $val){
                    if (strpos($val, ',') !== false) {
                        foreach (explode(',',$val) as $key => $gallery_id) {
                            GalleryImage::destroy($gallery_id);
                        }//end foreach.
                    }else{
                        GalleryImage::destroy($val);
                    }//end if else.
                }//end foreach.
            }//END IF

            $background_image   =$yacht->background_image??"";
            $foreground_image   =$yacht->foreground_image??'';
            $search_result_image=$yacht->search_result_image??'';
            $specification_image=$yacht->specification_image??'';
            try{
                $background_image    = Storage::disk('website')->put('yachts', $request->background_image);
                $foreground_image    = Storage::disk('website')->put('yachts', $request->foreground_image);
                $search_result_image = Storage::disk('website')->put('yachts', $request->search_result_image);
                $specification_image = Storage::disk('website')->put('yachts', $request->specification_image);
            }catch(\Exception $e){  }//end trycatch.

            if(isset($request->gallery_images)){
                foreach ($gallery_images as $key => $gallery_image) {
                    $gallery_image       = Storage::disk('website')->put('yachts', $request->gallery_images[$key]);
                    GalleryImage::create(['yacht_id'=>$yacht->id,'name'=>$gallery_image]);    
                }//end foreach        
            }//end if.
            if(isset($charter_type_id)){
                $charter_type_id = implode(',',$charter_type_id);
            }else{
                $charter_type_id = '';
            }//end if.
            $requestData =  ['name'=>$name,'yacht_type_id'=>$yacht_type_id,'charter_type_id'=>$charter_type_id,'cabins'=>$cabins??"",'berths'=>$berths,'owner_email'=>$owner_email,'description'=>$description,'background_image'=>$background_image,'foreground_image'=>$foreground_image,'search_result_image'=>$search_result_image,'embed_video_id'=>$embed_video_id,'specification_text'=>$specification_text,'specification_image'=>$specification_image,'loa'=>$loa,'beam'=>$beam??"",'draft'=>$draft,'sail_area'=>$sail_area,'engine'=>$engine,'fuel_tank'=>$fuel_tank,'water_tank'=>$water_tank??"",'base'=>$base,'base_text'=>$base_text,'model'=>$model,'ship_owner'=>$ship_owner,'company_full_address'=>$company_full_address,'tax_number'=>$tax_number,'tax_office'=>$tax_office,'built_year'=>$built_year,'port_of_registry'=>$port_of_registry,'number_of_registry'=>$number_of_registry,'license_registry_number'=>$license_registry_number];
            $yacht->update($requestData);
            return redirect('Yacht/yacht')->with('flash_message', 'Yacht updated!');
        }//end if.
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
        $model = str_slug('yacht','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null ||true) {
            Yacht::destroy($id);

            return redirect('Yacht/yacht')->with('flash_message', 'Yacht deleted!');
        }
        return response(view('403'), 403);

    }
}
