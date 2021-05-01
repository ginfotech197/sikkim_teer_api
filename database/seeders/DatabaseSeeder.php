<?php

namespace Database\Seeders;

use App\Models\Stockist;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserType;
use App\Models\DrawMaster;
use App\Models\PlaySeries;
use App\Models\Game;
use App\Models\NextGameDraw;
use App\Models\GameMessage;
use App\Models\MatrixCombination;
use App\Models\StockistToTerminal;
use App\Models\ResultMaster;
use App\Models\ResultDetails;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //person_types table data
        UserType::create(['user_type_name' => 'Admin']);
        UserType::create(['user_type_name' => 'Developer']);
        UserType::create(['user_type_name' => 'Terminal']);
        UserType::create(['user_type_name' => 'Stockist']);


        User::create(['user_name'=>'Nirmal Roy','email'=>'admin','password'=>'12345','pin'=>'12345','default_password'=>'12345','mobile'=>'9836444999','address'=>'Barrackpore','user_type_id'=>1]);
        User::create(['user_name'=>'Bimal das','email'=>'510501','password'=>'12345','pin'=>'12345','default_password'=>'12345','mobile'=>'9836444999','address'=>'Barrackpore','user_type_id'=>3]);
        User::create(['user_name'=>'Ram Nandi','email'=>'st001','password'=>'12345','pin'=>'12345','default_password'=>'12345','mobile'=>'9836444999','address'=>'Barrackpore','user_type_id'=>4]);

        // draw_masters table data
        DrawMaster::create(['serial_number'=>1, 'draw_name'=>'F/R', 'start_time'=>'00:00:00', 'end_time'=>'05:00:00', 'meridiem'=>'PM', 'active'=>1, 'diff'=>0]);
        DrawMaster::create(['serial_number'=>2, 'draw_name'=>'S/R', 'start_time'=>'05:00:00', 'end_time'=>'06:00:00', 'meridiem'=>'PM', 'active'=>0,'diff'=>0]);


        Stockist::create(['stockist_unique_id'=>'ST-0001','stockist_name' => 'test stockist' ,'user_id'=> 510501, 'user_password'=>12345, 'serial_number'=>1, 'current_balance'=>1000,'user_type_id'=>3]);

        StockistToTerminal::create(['stockist_id'=>1,'terminal_id' => 2 ,'current_balance'=> 1000, 'inforce'=>1]);


        // barcode_maxes table data



        //play_series table data
        PlaySeries::create(['series_name'=>'Jodi','game_initial' => '' ,'mrp'=> 1.00, 'winning_price'=>90, 'commision'=>5.00, 'payout'=>150,'default_payout'=>150]);

        ResultMaster::create(['game_date' => '2020-01-01', 'draw_master_id'=> 1,]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>1, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-01', 'draw_master_id'=> 2,]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>2, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-02', 'draw_master_id'=> 1,]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>3, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-02', 'draw_master_id'=> 2,]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>4, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-03', 'draw_master_id'=> 1,]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>5, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-03', 'draw_master_id'=> 2,]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>6, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-04', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>7, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-04', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>8, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-05', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>9, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-05', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>10, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-06', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>11, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-06', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>12, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-07', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>13, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-07', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>14, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-08', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>15, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-08', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>16, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-09', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>17, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-09', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>18, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-10', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>19, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-11', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>21, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-11', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>22, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-12', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>23, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-12', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>24, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-13', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>25, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-13', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>26, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-14', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>27, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-14', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>28, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-15', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>29, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-15', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>30, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-16', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>31, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-16', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>32, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-17', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>33, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-17', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>34, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-18', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' =>14, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>35, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-18', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>36, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-19', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>37, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-19', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>38, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-20', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>39, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-20', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>40, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-21', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>41, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-21', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>42, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-22', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>43, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-22', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>44, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-23', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>45, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-23', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>46, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-24', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>47, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-24', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>48, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-25', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>49, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-25', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>50, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-26', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>51, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-26', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>52, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-27', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>53, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-27', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>54, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-28', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>55, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-28', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>56, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-29', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>57, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-29', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>58, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-30', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>59, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-30', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>60, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-31', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>61, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-31', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>62, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-01', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>63, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-01', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>64, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-02', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>65, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-02', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>66, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-03', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>67, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-03', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>68, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-04', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>69, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-04', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>70, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-05', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>71, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-05', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>72, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-06', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>73, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-06', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>74, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-07', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>75, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-07', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>76, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-09', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>77, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-09', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>78, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-10', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>79, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-10', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>80, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-11', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>81, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-11', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>82, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-12', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>83, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-12', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>84, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-13', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>85, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-13', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>86, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-14', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>87, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-14', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>88, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-15', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>89, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-15', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>90, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-16', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>91, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-16', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>92, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-17', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>93, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-17', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>94, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-18', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>95, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-18', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>96, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-19', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>97, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-19', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>98, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-20', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>99, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-20', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>100, 'play_series_id'=>1]);





        //games table data
        Game::create(['game_name'=>'2D']);

        //next_game_draws table data
        NextGameDraw::create(['next_draw_id'=>2,'last_draw_id'=>1]);


         // matrix combination
         MatrixCombination::create(['row_num'=>0,'col_num' => 0]); MatrixCombination::create(['row_num'=>0,'col_num' => 1]); MatrixCombination::create(['row_num'=>0,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>0,'col_num' => 3]); MatrixCombination::create(['row_num'=>0,'col_num' => 4]); MatrixCombination::create(['row_num'=>0,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>0,'col_num' => 6]); MatrixCombination::create(['row_num'=>0,'col_num' => 7]); MatrixCombination::create(['row_num'=>0,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>0,'col_num' => 9]);

         MatrixCombination::create(['row_num'=>1,'col_num' => 0]); MatrixCombination::create(['row_num'=>1,'col_num' => 1]); MatrixCombination::create(['row_num'=>1,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>1,'col_num' => 3]); MatrixCombination::create(['row_num'=>1,'col_num' => 4]); MatrixCombination::create(['row_num'=>1,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>1,'col_num' => 6]); MatrixCombination::create(['row_num'=>1,'col_num' => 7]); MatrixCombination::create(['row_num'=>1,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>1,'col_num' => 9]);

         MatrixCombination::create(['row_num'=>2,'col_num' => 0]); MatrixCombination::create(['row_num'=>2,'col_num' => 1]); MatrixCombination::create(['row_num'=>2,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>2,'col_num' => 3]); MatrixCombination::create(['row_num'=>2,'col_num' => 4]); MatrixCombination::create(['row_num'=>2,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>2,'col_num' => 6]); MatrixCombination::create(['row_num'=>2,'col_num' => 7]); MatrixCombination::create(['row_num'=>2,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>2,'col_num' => 9]);

         MatrixCombination::create(['row_num'=>3,'col_num' => 0]); MatrixCombination::create(['row_num'=>3,'col_num' => 1]); MatrixCombination::create(['row_num'=>3,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>3,'col_num' => 3]); MatrixCombination::create(['row_num'=>3,'col_num' => 4]); MatrixCombination::create(['row_num'=>3,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>3,'col_num' => 6]); MatrixCombination::create(['row_num'=>3,'col_num' => 7]); MatrixCombination::create(['row_num'=>3,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>3,'col_num' => 9]);

         MatrixCombination::create(['row_num'=>4,'col_num' => 0]); MatrixCombination::create(['row_num'=>4,'col_num' => 1]); MatrixCombination::create(['row_num'=>4,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>4,'col_num' => 3]); MatrixCombination::create(['row_num'=>4,'col_num' => 4]); MatrixCombination::create(['row_num'=>4,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>4,'col_num' => 6]); MatrixCombination::create(['row_num'=>4,'col_num' => 7]); MatrixCombination::create(['row_num'=>4,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>4,'col_num' => 9]);

         MatrixCombination::create(['row_num'=>5,'col_num' => 0]); MatrixCombination::create(['row_num'=>5,'col_num' => 1]); MatrixCombination::create(['row_num'=>5,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>5,'col_num' => 3]); MatrixCombination::create(['row_num'=>5,'col_num' => 4]); MatrixCombination::create(['row_num'=>5,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>5,'col_num' => 6]); MatrixCombination::create(['row_num'=>5,'col_num' => 7]); MatrixCombination::create(['row_num'=>5,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>5,'col_num' => 9]);

         MatrixCombination::create(['row_num'=>6,'col_num' => 0]); MatrixCombination::create(['row_num'=>6,'col_num' => 1]); MatrixCombination::create(['row_num'=>6,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>6,'col_num' => 3]); MatrixCombination::create(['row_num'=>6,'col_num' => 4]); MatrixCombination::create(['row_num'=>6,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>6,'col_num' => 6]); MatrixCombination::create(['row_num'=>6,'col_num' => 7]); MatrixCombination::create(['row_num'=>6,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>6,'col_num' => 9]);

         MatrixCombination::create(['row_num'=>7,'col_num' => 0]); MatrixCombination::create(['row_num'=>7,'col_num' => 1]); MatrixCombination::create(['row_num'=>7,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>7,'col_num' => 3]); MatrixCombination::create(['row_num'=>7,'col_num' => 4]); MatrixCombination::create(['row_num'=>7,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>7,'col_num' => 6]); MatrixCombination::create(['row_num'=>7,'col_num' => 7]); MatrixCombination::create(['row_num'=>7,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>7,'col_num' => 9]);

         MatrixCombination::create(['row_num'=>8,'col_num' => 0]); MatrixCombination::create(['row_num'=>8,'col_num' => 1]); MatrixCombination::create(['row_num'=>8,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>8,'col_num' => 3]); MatrixCombination::create(['row_num'=>8,'col_num' => 4]); MatrixCombination::create(['row_num'=>8,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>8,'col_num' => 6]); MatrixCombination::create(['row_num'=>8,'col_num' => 7]); MatrixCombination::create(['row_num'=>8,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>8,'col_num' => 9]);

         MatrixCombination::create(['row_num'=>9,'col_num' => 0]); MatrixCombination::create(['row_num'=>9,'col_num' => 1]); MatrixCombination::create(['row_num'=>9,'col_num' => 2]);
         MatrixCombination::create(['row_num'=>9,'col_num' => 3]); MatrixCombination::create(['row_num'=>9,'col_num' => 4]); MatrixCombination::create(['row_num'=>9,'col_num' => 5]);
         MatrixCombination::create(['row_num'=>9,'col_num' => 6]); MatrixCombination::create(['row_num'=>9,'col_num' => 7]); MatrixCombination::create(['row_num'=>9,'col_num' => 8]);
         MatrixCombination::create(['row_num'=>9,'col_num' => 9]);
    }
}
