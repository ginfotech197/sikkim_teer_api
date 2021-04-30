<?php

namespace App\Http\Controllers;

use App\Models\PlaySeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PlaySeriesController extends Controller
{
    public function getPlaySeries(){
        $allPlaySeries = PlaySeries::get();  //single
        return json_encode($allPlaySeries,JSON_NUMERIC_CHECK);
    }

    public function setGamePayout(request $request){
        $requestedData = (object)($request->json()->all());
        try
        {
            foreach ($requestedData->twoDigitPayOut as $row){
                PlaySeries::where('id',$row['id'])->update(['payout'=> $row['payout']]);
            }
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
     * @param  \App\Models\PlaySeries  $playSeries
     * @return \Illuminate\Http\Response
     */
    public function show(PlaySeries $playSeries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlaySeries  $playSeries
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaySeries $playSeries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlaySeries  $playSeries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaySeries $playSeries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlaySeries  $playSeries
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaySeries $playSeries)
    {
        //
    }
}
