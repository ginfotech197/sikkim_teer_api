<?php

namespace App\Http\Controllers;

use App\Models\BarcodeMax;
//use App\Models\PlayDetails;
Use App\Models\PlayDetail;
use App\Models\StockistToTerminal;
use App\Models\PlayMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
                $terminalId = $allRequestedData->userId;
                $prefix = $lastGeneratedBarcode->prefix;
                $barcode = $prefix.''.$bcd;

                $playMaster = new \App\Models\PlayMaster();
                $playMaster->barcode_number = $barcode;
                $playMaster->terminal_id = $terminalId;
                $playMaster->draw_master_id = $drawId;
                $playMaster->save();
                $lastInsertedPlayMasterId = $playMaster->id;
                $inputDetails = $allRequestedData->playDetails;
                $playDetails = new PlayDetail();
                foreach($inputDetails as $key => $row){
                    $inputDetails[$key]['play_master_id'] = $lastInsertedPlayMasterId;
                }

                $playDetails->insert($inputDetails);
            }

            StockistToTerminal::where('terminal_id', $terminalId)
                ->update(array(
                    'current_balance' => DB::raw( 'current_balance -'.$allRequestedData->purchasedTicket)
                ) );

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
