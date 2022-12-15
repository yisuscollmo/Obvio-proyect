<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\images as ModelsImages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class images extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $images= ModelsImages::all();
      return response()->json($images);
    
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       $direccion=$this->validate_image($request);

        $new_image = ModelsImages::create([

            'image' => $direccion,
            'name' => $request->name, 
            
        ]);

         $new_image->save();  
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($cr)
    {
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $images = ModelsImages::find($id);

        if (File::exists(public_path($images->image)))
        File::delete(public_path($images->image));

        $images ->delete();
        //
    }
    public function validate_image($request) {
        
        if ($request->hasfile('image')) {
            $name = uniqid() . time() . '.' . $request->file('image')->getClientOriginalExtension(); //46464611435281365.jpg
            $request->file('image')->storeAs('public/homeges', $name);
            return '/storage/homeges' . '/' . $name; //uploads/46464611435281365.jpg

        } else {

            return '/storage/homeges/default.jpg';

        }
    }
}
