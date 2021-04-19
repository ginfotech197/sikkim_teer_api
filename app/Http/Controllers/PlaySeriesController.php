<?php

namespace App\Http\Controllers;

use App\Models\PlaySeries;
use Illuminate\Http\Request;

class PlaySeriesController extends Controller
{
    public function getPlaySeries(){
        $allPlaySeries = PlaySeries::get();  //single
        echo json_encode($allPlaySeries,JSON_NUMERIC_CHECK);
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
