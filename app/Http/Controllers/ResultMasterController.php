<?php

namespace App\Http\Controllers;

use App\Models\ResultMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ResultMasterController extends Controller
{
    public function getResultByDateFromCPanel(request $request){
        $requestedData = (object)($request->json()->all());
        $resultDate = $requestedData->result_date;
        $reportData = DB::select("select date_format(created_at,'%d/%m%Y') as draw_date,end_time,max(game_one) as game_one
        from (select *,
        case when play_series_id = 1 then concat(result_row,result_col) end as game_one
        from (select
        end_time
        ,play_series.id as play_series_id
        ,serial_number
        ,result_details.result_master_id
        ,result_row
        ,result_col
        ,result_masters.created_at
        from result_details
        inner join (select * from result_masters where date(created_at)=?)result_masters on
        result_details.result_master_id = result_masters.id
        inner join draw_masters on result_masters.draw_master_id = draw_masters.id
        inner join play_series on result_details.play_series_id = play_series.id) as table1) as table2
        group by result_master_id order by serial_number DESC",[$resultDate]);
        return json_encode($reportData,JSON_NUMERIC_CHECK);
    }


    public function insertMissedOutResult(request $request){
        $requestedData = (object)($request->json()->all());
        $lastDrawId = $requestedData->drawId;

        try
        {
            $newData = DB::statement(
                'CALL insert_game_result_details('.$lastDrawId.')'
            );
            DB::commit();
        }

        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('success' => 0, 'message' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine()),401);
        }
        return response()->json(array('success' => 1, 'message' => 'Successfully recorded'),200);
    }

    public function getPreviousResult(request $request){

        $requestedData = (object)($request->json()->all());
        $start_date = $requestedData->start_date;
        $end_date = $requestedData->end_date;

//        $data = DB::select('select result_masters.game_date, if(result_masters.draw_master_id=1,(result_details.result_row*10 + result_details.result_col),0) as fr_value,
//            if(result_masters.draw_master_id=2,(result_details.result_row*10 + result_details.result_col),0) as sr_value from result_masters
//            inner join result_details on result_details.result_master_id = result_masters.id');

        $fr_value = DB::select('select result_masters.game_date, if(result_masters.draw_master_id=1,(result_details.result_row*10 + result_details.result_col),0) as fr_value from result_masters
            inner join result_details on result_details.result_master_id = result_masters.id
            where result_masters.draw_master_id = 1 and result_masters.game_date>= ? and result_masters.game_date<= ? order by result_masters.game_date desc', [$start_date,$end_date]);
//        return response()->json(array('success' => 1, 'data'=>$fr_value),200);

        $sr_value = DB::select('select result_masters.game_date, if(result_masters.draw_master_id=2,(result_details.result_row*10 + result_details.result_col),0) as sr_value from result_masters
            inner join result_details on result_details.result_master_id = result_masters.id
            where result_masters.draw_master_id = 2 and result_masters.game_date>= ? and result_masters.game_date<= ? order by result_masters.game_date desc', [$start_date,$end_date]);

//        return response()->json(array('success' => 1, 'data'=>$fr_value, 'data2'=>$sr_value),200);

//        $finalArray = [];
//        foreach ($fr_value as $fr_val){
//            $testArray =(object)[];
//            foreach ($sr_value as $sr_val){
//                if($fr_val->game_date === $sr_val->game_date){
//                    $testArray->game_date = $fr_val->game_date;
//                    $testArray->fr_value = $fr_val->fr_value | 0;
//                    $testArray->sr_value = $sr_val->sr_value | 0;
//                }
//                array_push($finalArray,$testArray);
//            }
//        }

        $finalArray = [];
        if(count($fr_value)<=count($sr_value)){
            $count = count($fr_value);
        }else{
            $count = count($sr_value);
        }
        for ($i = 0; $i < $count ; $i++){
            $testArray =(object)[];
            if($fr_value[$i]->game_date === $sr_value[$i]->game_date) {
                $testArray->game_date = $fr_value[$i]->game_date;
                $testArray->fr_value = $fr_value[$i]->fr_value | 0;
                $testArray->sr_value = $sr_value[$i]->sr_value | 0;
            }
            array_push($finalArray,$testArray);
        }

        return response()->json(array('success' => 1, 'data'=>$finalArray),200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResultMaster  $resultMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ResultMaster $resultMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResultMaster  $resultMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ResultMaster $resultMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResultMaster  $resultMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResultMaster $resultMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResultMaster  $resultMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResultMaster $resultMaster)
    {
        //
    }
}
