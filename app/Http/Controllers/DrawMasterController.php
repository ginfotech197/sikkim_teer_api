<?php

namespace App\Http\Controllers;

use App\Models\DrawMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class DrawMasterController extends Controller
{
    public function getActiveDrawTime(){
        $currentDraw = DrawMaster::where('active', 1)->first();;
        return json_encode($currentDraw,JSON_NUMERIC_CHECK);
    }

    public function getAllDrawTimes(){
        $currentDraw = DrawMaster::orderBy('serial_number')->get();;
        return json_encode($currentDraw,JSON_NUMERIC_CHECK);
    }

    public function selectMissedOutDrawTime(){
        $data = DB::select("select * from draw_masters where id not in (select draw_master_id from result_masters where game_date=curdate())
            order by serial_number");
        return json_encode($data,JSON_NUMERIC_CHECK);
    }

    public function activateCurrentDrawManually(request $request){
        $requestedData = (object)($request->json()->all());
        $currentDrawId = $requestedData->drawId;

        try
        {
            DB::update('UPDATE draw_masters SET active = IF(serial_number = ?, 1,0)', [$currentDrawId]);
            DB::commit();
        }

        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('success' => 0, 'message' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine()),401);
        }
        return response()->json(array('success' => 1, 'message' => 'Successfully recorded'),200);
    }

    public function getAdvanceDrawTimes(){
        $data = DB::select("select * from draw_masters where id > (select id from draw_masters where active=1)
                    order by serial_number");
        return json_encode($data,JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DrawMaster  $drawMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrawMaster $drawMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DrawMaster  $drawMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrawMaster $drawMaster)
    {
        //
    }
}
