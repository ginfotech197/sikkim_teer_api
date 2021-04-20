<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['success'=>0,'data'=>null, 'message'=>'Credential does not matched'], 200,[],JSON_NUMERIC_CHECK);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;
        $category = UserType::find($user->user_type_id);

        $response = [
            'user' => new UserResource($user),
            'token' => $token
        ];
        $StockistToTerminal=User::find($user->id)->StockistToTerminal->first();
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

    function getAllUsers(Request $request){
        return User::get();
    }
    function logout(Request $request){
        $result = $request->user()->currentAccessToken()->delete();
        return $result;
//        return  response()->json(['success'=>1], 200,[],JSON_NUMERIC_CHECK);
    }
}
