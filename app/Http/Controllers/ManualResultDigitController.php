<?php

namespace App\Http\Controllers;

use App\Models\ManualResultDigit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Carbon;

class ManualResultDigitController extends Controller
{
    public function getDrawTimeForManualResult(){
        $drawTime = DB::select(DB::raw("select * from draw_masters where id not in
        (select draw_master_id from result_masters where game_date=(curdate())) AND id not in
        (select draw_master_id from manual_result_digits where date(created_at)=curdate()) order by serial_number"));
        return json_encode($drawTime,JSON_NUMERIC_CHECK);
    }

    public function saveManualResult(request $request){
        $requestedData = (object)($request->json()->all());
        $drawMasterId = $requestedData->master['draw_master_id'];
        $gameDate = $currentDate = Carbon::now()->format('Y-m-d');
        $result = $requestedData->master['aandar'];

        try
        {
            $manualResultDigit = new ManualResultDigit();
            $manualResultDigit->play_series_id = 1;     //1 = single but the result is  same for jodi and single
            $manualResultDigit->draw_master_id = $drawMasterId;
            $manualResultDigit->result = $result;
            $manualResultDigit->game_date = $gameDate;
            $manualResultDigit->save();
            DB::commit();
        }

        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('success' => 0, 'message' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine()),500);
        }
        return response()->json(array('success' => 1, 'message' => 'Successfully recorded'),200);
    }


    public function getLastInsertedManualResult(){
        $manualResults = ManualResultDigit::select('manual_result_digits.play_series_id','manual_result_digits.draw_master_id','series_name',
            'end_time','result')
            ->join('play_series', 'manual_result_digits.play_series_id', '=', 'play_series.id')
            ->join('draw_masters', 'manual_result_digits.draw_master_id', '=', 'draw_masters.id')
            ->where('draw_masters.active',1)
            ->whereRaw("manual_result_digits.game_date = curdate()")
            ->first();
        return json_encode($manualResults,JSON_NUMERIC_CHECK);
    }

    public function updateCurrentManual(request $request){
        $requestedData = (object)($request->json()->all());
        $drawMasterId = $requestedData->master['draw_master_id'];
        $gameDate = $currentDate = Carbon::now()->format('Y-m-d');
        $result = $requestedData->master['bahar'];
        try
        {
            if($result){
                ManualResultDigit::where('draw_master_id',$drawMasterId)
                    ->where('play_series_id',1)
                    ->whereRaw("manual_result_digits.game_date = curdate()")
                    ->update(["result" => $result]);
            }
            DB::commit();
        }

        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('success' => 0, 'message' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine()),401);
        }
        return response()->json(array('success' => 1, 'message' => 'Successfully updated'),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManualResultDigit  $manualResultDigit
     * @return \Illuminate\Http\Response
     */
    public function edit(ManualResultDigit $manualResultDigit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManualResultDigit  $manualResultDigit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManualResultDigit $manualResultDigit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManualResultDigit  $manualResultDigit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManualResultDigit $manualResultDigit)
    {
        //
    }
}
