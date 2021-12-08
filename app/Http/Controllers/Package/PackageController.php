<?php

namespace App\Http\Controllers\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Storage;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
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
        $model = str_slug('package','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $package = Package::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $package = Package::paginate($perPage);
            }

            return view('package.package.index', compact('package'));
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
       
        $model = str_slug('package','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('package.package.create');
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
         // dd($request);
        $model = str_slug('package','-');
        $image='';
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'price' => 'required',
            'logo' => 'required',
            'description' => 'required',
            // 'beds' => 'required',
            'managers' => 'required',
            'caretakers' => 'required'


		]);

            $imageName                      = time().'.'.$request->logo->extension(); 
            $file                           = $request->logo;
            $image                          = Storage::disk('website')->put("packages", $file);
            $validatedData["logo"]          = $image;
            $requestData                    = $validatedData["logo"];
            $packages                       = new Package();
            $packages->name                 = $request->name;
            $packages->description          = $request->description;
            $packages->price                = $request->price;
            $packages->logo                 = $validatedData["logo"];
            // $packages->beds                 = $request->beds;
            $packages->managers             = $request->managers;
            $packages->caretakers           = $request->caretakers;
            $packages->status               = $request->status;
            $packages->save();

          

            
            // Package::create($requestData);
            return redirect('package/package')->with('flash_message', 'Package added!');
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
        $model = str_slug('package','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $package = Package::findOrFail($id);
            return view('package.package.show', compact('package'));
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
        $model = str_slug('package','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $package = Package::findOrFail($id);
            return view('package.package.edit', compact('package'));
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
        $model = str_slug('package','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
            'price' => 'required',
            'logo' => 'required',
            'description' => 'required',
            // 'beds' => 'required',
            'managers' => 'required',
            'caretakers' => 'required'

		]);
            $imageName                      = time().'.'.$request->logo->extension(); 
            $file                           = $request->logo;
            $image                          = Storage::disk('website')->put("packages", $file);
            $validatedData["logo"]          = $image;
            $requestData                    = $validatedData["logo"];
            $packages                       = Package::findOrFail($id);
            $packages->name                 = $request->name;
            $packages->description          = $request->description;
            $packages->price                = $request->price;
            $packages->logo                 = $validatedData["logo"];
            // $packages->beds                 = $request->beds;
            $packages->managers             = $request->managers;
            $packages->caretakers           = $request->caretakers;
            $packages->status               = $request->status;
            $packages->save();
            
            // $package = Package::findOrFail($id);
            //  $package->update($requestData);

             return redirect('package/package')->with('flash_message', 'Package updated!');
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
        $model = str_slug('package','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Package::destroy($id);

            return redirect('package/package')->with('flash_message', 'Package deleted!');
        }
        return response(view('403'), 403);

    }
}
