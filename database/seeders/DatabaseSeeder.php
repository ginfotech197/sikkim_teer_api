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
        User::create(['user_name'=>'Bimal das','email'=>'T510501','password'=>'12345','pin'=>'12345','default_password'=>'12345','mobile'=>'9836444999','address'=>'Barrackpore','user_type_id'=>3]);
        User::create(['user_name'=>'Ram Nandi','email'=>'st001','password'=>'12345','pin'=>'12345','default_password'=>'12345','mobile'=>'9836444999','address'=>'Barrackpore','user_type_id'=>4]);

        // draw_masters table data
        DrawMaster::create(['serial_number'=>1, 'draw_name'=>'F/R', 'start_time'=>'00:00:00', 'end_time'=>'05:00:00', 'meridiem'=>'PM', 'active'=>1, 'diff'=>0]);
        DrawMaster::create(['serial_number'=>2, 'draw_name'=>'S/R', 'start_time'=>'05:00:00', 'end_time'=>'06:00:00', 'meridiem'=>'PM', 'active'=>0,'diff'=>0]);


        Stockist::create(['stockist_unique_id'=>'ST-0001','stockist_name' => 'test stockist' ,'user_id'=> 510501, 'user_password'=>12345, 'serial_number'=>1, 'current_balance'=>99999,'user_type_id'=>3]);

        StockistToTerminal::create(['stockist_id'=>1,'terminal_id' => 2 ,'current_balance'=> 99999, 'inforce'=>1]);


        // barcode_maxes table data



        //play_series table data
        PlaySeries::create(['series_name'=>'Jodi','game_initial' => '' ,'mrp'=> 10.00, 'winning_price'=>90, 'commision'=>5.00, 'payout'=>150,'default_payout'=>150]);


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
