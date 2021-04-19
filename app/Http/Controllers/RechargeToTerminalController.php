<?php

namespace App\Http\Controllers;

use App\Models\RechargeToTerminal;
use Illuminate\Http\Request;

class RechargeToTerminalController extends Controller
{
    public function terminalReportDetails(request $request){
        $requestedData = (object)($request->json()->all());
        $start_date = $requestedData->start_date;
        $end_date = $requestedData->end_date;
        $terminal_id = $requestedData->terminal_id;
        $reportData = DB::select('call fetch_terminal_digit_total_sale(?,?,?)',array($terminal_id,$start_date,$end_date));
        return json_encode($reportData,JSON_NUMERIC_CHECK);
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
     * @param  \App\Models\RechargeToTerminal  $rechargeToTerminal
     * @return \Illuminate\Http\Response
     */
    public function show(RechargeToTerminal $rechargeToTerminal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RechargeToTerminal  $rechargeToTerminal
     * @return \Illuminate\Http\Response
     */
    public function edit(RechargeToTerminal $rechargeToTerminal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RechargeToTerminal  $rechargeToTerminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RechargeToTerminal $rechargeToTerminal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RechargeToTerminal  $rechargeToTerminal
     * @return \Illuminate\Http\Response
     */
    public function destroy(RechargeToTerminal $rechargeToTerminal)
    {
        //
    }
}
