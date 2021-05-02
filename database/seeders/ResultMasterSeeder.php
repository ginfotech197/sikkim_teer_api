<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResultMaster;
use App\Models\ResultDetails;

class ResultMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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

        ResultMaster::create(['game_date' => '2020-01-10', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>20, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-11', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>21, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-11', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>22, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-12', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>23, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-01-12', 'draw_master_id'=> 2]);
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

        ResultMaster::create(['game_date' => '2020-02-21', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>101, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-21', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>102, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-22', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>103, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-22', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>104, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-23', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>105, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-23', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>106, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-24', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>107, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-24', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>108, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-25', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>109, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-25', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>110, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-26', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>111, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-26', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>112, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-27', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>113, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-27', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>114, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-28', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>115, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-28', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>116, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-29', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>117, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-02-29', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>118, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-01', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>119, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-01', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>120, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-02', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>121, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-02', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>122, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-03', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>123, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-03', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>124, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-04', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>125, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-04', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>126, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-05', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>127, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-05', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>128, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-06', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>129, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-06', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>130, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-07', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>131, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-07', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>132, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-08', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>133, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-08', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>134, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-09', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>135, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-09', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>136, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-10', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>137, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-10', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>138, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-11', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>139, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-11', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>140, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-12', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>141, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-12', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>142, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-13', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>143, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-13', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>144, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-14', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>145, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-14', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>146, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-15', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>147, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-15', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>148, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-16', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>149, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-16', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>150, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-17', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>151, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-17', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>152, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-18', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>153, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-18', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>154, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-19', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>155, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-19', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>156, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-20', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>157, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-20', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>158, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-21', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>159, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-21', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>160, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-22', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>161, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-22', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>162, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-23', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>163, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-23', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>164, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-24', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>165, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-24', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>166, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-25', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>167, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-25', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>168, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-26', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>169, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-26', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>170, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-27', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>171, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-27', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>172, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-28', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>173, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-28', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>174, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-29', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>175, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-29', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>176, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-30', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>177, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-03-30', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>178, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-01', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>179, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-01', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>180, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-02', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>181, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-02', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>182, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-03', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>183, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-03', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>184, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-04', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>185, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-04', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>186, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-05', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>187, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-05', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>188, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-06', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>189, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-06', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>190, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-07', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>191, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-07', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>192, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-08', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>193, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-08', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>194, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-09', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>195, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-09', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>196, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-10', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>197, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-10', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>198, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-11', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>199, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-11', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>200, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-12', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>201, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-12', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>202, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-13', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>203, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-13', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>204, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-14', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>205, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-14', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>206, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-15', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>207, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-15', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>208, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-16', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>209, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2020-04-16', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>210, 'play_series_id'=>1]);


        //April 2021
        ResultMaster::create(['game_date' => '2021-04-01', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>211, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-01', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>212, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-02', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>213, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-02', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>214, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-08', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>215, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-08', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>216, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-09', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>217, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-09', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>218, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-10', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>219, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-10', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>220, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-11', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>221, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-11', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>222, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-12', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>223, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-12', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>224, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-13', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>225, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-13', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>226, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-14', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>227, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-14', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>228, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-15', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>229, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-15', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>230, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-16', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>231, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-16', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>232, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-18', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>233, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-18', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>234, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-19', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>235, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-19', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>236, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-20', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>237, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-20', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>238, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-21', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>5, 'payout'=>150, 'result_master_id'=>239, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-21', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>240, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-22', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>241, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-22', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>242, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-23', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>2, 'payout'=>150, 'result_master_id'=>243, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-23', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>244, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-24', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>245, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-24', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>0, 'payout'=>150, 'result_master_id'=>246, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-25', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>4, 'payout'=>150, 'result_master_id'=>247, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-25', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 8, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>248, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-26', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 2, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>249, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-26', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 6, 'result_col'=>9, 'payout'=>150, 'result_master_id'=>250, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-27', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 3, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>251, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-27', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>7, 'payout'=>150, 'result_master_id'=>252, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-28', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>1, 'payout'=>150, 'result_master_id'=>253, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-28', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 9, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>254, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-29', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 7, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>255, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-29', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>256, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-30', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 4, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>257, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-04-30', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 0, 'result_col'=>3, 'payout'=>150, 'result_master_id'=>258, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-05-01', 'draw_master_id'=> 1]);
        ResultDetails::create(['result_row' => 1, 'result_col'=>8, 'payout'=>150, 'result_master_id'=>259, 'play_series_id'=>1]);

        ResultMaster::create(['game_date' => '2021-05-01', 'draw_master_id'=> 2]);
        ResultDetails::create(['result_row' => 5, 'result_col'=>6, 'payout'=>150, 'result_master_id'=>260, 'play_series_id'=>1]);

    }
}
