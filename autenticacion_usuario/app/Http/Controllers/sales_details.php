<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\sales_details as ModelsSales_details;
// use App\Models\sales_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sales_details extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

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

        $new_sdetail = sales_details::create([
           
            'articles_id' => $request->articles_id,
            'sales_id' => $request->sales_id,
            'amount' => $request->amount,
            'price' => $request->price,
            'subtotal' => $request->subtotal,
            'iva' => $request->iva,
            'total' => $request->total,
        ]);
        
        $new_sdetail->save();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $sales_details=ModelsSales_details::all();
        $sales_details = DB::select(
            "SELECT sales_details.*, articles.name 
            FROM sales_details, articles
            WHERE sales_id='$id'
            AND articles_id=articles.id
            "
        );
        return response()->json($sales_details);
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
    public function destroy(cr $cr)
    {
        //
    }
}
