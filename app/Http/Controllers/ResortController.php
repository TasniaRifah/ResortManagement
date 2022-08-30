<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResortRequest;
use App\Models\Resort;
use App\Models\ResortImage;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ResortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $search=$request['search']??"";
        if($search!=""){
             $resorts=Resort::where('title','LIKE', '%' . $search . '%')->paginate(5);
        }
        else{
            $resorts = Resort::latest()->with('resourt_images')->paginate(5);
        }
      
 
        return view('backend.resorts.index',compact('resorts','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.resorts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResortRequest $request)
    {
        try {
       
           $resort = new Resort();
           $resort->title = $request->input('title');
           $resort->rent = $request->input('rent');
           $resort->description = $request->input('description');
           $resort->is_active = $request->input('is_active') ?? 0;
           $resort->save();

           if($resort->save()){
            if ($request->hasfile('filenames')) {

                $images = $request->file('filenames');
    
                foreach($images as $image) {
                    $name = $image->getClientOriginalName();
                    $path = $image->storeAs('uploads', $name, 'public');
    
                    $resort_image = new ResortImage();
                    $resort_image->resort_id = $resort->id;
                    $resort_image->image_uri = $path;
                    $resort_image->save();
                }
             }
           }
            
            
            // ]);
        
           
            //  Resort::create($requestData);
// dd($requestData);
           
             
             Session::flash('message', 'Created Successfully!');
             return redirect()->route('resorts.index');
         } catch (QueryException $e) {
 
             return Redirect::back()->withInput()->withErrors($e->getMessage());
         }
        return view('backend.resorts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resort  $resort
     * @return \Illuminate\Http\Response
     */
    public function show(Resort $resort)
    {
        return view('backend.resorts.show', compact('resort'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resort  $resort
     * @return \Illuminate\Http\Response
     */
    public function edit(Resort $resort)

    {
        $images = ResortImage::where('resort_id', '=', $resort->id)->get();
        return view('backend.resorts.edit', compact( 'resort', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resort  $resort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resort $resort)
    {
          
        try {
            $requestData = $request->all();
            // $requestData['image'] = $request->file('image') ? $this->uploadImage($request->file('image')) : $product->image;
            $requestData['is_active'] = $request->is_active ?? 0;
            $resort->update($requestData);
            if ($request->hasfile('filenames')) {
                
                $images = $request->file('filenames');
                ResortImage::where('resort_id', '=', $resort->id)->delete();
                foreach($images as $image) {
                    $name = $image->getClientOriginalName();
                    $path = $image->storeAs('uploads', $name, 'public');
    
                    $resort_image = new ResortImage();
                    $resort_image->resort_id = $resort->id;
                    $resort_image->image_uri = $path;
                    $resort_image->save();
                }
             }
            // $product->categories()->sync($requestData['category_ids']);
            return redirect()->route('resorts.index')->withMessage('Successfully Updated');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resort  $resort
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resort $resort)
    {
        $resort->resourt_images()->delete();
        $resort->delete();
        return redirect()->route('resorts.index')->withMessage('Successfully Deleted');
    }
}
