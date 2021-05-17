<?php

namespace App\Http\Controllers;

use App\Models\RechargeToTerminal;
use Illuminate\Http\Request;
use App\Models\Stockist;
use App\Models\StockistToTerminal;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\PlayDetail;

class RechargeToTerminalController extends Controller
{

    public function getTerminalTotalSaleReport(request $request){
        $requestedData = (object)($request->json()->all());
        $startDate = $requestedData->start_date;
        $endDate = $requestedData->end_date;
        $reportData = DB::select('call customer_sale_report_from_admin(?,?)',array($startDate,$endDate));
        return $reportData;
    }

    public function drawWiseReport(request $request){
        $requestedData = (object)($request->json()->all());
        $gameDate = $requestedData->start_date;
        $reportData = DB::select('call draw_wise_report(?)',array($gameDate));
        return $reportData;
    }

    public function getBarcodeInputDetails(request $request){
        $requestedData = (object)($request->json()->all());
        $barcode = $requestedData->barcode;

        $gameInfo = PlayDetail::select('play_details.play_series_id')
            ->join('play_masters','play_details.play_master_id','play_masters.id')
            ->where('play_masters.barcode_number',$barcode)
            ->limit(1)->first();
        if($gameInfo->play_series_id==1){
            $reportData = DB::select("SELECT
                play_details.play_series_id,series_name,play_details.row_num,play_details.col_num,play_details.game_value
                FROM `play_masters`
                inner join play_details on play_masters.id=play_details.play_master_id
                inner join play_series on play_series.id=play_details.play_series_id
                where play_masters.barcode_number=?
                group by play_details.play_series_id,series_name,play_details.row_num,
                play_details.col_num,play_details.game_value
                order by play_details.play_series_id,row_num,col_num",[$barcode]);
        }else if($gameInfo->play_series_id==2){
            $reportData = DB::select("SELECT
            play_details.play_series_id,play_details.row_num as aandar,play_details.val_one as aandar_value
            ,play_details.col_num as bahar,play_details.val_two as bahar_value
            ,play_details.game_value as total
            FROM `play_masters`
            inner join play_details on play_masters.id=play_details.play_master_id
            inner join play_series on play_series.id=play_details.play_series_id
            where play_masters.barcode_number=?",[$barcode]);
        }

        return $reportData;
    }


    public function getAllBarcodeReportByDate(request $request){
        $requestedData = (object)($request->json()->all());
        $startDate = $requestedData->start_date;
        return DB::select("select * from getAllBarcodeReport where date(game_date) = ?",[$startDate]);
    }

    public function getAllBarcodeReportByDateStockiest(request $request){
        $requestedData = (object)($request->json()->all());
        $startDate = $requestedData->start_date;
        $stockiestId = $requestedData->stockiest_id;

        return DB::select("select * from getAllBarcodeReport where date(game_date) = ? and stockist_id = ?",[$startDate,$stockiestId]);
    }



    public function saveTerminalRechargeData(request $request){
        $requestedData = (object)($request->json()->all());
        $rechargeToTerminalObj = new RechargeToTerminal();
        $stockist_id = $requestedData->stockist_id;
        $amount = $requestedData->amount;
        $terminal_id = $requestedData->terminal_id;
        $recharge_master_id = $requestedData->recharge_master_id;
        $recharge_master_cat_id = $requestedData->recharge_master_cat_id;

        try
        {
            $rechargeToTerminalObj->amount = $amount;
            $rechargeToTerminalObj->recharge_master_id = $recharge_master_id;
            $rechargeToTerminalObj->terminal_id = $terminal_id;
            $rechargeToTerminalObj->recharge_master_cat_id = $recharge_master_cat_id;
            $rechargeToTerminalObj->save();

            StockistToTerminal::where('terminal_id',$terminal_id)
                ->update(array(
                    'current_balance' => DB::raw( 'current_balance +'.$amount)
                ) );

            $terminalData = StockistToTerminal::where('terminal_id',$terminal_id)->first();
            $currentBalance = $terminalData->current_balance;

            Stockist::where('id',$stockist_id)
                ->update(array(
                    'current_balance' => DB::raw( 'current_balance -'.$amount)
                ) );
            DB::commit();
        }

        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('success' => 0, 'message' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine()),401);
        }
        return response()->json(array('success' => 1, 'message' => 'Successfully recorded', 'current_balance' => $currentBalance),200);
    }


    public function terminalReportDetails(request $request){
        $requestedData = (object)($request->json()->all());
        $start_date = $requestedData->start_date;
        $end_date = $requestedData->end_date;
        $terminal_id = $requestedData->terminal_id;
        $reportData = DB::select('call fetch_terminal_digit_total_sale(?,?,?)',array($terminal_id,$start_date,$end_date));
        return json_encode($reportData,JSON_NUMERIC_CHECK);
    }

    public function getTotalBoxInput(request $request){
        $requestedData = (object)($request->json()->all());
        $drawId = $requestedData->draw_id;
//        $singleInput = DB::select('call  secondLastTotal(?)',array($drawId));

        $jodiInput = DB::select("select group_concat(row_num,col_num,'-',game_value) as game_value from (select play_details.row_num,
                    play_details.col_num, sum(play_details.game_value) as game_value from play_details
                    inner join play_masters ON play_masters.id = play_details.play_master_id
                    where play_masters.draw_master_id=? and play_details.play_series_id=1 AND date(play_masters.created_at)=curdate()
                    group by play_details.row_num,play_details.col_num
                    order by play_details.row_num,play_details.col_num) as table1 group by row_num",[$drawId]);
        return array('jodiInput'=>$jodiInput);
    }

    public function barcodeReportFromTerminal(request $request){
        $requestedData = (object)($request->json()->all());
        $terminalId = $requestedData->terminalId;
        $startDate = $requestedData->startDate;
        $endDate = $requestedData->endDate;

        $reportData = DB::select("select *
        ,if(is_claimed=1,'Yes','No') as claimed
        from (select max(email) as email,
                    max(draw_time) as draw_time
                    ,max(ticket_taken_time) as ticket_taken_time
                    ,barcode,slip_no,is_cancelled,is_cancelable
                    ,max(play_master_id) as play_master_id
                    ,max(terminal_id) as terminal_id
                    ,max(draw_master_id) as draw_master_id
                    ,sum(game_value) as quantity
                    ,sum(game_value* mrp) as amount
                    ,get_prize_value_of_barcode(barcode) as prize_value
                    ,group_concat(row_num,'-[',game_value,']' order by row_num) as particulars
                    ,max(is_claimed) as is_claimed
                    from (select
                    play_masters.barcode_number as barcode,
                    max(play_masters.slip_no) as slip_no,
                    play_masters.is_cancelled,
                    play_masters.is_cancelable
                    ,play_masters.id as play_master_id
                    , max(play_masters.terminal_id) as terminal_id
                    ,max(users.email) as email
                    , play_details.play_series_id
                    ,max(play_series.mrp) as mrp
                    , max(play_masters.draw_master_id) as draw_master_id
                    ,max(play_masters.is_claimed) as is_claimed
                    , play_details.row_num as row_num
                    , play_details.col_num as col_num
                    , max(play_details.game_value) as game_value
                    , max(draw_masters.start_time) as start_time
                    , TIME_FORMAT(max(draw_masters.end_time),'%h:%i:%s %p') as draw_time
                    ,TIME_FORMAT(max(play_masters.created_at), '%h:%i:%s %p') as ticket_taken_time2
                    ,max(play_masters.created_at) as ticket_taken_time
                    from play_details
                    inner join play_masters ON play_masters.id = play_details.play_master_id
                    inner join draw_masters ON draw_masters.id = play_masters.draw_master_id
                    inner join play_series ON play_series.id = play_details.play_series_id
                    inner join users on users.id = play_masters.terminal_id
                    where date(play_masters.created_at) BETWEEN ? AND ? AND play_masters.terminal_id= ?
                    group by play_details.play_master_id,play_masters.id
                    ,play_masters.barcode_number,play_details.play_series_id
                    ,play_details.row_num,play_details.col_num,play_masters.is_cancelled,
                    play_masters.is_cancelable) as table1
                    group by barcode,slip_no,is_cancelled,is_cancelable order by draw_master_id desc,ticket_taken_time desc) as table2",[$startDate,$endDate,$terminalId]);
        return $reportData;
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
