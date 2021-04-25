<?php

namespace App\Http\Controllers;

use App\Models\ResultDetails;
use App\Models\DrawMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultDetailsController extends Controller
{
    function getPreviousDrawResult(){
        $result = ResultDetails::
        select('result_masters.draw_master_id','serial_number','end_time','result_row','result_col'
            ,DB::raw("DATE_FORMAT(result_masters.game_date, '%d-%m-%Y') as draw_date"))
            ->join('result_masters', 'result_details.result_master_id', '=', 'result_masters.id')
            ->join('draw_masters', 'result_masters.draw_master_id', '=', 'draw_masters.id')
            ->whereRaw("date(result_masters.created_at) = curdate()")
            ->orderByRaw("draw_masters.serial_number DESC")
            ->limit(1)
            ->first();
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
