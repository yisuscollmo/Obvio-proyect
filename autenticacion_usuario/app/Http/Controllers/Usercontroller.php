<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = DB::select(
            'SELECT USERS.*
            FROM users
            WHERE roles_id=2
            '
        );


        // $user = User::all();
        return response()->json($user);
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

        // $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6|confirmed',
        //     'image' => 'nullable|image'
        // ]);

        // //Save image in server and get its url
        // $url_image = $this->validate_image($request);

        // $user = User::create([
        //     'roles_id' => 2, //All registered user have the USER role (id=2)
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'image' => $url_image,
        // ]);

        // return response(
        //     [
        //         'message' => 'Cliente creado exitósamente.',
        //         'new_user' => $user //Nuevo usuario creado
        //     ]
        // );


        $new_user = User::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => $request = 2,
            'image' => '/storage/app/public/homeges/default.jpg',
        ]);
        
        $new_user->save();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show( $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit( $cr)
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
    public function update(Request $request, $id)
    {
        $user = User::find($id);
       
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $user->roles_id= 2;
        $user->image= '/storage/app/public/homege/default.jpg';
        $user->save();

    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user ->delete();
        //
    }
    public function validate_image($request) {

        if ($request->hasfile('image')) {
            $name = uniqid() . time() . '.' . $request->file('image')->getClientOriginalExtension(); //46464611435281365.jpg
            $request->file('image')->storeAs('public', $name);
            return '/storage/app/public' . '/' . $name; //uploads/46464611435281365.jpg

        } else {

            return '/storage/app/public/homeges/default.jpg';
        }
    }
}
