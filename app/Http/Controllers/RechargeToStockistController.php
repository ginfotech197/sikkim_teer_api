<?php

namespace App\Http\Controllers;

use App\Models\RechargeToStockist;
use Illuminate\Http\Request;
use App\Models\Stockist;
use Illuminate\Support\Facades\DB;
use Exception;

class RechargeToStockistController extends Controller
{


    public function saveStockistRechargeData(request $request){
        $requestedData = (object)($request->json()->all());
        $rechargeToStockistObj = new RechargeToStockist();
        $stockist_id = $requestedData->stockist_id;
        $amount = $requestedData->amount;
        $recharge_master_id = $requestedData->recharge_master_id;

        try
        {
            $rechargeToStockistObj->amount = $amount;
            $rechargeToStockistObj->stockist_id = $stockist_id;
            $rechargeToStockistObj->recharge_master = $recharge_master_id;
            $rechargeToStockistObj->save();

            Stockist::where('id',$stockist_id)
                ->update(array(
                    'current_balance' => DB::raw( 'current_balance +'.$amount)
                ) );

            $stockistData = Stockist::where('id',$stockist_id)->first();
            $currentBalance = $stockistData->current_balance;
            DB::commit();
        }

        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('success' => 0, 'message' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine()),401);
        }
        return response()->json(array('success' => 1, 'message' => 'Successfully recorded', 'current_balance' => $currentBalance),200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RechargeToStockist  $rechargeToStockist
     * @return \Illuminate\Http\Response
     */
    public function show(RechargeToStockist $rechargeToStockist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RechargeToStockist  $rechargeToStockist
     * @return \Illuminate\Http\Response
     */
    public function edit(RechargeToStockist $rechargeToStockist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RechargeToStockist  $rechargeToStockist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RechargeToStockist $rechargeToStockist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RechargeToStockist  $rechargeToStockist
     * @return \Illuminate\Http\Response
     */
    public function destroy(RechargeToStockist $rechargeToStockist)
    {
        //
    }
}
