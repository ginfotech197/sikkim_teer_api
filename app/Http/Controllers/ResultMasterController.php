<?php

namespace App\Http\Controllers;

use App\Models\ResultMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
