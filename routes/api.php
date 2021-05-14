<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayMasterController;
use App\Http\Controllers\DrawMasterController;
use App\Http\Controllers\PlaySeriesController;
use App\Http\Controllers\StockistController;
use App\Http\Controllers\RechargeToStockistController;
use App\Http\Controllers\StockistToTerminalController;
use App\Http\Controllers\RechargeToTerminalController;
use App\Http\Controllers\ManualResultDigitController;
use App\Http\Controllers\ResultMasterController;
use App\Http\Controllers\GameMessageController;
use App\Http\Controllers\CentralFunctionController;
use App\Http\Controllers\CommonNumberController;
use App\Http\Controllers\NextGameDrawController;
use App\Http\Controllers\ResultDetailsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("login",[UserController::class,'login']);

//Route::post("logout",[UserController::class,'logout']);

Route::post("register",[UserController::class,'register']);

Route::post("resetAdminPassword",[UserController::class,'resetAdminPassword']);
//Route::post("checkAuthenticatedUser",[UserController::class,'checkAuthenticatedUser']);
//Route::post("logout",[UserController::class,'logout']);
Route::get("getServerTime",[UserController::class,'getCurrentTimestamp']);
Route::get("getPlaySeries",[PlaySeriesController::class,'getPlaySeries']);
Route::get("person/{id}/getBalance",[StockistToTerminalController::class,'getTerminalBalance']);
Route::get("getActiveDraw",[DrawMasterController::class,'getActiveDrawTime']);
Route::get("getAllDrawTimes",[DrawMasterController::class,'getAllDrawTimes']);
Route::get("getMessage",[GameMessageController::class,'getSiteNotification']);
Route::post("getTerminalBalance",[UserController::class,'getLoggedInTerminalBalance']);
Route::post("generateNewResultAndDraw",[CentralFunctionController::class,'createNewResult']);
Route::get("getNextDrawNumber",[NextGameDrawController::class,'getIncreasedValue']);
Route::get("getPreviousResult",[ResultDetailsController::class,'getPreviousDrawResult']);
Route::get("getTodayResult",[ResultDetailsController::class,'getTodayResult']);
Route::post("getResultsByDate",[ResultDetailsController::class,'getResultByDate']);
Route::get("getAdvanceDraws",[DrawMasterController::class,'getAdvanceDrawTimes']);
// CancelTicket
Route::patch("cancelTicket",[PlayMasterController::class,'cancelTicket']);
Route::patch("updateCancelable",[PlayMasterController::class,'updateCancelable']);

Route::post("getPreviousResultByDate",[ResultMasterController::class,'getPreviousResult']);


Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get("user",[UserController::class,'getCurrentUser']);
    Route::post("logout",[UserController::class,'logout']);


    Route::post("saveGameInputDetails",[PlayMasterController::class,'saveGameInputDetails']);
//    Route::get("getServerTime",[UserController::class,'getCurrentTimestamp']);
//    Route::get("getActiveDraw",[DrawMasterController::class,'getActiveDrawTime']);
//    Route::get("getPlaySeries",[PlaySeriesController::class,'getPlaySeries']);

    //stockiest
    Route::get("getAllStockists",[StockistController::class,'getAllStockists']);
    Route::get("selectNextStockistId",[StockistController::class,'selectNextStockistId']);
    Route::post("saveNewStockist",[StockistController::class,'saveNewStockist']);
    Route::post("updateStockistDetails",[StockistController::class,'updateStockistDetails']);
    Route::post("saveStockistRechargeData",[RechargeToStockistController::class,'saveStockistRechargeData']);

    //terminal
    Route::get("getAllTerminals",[StockistToTerminalController::class,'getAllTerminals']);
    Route::get("getActiveTerminal",[StockistToTerminalController::class,'getLoggedInTerminals']);
    Route::post("selectNextTerminalId",[StockistToTerminalController::class,'selectNextTerminalId']);
    Route::post("saveNewTerminal",[StockistToTerminalController::class,'saveNewTerminal']);
    Route::post("updateTerminalDetails",[StockistToTerminalController::class,'updateTerminalDetails']);
    Route::post("saveTerminalRechargeData",[RechargeToTerminalController::class,'saveTerminalRechargeData']);


    Route::post("setGamePayout",[PlaySeriesController::class,'setGamePayout']);
    Route::get("getDrawTimeForManualResult",[ManualResultDigitController::class,'getDrawTimeForManualResult']);
    Route::post("saveManualResult",[ManualResultDigitController::class,'saveManualResult']);
    Route::get("getLastInsertedManualResult",[ManualResultDigitController::class,'getLastInsertedManualResult']);
    Route::post("updateCurrentManual",[ManualResultDigitController::class,'updateCurrentManual']);


    // report
    Route::post("getTerminalTotalSaleReport",[RechargeToTerminalController::class,'getTerminalTotalSaleReport']);
    Route::post("getAllBarcodeReportByDate",[RechargeToTerminalController::class,'getAllBarcodeReportByDate']);
    Route::post("getAllBarcodeReportByDateStockiest",[RechargeToTerminalController::class,'getAllBarcodeReportByDateStockiest']);
    Route::post("getBarcodeInputDetails",[RechargeToTerminalController::class,'getBarcodeInputDetails']);
    Route::post("drawWiseReport",[RechargeToTerminalController::class,'drawWiseReport']);
    Route::post("resultFromCPanel",[ResultMasterController::class,'getResultByDateFromCPanel']);
    Route::post("terminalReportDetails",[RechargeToTerminalController::class,'terminalReportDetails']);
    Route::post("barcodeReportFromTerminal",[RechargeToTerminalController::class,'barcodeReportFromTerminal']);
    Route::post("getTotalBoxInput",[RechargeToTerminalController::class,'getTotalBoxInput']);



    Route::post("addNewMessage",[GameMessageController::class,'addNewMessage']);
    Route::get("selectMissedOutDrawTime",[DrawMasterController::class,'selectMissedOutDrawTime']);
    Route::post("insertMissedOutResult",[ResultMasterController::class,'insertMissedOutResult']);
    Route::post("activateCurrentDrawManually",[DrawMasterController::class,'activateCurrentDrawManually']);

    Route::post("claimBarcodeManually",[PlayMasterController::class,'claimBarcodeManually']);

    Route::put("terminalForceLogout",[UserController::class,'forceLogoutToTerminal']);



    //get all users
    Route::get("users",[UserController::class,'getAllUsers']);




});
//Common Numbers
Route::get("commonNumbers",[CommonNumberController::class,'getAllCommonNumbers']);
Route::get("commonNumbers",[CommonNumberController::class,'getAllCommonNumbersByCurrentDate']);
Route::post("commonNumbers",[CommonNumberController::class,'saveCommonNumbers']);
Route::patch("commonNumbers",[CommonNumberController::class,'UpdateCommonNumbers']);

