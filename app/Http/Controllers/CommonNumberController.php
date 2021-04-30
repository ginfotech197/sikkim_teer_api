<?php

namespace App\Http\Controllers;

use App\Models\CommonNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommonNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCommonNumbers()
    {
        $commonNumber= CommonNumber::get();
        return response()->json(['success'=>1,'data'=>$commonNumber ], 200,[],JSON_NUMERIC_CHECK);

    }

    public function getAllCommonNumbersByCurrentDate()
    {
        // $commonNumber= CommonNumber::get();
        $commonNumber =CommonNumber::select()->whereRaw("date(updated_at)=CURDATE()")->get();
        return response()->json(['success'=>1,'data'=>$commonNumber ], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveCommonNumbers(Request $request)
    {
        $requestedData=($request->json()->all());
        $inputs = $requestedData['common_numbers'];
        $first_record= CommonNumber::first();
        
        // return response()->json(['success'=>1,'data'=> $x], 200,[],JSON_NUMERIC_CHECK);
        DB::beginTransaction();

        try{
                if($first_record){
                    $first_id= $first_record->id;
                    $commonNumber1= CommonNumber::find($first_id);
                    $commonNumber2= CommonNumber::find($first_id+1);
                }else{
                    $commonNumber1= new CommonNumber();
                    $commonNumber2= new CommonNumber();

                }

                $commonNumber1->house =!empty($inputs[0]['house'])? $inputs[0]['house'] : NULL;
                $commonNumber1->ending = !empty($inputs[0]['ending'])? $inputs[0]['ending'] : NULL;
                $commonNumber1->direct_one = !empty($inputs[0]['direct_one'])? $inputs[0]['direct_one'] : NULL;
                $commonNumber1->direct_two = !empty($inputs[0]['direct_two'])? $inputs[0]['direct_two'] : NULL;
                $commonNumber1->draw_master_id = !empty($inputs[0]['draw_master_id'])? $inputs[0]['draw_master_id']: NULL;
                $commonNumber1->save();

                $commonNumber2->house = !empty($inputs[1]['house'])? $inputs[1]['house'] : NULL;
                $commonNumber2->ending = !empty($inputs[1]['ending'])? $inputs[1]['ending'] : NULL;
                $commonNumber2->direct_one = !empty($inputs[1]['direct_one'])? $inputs[1]['direct_one'] : NULL;
                $commonNumber2->direct_two = !empty($inputs[1]['direct_two']) ? $inputs[1]['direct_two'] : NULL;
                $commonNumber2->draw_master_id = !empty($inputs[1]['draw_master_id'])? $inputs[1]['draw_master_id'] : NULL;
                $commonNumber2->save();

                $commonNumbers[]= $commonNumber1;
                $commonNumbers[]= $commonNumber2;


            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }


        return response()->json(['success'=>1,'data'=> $commonNumbers], 200,[],JSON_NUMERIC_CHECK);
        // return response()->json(['success'=>1,'data'=> 'checking text'], 200,[],JSON_NUMERIC_CHECK);
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
     * @param  \App\Models\CommonNumber  $commonNumber
     * @return \Illuminate\Http\Response
     */
    public function show(CommonNumber $commonNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommonNumber  $commonNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(CommonNumber $commonNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommonNumber  $commonNumber
     * @return \Illuminate\Http\Response
     */
    public function UpdateCommonNumbers(Request $request)
    {
        $commonNumber= new CommonNumber();
        $commonNumber= CommonNumber::find($request->input('id'));
        $commonNumber->house=$request->input('house');
        $commonNumber->direct_one=$request->input('direct_one');
        $commonNumber->direct_two=$request->input('direct_two');
        $commonNumber->draw_master_id=$request->input('draw_master_id');
        $commonNumber->save();

        return response()->json(['success'=>1,'data'=> $commonNumber], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommonNumber  $commonNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommonNumber $commonNumber)
    {
        //
    }
}
