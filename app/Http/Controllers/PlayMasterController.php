<?php

namespace App\Http\Controllers;

use App\Models\BarcodeMax;
Use App\Models\PlayDetail;
use App\Models\StockistToTerminal;
use App\Models\PlayMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\ClaimDetails;
use Exception;

class PlayMasterController extends Controller
{
    public function saveGameInputDetails(request $request){

        $allRequestedData=(object)($request->json()->all());
//        return response()->json(['success'=> 1,'test'=>$allRequestedData], 200);
        $requestedDraws = $allRequestedData->drawId;
        $objCentralFunctionCtrl = new CentralFunctionController();
        $financial_year = $objCentralFunctionCtrl->get_financial_year();
        DB::beginTransaction();
        try
        {
            foreach($requestedDraws as $row){
                $drawId = $row['id'];
                DB::insert("insert into barcode_maxes (subject_name, current_value, prefix, financial_year)
                values('digit bill',1,'RS',?)
                on duplicate key UPDATE id=last_insert_id(id), current_value=current_value+1", [$financial_year]);
                $lastInsertId = DB::getPdo()->lastInsertId();
                $lastGeneratedBarcode = BarcodeMax::where('id', $lastInsertId)->first();

                $bcd = str_pad($lastGeneratedBarcode->current_value,10,"0",STR_PAD_LEFT).''.$financial_year;
                $currentDate = Carbon::now()->format('d/m/Y');
                $currentTime = Carbon::now()->format('H:i:s');
                $terminalId = $allRequestedData->user_id;
                $prefix = $lastGeneratedBarcode->prefix;
                $barcode = $prefix.''.$bcd;

                $playMaster = new \App\Models\PlayMaster();
                $playMaster->barcode_number = $barcode;
                $playMaster->terminal_id = $terminalId;
                $playMaster->draw_master_id = $drawId;
                $playMaster->slip_no = $allRequestedData->slip_no;
                $playMaster->save();

                StockistToTerminal::where('terminal_id', $terminalId)
                    ->update(array(
                        'current_balance' => DB::raw( 'current_balance -'.$allRequestedData->purchasedTicket)
                    ) );

                $lastInsertedPlayMasterId = $playMaster->id;
                $inputDetails = $allRequestedData->playDetails;
                $playDetails = new PlayDetail();
                foreach($inputDetails as $key => $row){
                    $inputDetails[$key]['play_master_id'] = $lastInsertedPlayMasterId;
                }

                $playDetails->insert($inputDetails);
            }

//            StockistToTerminal::where('terminal_id', $terminalId)
//                ->update(array(
//                    'current_balance' => DB::raw( 'current_balance -'.$allRequestedData->purchasedTicket)
//                ) );

            $currentBalance = StockistToTerminal::select('current_balance')->where('terminal_id', $terminalId)->first();
            DB::commit();
        }

        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('success' => 0, 'msg' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine()),401);
        }

        return response()->json(['success'=> 1,'barcode'=>$barcode, 'purchase_date' => $currentDate, 'purchase_time' => $currentTime,'current_balance'=> $currentBalance->current_balance], 200);
    }

    public function  CancelTicket(request $request)
    {
        $requestedData = (object)($request->json()->all());
        $ticketId = $requestedData->ticketId;

        $playMaster = new PlayMaster();
        $playMaster = PlayMaster::find($ticketId);
        $playMaster->is_cancelled = 1;
        $playMaster->update();

        $points = PlayDetail::select(DB::raw('sum(play_details.game_value)*max(play_series.mrp) as total_sale'))
            ->join('play_masters', 'play_masters.id', '=', 'play_details.play_master_id')
            ->join('play_series', 'play_series.id', '=', 'play_details.play_series_id')
            ->where('play_masters.id', '=', $ticketId)
            ->where('play_masters.is_cancelled', '=', 1)
            ->groupBy('play_details.play_series_id')
            ->first();
        $updateStocklistToTerminal = StockistToTerminal::where('terminal_id', $playMaster->terminal_id)->first();
        $updateStocklistToTerminal->current_balance = $updateStocklistToTerminal->current_balance + $points->total_sale;
        $updateStocklistToTerminal->update();

        $message = null;
        if($playMaster){
            $message = "Ticket Cancelled";
        }else{
            $message = "Unable To Cancel ticket";
        }

        return response()->json(['success'=> 1,'msg'=>$message, 'points' => $points->total_sale], 200);

    }

    public function updateCancelable(request $request)
    {
        $requestedData = (object)($request->json()->all());
//        $data = PlayMaster::select()
//            ->where('time(created_at)','<=','21:45:49')
//            ->where('Date(created_at)','<=',DB::raw("CURRENT_DATE()"))
//            ->get();

//        $data = DB::select(DB::raw("select * from play_masters
//            where time(created_at) <= :test and Date(created_at) <= CURRENT_DATE()", [":test" => $requestedData->time]));

        $data = DB::statement("update play_masters set is_cancelable = 0
            where (time(created_at) <= ? and is_cancelable = 1) or (Date(created_at) < CURRENT_DATE() and is_cancelable = 1)", [$requestedData->time]);
        return response()->json(['success'=> 1 ,'time'=>$requestedData->time], 200);
    }

    public function claimBarcodeManually(request $request){
        $requestedData = (object)($request->json()->all());
        $terminalId = $requestedData->terminalId;
        $gameId = $requestedData->gameId;
        $prizeValue = $requestedData->prizeValue;
        $playMasterId = $requestedData->playMasterId;
        DB::beginTransaction();
        try {
            $claimDetailsObj = new ClaimDetails();
            $claimDetailsObj->game_id = $gameId;
            $claimDetailsObj->play_master_id = $playMasterId;
            $claimDetailsObj->terminal_id = $terminalId;
            $claimDetailsObj->prize_value = $prizeValue;
            $claimDetailsObj->save();

            StockistToTerminal::where('terminal_id', $terminalId)
                ->update(array(
                    'current_balance' => DB::raw( 'current_balance +'.$prizeValue)
                ) );

            PlayMaster::where('id',$playMasterId)->update(['is_claimed' =>1]);
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('msg' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine()),401);
        }
        return response()->json(['success'=> 1,'msg'=>'claimed','is_claimed'=>1], 200);
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
     * @param  \App\Models\PlayMaster  $playMaster
     * @return \Illuminate\Http\Response
     */
    public function show(PlayMaster $playMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlayMaster  $playMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(PlayMaster $playMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlayMaster  $playMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlayMaster $playMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlayMaster  $playMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlayMaster $playMaster)
    {
        //
    }
}
