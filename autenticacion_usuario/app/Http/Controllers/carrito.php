<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class carrito extends Controller
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

              $consult= DB::select(
            "
            SELECT sales_number
            FROM sales
            WHERE sales.state=1

            "
        );
       
    if($consult=null){
       
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

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        
            $sales_details = DB::select(
                "
                SELECT sales_details.*, articles.name 
                FROM sales_details, articles, sales
                WHERE sales_id='$id'
                AND articles_id = articles.id
                AND sales.state=1
                AND users_id='$id'
               
                "
            );
            return response()->json($sales_details);
       
        // $sales_details=ModelsSales_details::all();
        
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
