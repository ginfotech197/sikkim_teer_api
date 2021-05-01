<?php

namespace App\Http\Controllers;

use App\Models\StockistToTerminal;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MaxTable;
use Illuminate\Support\Facades\DB;

class StockistToTerminalController extends Controller
{
    public function getTerminalBalance($id){
        $StockistToTerminal=User::find($id)->StockistToTerminal;
        return json_encode($StockistToTerminal);
    }

    public function getAllTerminals(){
        $allTerminals = StockistToTerminal::
        select('stockist_to_terminals.terminal_id','stockist_to_terminals.stockist_id','stockists.stockist_name',
            'stockists.user_id as stockist_user_id','users.user_name','users.email as user_id','users.pin',
            'stockist_to_terminals.current_balance as terminal_current_balance','stockists.current_balance as stockist_current_balance')
            ->join('stockists', 'stockist_to_terminals.stockist_id', '=', 'stockists.id')
            ->join('users', 'stockist_to_terminals.terminal_id', '=', 'users.id')
            ->where('stockist_to_terminals.inforce','=',1)
            ->where('stockists.inforce','=',1)
            ->where('stockist_to_terminals.inforce','=',1)
            ->get();
        return json_encode($allTerminals,JSON_NUMERIC_CHECK);
    }

    public function selectNextTerminalId(request $request){
        $nextTerminalId = MaxTable::where('user_type_id',3)->first();
        if(!empty($nextTerminalId)){
            $terminalUserId=$nextTerminalId->current_value+1;
        }else{
            $terminalUserId=510501;
        }
        return json_encode($terminalUserId,JSON_NUMERIC_CHECK);
    }

    public function saveNewTerminal(request $request){
        $requestedData = (object)($request->json()->all());
        $objCentralFunctionCtrl = new CentralFunctionController();
        $serialnumber = $requestedData->stockist_sl_no;
        $stockist_id = $requestedData->stockist_id;
        $financial_year = $objCentralFunctionCtrl->get_financial_year();
        try
        {
            DB::insert("insert into max_tables (subject_name,user_type_id, current_value, financial_year,prefix)
            values('terminal',3,510501,?,'T')
            on duplicate key UPDATE id=last_insert_id(id), current_value=current_value+1", [$financial_year]);
            $lastInsertId = DB::getPdo()->lastInsertId();
            $max_table_data = MaxTable::where('id',$lastInsertId)->first();
            $terminalUniqueId = $max_table_data->current_value;

            $terminalObj = new User();
//            $terminalObj->people_unique_id = $terminalUniqueId;
            $terminalObj->user_name = $requestedData->terminal['user_name'];
            $terminalObj->email = $requestedData->terminal['user_id'];
            $terminalObj->password = $requestedData->terminal['user_password'];
            $terminalObj->pin = $requestedData->terminal['user_password'];
            $terminalObj->user_type_id = 3;
            $terminalObj->save();
            $lastInsertedTerminalId = DB::getPdo()->lastInsertId();

            DB::insert("insert into max_terminals (stockist_id,current_value,financial_year) VALUES (?,1,?)
            on duplicate key UPDATE id=last_insert_id(id), current_value=current_value+1", [$stockist_id,$financial_year]);

            $StockistToTerminalObj = new StockistToTerminal();
            $StockistToTerminalObj->stockist_id = $stockist_id;
            $StockistToTerminalObj->terminal_id = $lastInsertedTerminalId;
            $StockistToTerminalObj->save();
            DB::commit();
        }

        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('success' => 0, 'message' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine(),),401);
        }
        return response()->json(array('success' => 1, 'message' => 'Successfully recorded','stockist_id' => $stockist_id, 'terminal_id' => $lastInsertedTerminalId,'user_id' => $requestedData->terminal['user_id'],),200);
    }

    public function updateTerminalDetails(request $request){
        $requestedData = (object)($request->json()->all());

        $id = $requestedData->terminal['terminal_id'];
        $stockist_id = $requestedData->terminal['stockist']['id'];
        $terminal_name = $requestedData->terminal['people_name'];
        $user_id = $requestedData->terminal['user_id'];
        $password = $requestedData->terminal['user_password'];
        try
        {
            $terminalObj = new User();
            User::where('id','=',$id)->update(['user_name'=> $terminal_name,'password'=> $user_password]);
            StockistToTerminal::where('terminal_id','=',$id)->update(['stockist_id'=> $stockist_id]);
            DB::commit();
        }

        catch (Exception $e)
        {
            DB::rollBack();
            return response()->json(array('success' => 0, 'message' => $e->getMessage().'<br>File:-'.$e->getFile().'<br>Line:-'.$e->getLine()),401);
        }
        return response()->json(array('success' => 1, 'message' => 'Successfully recorded', 'stockist_id' => $id,'user_id' => $user_id),200);
    }

    public function getLoggedInTerminals(){
        $allTerminals = User::select('id','user_name','email')
            ->where('user_type_id','=',3)
//            ->whereNotNull('uuid')
//            ->where('uuid','NOT LIKE','')
            ->get();
        return json_encode($allTerminals,JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockistToTerminal  $stockistToTerminal
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockistToTerminal $stockistToTerminal)
    {
        //
    }
}
