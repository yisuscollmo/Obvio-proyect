<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles);
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

        // $user = Article::create([
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


        $new_article = Article::create($request->all());
        $new_article->save();

        // $articles = Article::create($request->post());
        // return response()->json([
        //     'articles' =>$articles
        // ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Article $articles)
    {

        return response()->json();
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
    public function update(Request $request, $article)
    {

        // $client = article::find($article);



        // $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|email|unique:users,email,' . $client->id,
        // ]);

        // //Guardar nueva imagen
        // if ($request->updated) {

        //     $request->validate([
        //         'image' => 'nullable|image'
        //     ]);

        //     //Eliminar la imagen anterior
        //     if (File::exists(public_path($client->image)))
        //         File::delete(public_path($client->image));

        //     $client->image = $this->validate_image($request);
        // }

        // $client->name = $request->name;
        // $client->email = $request->email;
        // $client->save();

        // return response([
        //     'message' => 'Cliente actualizado exitósamente.',
        // ]);



        $article = Article::find($article);
     
        $article->fill($request->all())->save(); 
        return response()->json([
                'article'=>$article
            ]);

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


        $article = Article::find($id);
        $article ->delete();

        // $articles->delete();
        // return response()->json([
        //         'mensaje'=> 'article eliminado'
        //     ]);

        //
    }

    public function validate_image($request) {

        if ($request->hasfile('image')) {
            $name = uniqid() . time() . '.' . $request->file('image')->getClientOriginalExtension(); //46464611435281365.jpg
            $request->file('image')->storeAs('public', $name);
            return '/storage/app/public' . '/' . $name; //uploads/46464611435281365.jpg

        } else {

            return null;
        }
    }
}
