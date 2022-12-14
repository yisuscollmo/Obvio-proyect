<?php

namespace App\Http\Controllers;

use App\Models\sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=sales::all();
        return response()->json($sales);
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
    public function store(Request $request,)
    {
        	
        // return response("ja, entramos");
        $consult= DB::select(
            "
            SELECT sales_number
            FROM sales
            WHERE sales.state=1

            "
        );
       
    if($consult=null){
        // return response('aish: '.$consult);
        $new_sale = sales::create([
           
            'users_id' => $request->users_id,
            'date' => $request->date,
            'sales_number' => $request->sales_number,
            'state' => $request->state,
            'total' => $request->total,

        ]);
        
        $new_sale->save();

        $sale_id=DB::select(
            "
            SELECT sales.id
            FROM sales
            WHERE sales.state=1
            "
        );
        return response($sale_id);

    }
    else{
        return response('pailas, no se creo una monda socio');
      
    }
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return response('entramos');
        $sales=sales::all();
        $sales = DB::select(
            "SELECT sales.*
            FROM sales
            WHERE users_id='$id'
            "
        );
        return response()->json($sales);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $sales = sales::find($id);
        $sales ->delete();
        //
    }
 
}
