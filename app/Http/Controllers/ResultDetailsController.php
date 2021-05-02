<?php

namespace App\Http\Controllers;

use App\Models\ResultDetails;
use App\Models\DrawMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultDetailsController extends Controller
{
    function getPreviousDrawResult(){
        $result = DB::select(DB::raw("select game_date,max(fr)as fr, max(sr) as sr from (select game_date, case when draw_master_id=1 then result end as fr,
        case when draw_master_id=2 then result end as sr

        from (select result_masters.id,result_masters.game_date, result_masters.draw_master_id, draw_masters.draw_name,
        (result_details.result_row *10) + result_details.result_col as result  from result_masters
        inner join result_details on result_details.result_master_id = result_masters.id
        inner join draw_masters on draw_masters.id = result_masters.draw_master_id
        where result_masters.game_date<CURDATE()) as table1)  as table2
        group by game_date order by game_date desc limit 10"));
        return json_encode($result);
    }

    function getTodayResult(){
        $result = DrawMaster::select('draw_masters.id','draw_masters.end_time','draw_masters.meridiem','result_details.result_row','result_details.result_col')
        ->leftJoin('result_masters', function ($join){
            $join->on('draw_masters.id','=','result_masters.draw_master_id')
                ->where('result_masters.game_date','=',DB::raw("curdate()"));
        })
        ->leftJoin('result_details','result_masters.id','result_details.result_master_id')
        ->get();
        return $result;
    }

    function getResultByDate(request $request){
        $requestedData = (object)($request->json()->all());
        $resultDate = $requestedData->result_date;
        $reportData = DB::select(DB::raw("select draw_masters.end_time, draw_masters.id, result_masters.game_date,
                result_details.result_row, result_details.result_col
                from draw_masters
                left join (select * from result_masters where game_date="."'".$resultDate."'".")as result_masters on result_masters.draw_master_id=draw_masters.id
                left join result_details on result_masters.id=result_details.result_master_id order by draw_masters.id"));
        return json_encode($reportData,JSON_NUMERIC_CHECK);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResultDetails  $resultDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ResultDetails $resultDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResultDetails  $resultDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ResultDetails $resultDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResultDetails  $resultDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResultDetails $resultDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResultDetails  $resultDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResultDetails $resultDetails)
    {
        //
    }
}
