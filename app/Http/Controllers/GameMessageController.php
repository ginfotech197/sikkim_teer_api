<?php

namespace App\Http\Controllers;

use App\Models\GameMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class GameMessageController extends Controller
{
    public function getSiteNotification(){
        $message = GameMessage::orderBy('id', 'DESC')->take(1)->first();
        return json_encode($message);
    }

    public function addNewMessage(request $request){
        $requestedData = (object)($request->json()->all());
        $message = $requestedData->msg;

        try
        {
            $gameMessageObj = new GameMessage();
            $currentMessage = $gameMessageObj::first();

            if(!empty($currentMessage)){
                $lastId = $currentMessage->id;
                $gameMessageObj::where('id',$lastId)->update(['message'=>$message]);
            }else{
                $gameMessageObj->message = $message;
                $gameMessageObj->save();
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
     * @param  \App\Models\GameMessage  $gameMessage
     * @return \Illuminate\Http\Response
     */
    public function show(GameMessage $gameMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameMessage  $gameMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(GameMessage $gameMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameMessage  $gameMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameMessage $gameMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameMessage  $gameMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameMessage $gameMessage)
    {
        //
    }
}
