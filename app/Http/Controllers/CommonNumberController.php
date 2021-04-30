<?php

namespace App\Http\Controllers;

use App\Models\CommonNumber;
use Illuminate\Http\Request;

class CommonNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCommonNumbers()
    {
        $commonNumber= CommonNumber::get();
        return response()->json(['success'=>1,'data'=>$commonNumber ], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveCommonNumbers(Request $request)
    {
        $input=($request->json()->all());
        $inputPurchaseMaster=(object)($input['purchase_master']);
        $inputPurchaseDetails=($input['purchase_details']);
        $inputTransactionMaster=(object)($input['transaction_master']);
        $inputTransactionDetails=($input['transaction_details']);
        $inputExtraItems=($input['extra_items']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommonNumber  $commonNumber
     * @return \Illuminate\Http\Response
     */
    public function show(CommonNumber $commonNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommonNumber  $commonNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(CommonNumber $commonNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommonNumber  $commonNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommonNumber $commonNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommonNumber  $commonNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommonNumber $commonNumber)
    {
        //
    }
}
