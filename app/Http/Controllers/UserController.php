<?php

namespace App\Http\Controllers;

use App\Models\Stockist;
use App\Models\User;
use App\Http\Resources\UserResource;
Use App\Http\Resources\StockiestResource;
use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\StockistToTerminal;
use Illuminate\Support\Facades\DB;
use Exception;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $user = User::create([
            'email'    => $request->email,
            'password' => $request->password,
            'user_name' => $request->name,
            'user_type_id' => $request->user_type_id
        ]);

//        return response()->json(['success'=>1,'data'=>$user], 200,[],JSON_NUMERIC_CHECK);

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    function login(Request $request)
    {
        $user= User::where('email', $request->userId)->first();
        if($user) {
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['success' => 0, 'data' => null, 'message' => 'Credential does not matched'], 200, [], JSON_NUMERIC_CHECK);
            }

            $token = $user->createToken('my-app-token')->plainTextToken;
            $category = UserType::find($user->user_type_id);

            $response = [
                'user' => new UserResource($user),
                'token' => $token
            ];
            $StockistToTerminal = User::find($user->id)->StockistToTerminal->first();
        }else {
            $user = Stockist::where('user_id', $request->userId)->where('user_password', $request->password)->first();
            if ($user) {
            $token = $user->createToken('my-app-token')->plainTextToken;
            $category = UserType::find($user->user_type_id);

            $categoryData = (object)[
                'type_id' => $category->id,
                'type_name' => $category->user_type_name
            ];

            $userData = (object)[
                'id' => $user->id,
                'user_id' => $user->user_id,
                'user_name' => $user->stockist_name,
                'email' => $user->user_id,
                'user_type' => $categoryData,
            ];

            $response = [
                'user' => $userData,
//                'user' => $user,
                'token' => $token
            ];
            $StockistToTerminal = null;
            }else{
                return response()->json(['success'=>0,'data'=>null,'StockistToTerminal'=> null, 'message'=>'Login Failed'], 200,[],JSON_NUMERIC_CHECK);
            }
        }
        return response()->json(['success'=>1,'data'=>$response,'StockistToTerminal'=> $StockistToTerminal, 'message'=>'Welcome'], 200,[],JSON_NUMERIC_CHECK);
    }

    public function getCurrentTimestamp(){

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $time = Carbon::now()->format('H:i:s');
        echo json_encode(array('dateTime' => $current_date_time,'time' => $time));
    }


    function getCurrentUser(Request $request){
        return $request->user();
//        return User::get();

    }

    public function getLoggedInTerminalBalance(request $request){
        $requestedData = (object)($request->json()->all());
        $terminalId = $requestedData->terminal_id;
        $StockistToTerminal = StockistToTerminal:: select('terminal_id','stockist_id','current_balance')->where('terminal_id',$terminalId)->first();
        return $StockistToTerminal;
    }

    public function resetAdminPassword(request $request){
        $user_data=(object)($request->json()->all());

        $userId = $user_data->userId;
        $userPsw = $user_data->psw;

        $updateInfo = User::where('id',$userId)
            ->where('password', $user_data->old_psw)
            ->update(['user_password'=>$userPsw]);

        if($updateInfo==1){
            return response()->json(array('success' => 1, 'message' => 'Successfully recorded'),200);
        }else{
            return response()->json(array('success' => 0, 'message' => 'Something went wrong'),200);
        }

    }


    function getAllUsers(Request $request){
        return User::get();
    }
    function logout(Request $request){
        $result = $request->user()->currentAccessToken()->delete();
        return $result;
//        return  response()->json(['success'=>1], 200,[],JSON_NUMERIC_CHECK);
    }

    public function forceLogoutToTerminal(request $request){
        $user_data=(object)($request->json()->all());
        $userId = $user_data->id;
        $tokenId = $user_data->token_id;

//        //updating data
//        $person=User::where(['id'=> $userId])->update(['is_loggedin'=>0,'uuid' => NULL]);

//        $result = $request->user()->currentAccessToken()->delete();
        $result = $request->user()->token()->revoke();
        return $result;
    }
}
