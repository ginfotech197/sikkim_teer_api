<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAllProceduresAndFunctions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('drop VIEW IF EXISTS getAllBarcodeReport;
                Create view getAllBarcodeReport as (select *
                ,if(is_claimed=1,\'Yes\',\'No\') as claimed
                from (select max(email) as terminal_user_id,
                            max(draw_time) as draw_time
                            ,max(ticket_taken_time) as ticket_taken_time
                            ,barcode
                            ,table1.stockist_id
                            ,table1.game_date
                            ,max(play_master_id) as play_master_id
                            ,max(terminal_id) as terminal_id
                            ,max(draw_master_id) as draw_master_id
                            ,sum(game_value) as quantity
                            ,sum(game_value* mrp) as amount
                            ,get_prize_value_of_barcode(barcode) as prize_value
                            ,group_concat(row_num,\'-[\',game_value,\']\' order by row_num) as particulars
                            ,max(is_claimed) as is_claimed
                            ,max(is_cancelled) as is_cancelled
                            from (select
                            play_masters.barcode_number as barcode
                            ,play_masters.id as play_master_id
                            ,stockist_to_terminals.stockist_id
                            ,play_masters.created_at as game_date
                            , max(play_masters.terminal_id) as terminal_id
                            ,max(users.email) as email
                            , play_details.play_series_id
                            ,max(play_series.mrp) as mrp
                            , max(play_masters.draw_master_id) as draw_master_id
                            ,max(play_masters.is_claimed) as is_claimed
                            ,max(play_masters.is_cancelled) as is_cancelled
                            , play_details.row_num as row_num
                            , play_details.col_num as col_num
                            , max(play_details.game_value) as game_value
                            , max(draw_masters.start_time) as start_time
                            , TIME_FORMAT(max(draw_masters.end_time),\'%h:%i:%s %p\') as draw_time
                            ,TIME_FORMAT(max(play_masters.created_at), \'%h:%i:%s %p\') as ticket_taken_time
                            from play_details
                            inner join play_masters ON play_masters.id = play_details.play_master_id
                            inner join draw_masters ON draw_masters.id = play_masters.draw_master_id
                            inner join play_series ON play_series.id = play_details.play_series_id
                            inner join users on users.id = play_masters.terminal_id
                            inner join stockist_to_terminals on stockist_to_terminals.terminal_id = users.id
                            group by play_details.play_master_id,play_masters.id,play_masters.created_at
                            ,play_masters.barcode_number,play_details.play_series_id
                            ,play_details.row_num,play_details.col_num,stockist_id) as table1
                            group by barcode,stockist_id,game_date order by draw_master_id desc,ticket_taken_time desc) as table2)'
        );

        DB::unprepared('drop VIEW IF EXISTS digit_table;
              CREATE VIEW digit_table AS
              SELECT email,agent_name,terminal_id,stockist_user_id,commision,winning_price,winning_bonous_percent,mrp,ticket_taken_time,record_time FROM
              (
            select
            users.email as email
            ,users.user_name as agent_name
            ,play_masters.terminal_id as terminal_id
            ,stockists.user_id as stockist_user_id
            ,play_series.commision as commision
            ,play_series.winning_bonous_percent as winning_bonous_percent
                        , play_series.winning_price as winning_price
                        , play_series.mrp as mrp
                        , date(play_masters.created_at) as ticket_taken_time,play_masters.created_at as record_time
                        from play_details
                        inner join play_masters ON play_masters.id = play_details.play_master_id
                        inner join play_series ON play_series.id = play_details.play_series_id
                        inner join users ON users.id = play_masters.terminal_id
                        inner join stockist_to_terminals on users.id = stockist_to_terminals.terminal_id
                        inner join stockists on stockist_to_terminals.stockist_id = stockists.id
                        where play_masters.is_cancelled = 0
                        order by terminal_id,ticket_taken_time
              ) as table1;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS customer_sale_report_from_admin;
            DROP PROCEDURE IF EXISTS customer_sale_report_from_admin;
                CREATE PROCEDURE `customer_sale_report_from_admin`(IN `start_date` DATE, IN `end_date` DATE)
                BEGIN
                SELECT
                    *
                FROM
                    (
                    SELECT
                        COALESCE(email, \'Grand Total\') AS terminal_user_id,
                        MAX(agent_name) AS agent_name,
                        COALESCE(terminal_id) AS terminal_id,
                        MAX(stockist_user_id) AS stockist_user_id,
                        winning_bonous_percent,
                        SUM(amount) AS amount,
                        SUM(commision) AS commision,
                        SUM(prize_value) AS prize_value,
                        SUM(prize_value) * winning_bonous_percent/100 AS winning_bonous,
                        SUM(net_payable) AS net_payable,
                        MAX(record_time) AS record_time
                    FROM
                        (
                        SELECT
                            \'digit\' AS game_name,
                            email,
                            agent_name,
                            MAX(stockist_user_id) AS stockist_user_id,
                            MAX(winning_bonous_percent) AS winning_bonous_percent,
                            terminal_id,
                            CAST(ticket_taken_time AS DATE) AS ticket_taken_time,
                            terminal_total_sale_by_date(ticket_taken_time, terminal_id) AS amount,
                            terminal_commission_by_sale_date(ticket_taken_time, terminal_id) AS commision,
                            get_total_prize_value_by_date(ticket_taken_time, terminal_id) AS prize_value,
                            terminal_net_payable_by_sale_date(ticket_taken_time, terminal_id) AS net_payable,
                            MAX(record_time) AS record_time
                        FROM
                            (
                            SELECT
                                *
                            FROM
                                digit_table
                            WHERE
                                ticket_taken_time BETWEEN start_date AND end_date
                            ORDER BY
                                record_time
                        ) AS table1
                    GROUP BY
                        terminal_id,email,ticket_taken_time
                    ) AS table2
                GROUP BY
                    terminal_id,winning_bonous_percent,email WITH ROLLUP
                ) AS table3
            ORDER BY
                terminal_id;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS digit_barcode_report_from_terminal;
            CREATE PROCEDURE `digit_barcode_report_from_terminal`(IN `term_id` VARCHAR(100), IN `start_date` DATE, IN `end_date` DATE)
            BEGIN
            SELECT
                draw_time,
                MAX(ticket_taken_time) AS ticket_taken_time,
                barcode_number,is_cancelled,is_cancelable,
                max(play_master_id) as play_master_id,
                MAX(draw_master_id) AS draw_master_id,
                SUM(game_value) AS quantity,
                SUM(game_value) * MAX(mrp) AS amount,
                get_prize_value_of_barcode(barcode_number) AS prize_value,
                GROUP_CONCAT(
                    row_num,
                    col_num
                ORDER BY
                    row_num,
                    col_num
                ) AS particulars,
                MAX(is_claimed) AS is_claimed
            FROM
                (
                SELECT
                    play_masters.barcode_number,
                    play_masters.id as play_master_id,
                    play_masters.terminal_id,
                    play_details.play_series_id,
                    play_series.mrp,
                    play_masters.draw_master_id,
                    play_masters.is_claimed,
                    play_masters.is_cancelled,
                    play_masters.is_cancelable,
                    play_details.row_num,
                    play_details.col_num,
                    play_details.game_value,
                    draw_masters.start_time,
                    draw_masters.end_time AS draw_time,
                    TIME_FORMAT(
                        play_masters.created_at,
                        \'%h:%i%p\'
                    ) AS ticket_taken_time
                FROM
                    play_details
                INNER JOIN(
                    SELECT
                        *
                    FROM
                        play_masters
                    WHERE
                        terminal_id = term_id AND DATE(play_masters.created_at) BETWEEN start_date AND end_date
                ) play_masters
            ON
                play_masters.id = play_details.play_master_id
            INNER JOIN draw_masters ON draw_masters.id = play_masters.draw_master_id
            INNER JOIN play_series ON play_series.id = play_details.play_series_id
            ORDER BY
                draw_master_id
            DESC
            ) AS table1
            GROUP BY
                barcode_number,
                draw_time,
                is_cancelled,
                is_cancelable
            ORDER BY
                draw_master_id DESC,ticket_taken_time DESC;

            END;

        ');
        DB::unprepared('DROP PROCEDURE IF EXISTS draw_wise_report;
            CREATE PROCEDURE `draw_wise_report`(IN `gameDate` DATE)
                NO SQL
            BEGIN
            select * from

            (select t1.game_date,t1.series_name,t1.draw_master_id,t1.play_series_id,
            t1.draw_time,t1.result_row,t1.result_col,t1.payout_server,t3.sale_amount
            ,t4.prize_value from

            (SELECT game_date,series_name,serial_number,result_masters.draw_master_id,
            result_details.play_series_id,concat(time_format(end_time,"%h:%i")) as draw_time,
            result_row,result_col,result_details.payout as payout_server FROM `result_details`
            inner join result_masters on result_details.result_master_id=result_masters.id
            inner join draw_masters on result_masters.draw_master_id=draw_masters.id
            inner join play_series on result_details.play_series_id=play_series.id
            where game_date= gameDate order by serial_number) as t1
            LEFT join (
            select game_name,draw_master_id,ticket_taken_time,mrp,sum(game_value)*mrp as sale_amount
            from (select \'2DIGIT\' as game_name,terminal_id,date(t1.created_at)as ticket_taken_time,mrp,draw_master_id,
            play_details.play_series_id,game_value,is_claimed from play_details
            inner join
            (select * from play_masters where date(created_at)= gameDate) t1 on play_details.play_master_id=t1.id
            inner join play_series on play_details.play_series_id=play_series.id)t1
            group by draw_master_id,ticket_taken_time,mrp) t3 on t1.draw_master_id=t3.draw_master_id
            left join (select draw_master_id,sum(get_prize_value_of_barcode(barcode_number)) as prize_value from play_masters
            where date(play_masters.created_at)= gameDate group by draw_master_id)t4 on t1.draw_master_id=t4.draw_master_id
            order by serial_number,play_series_id)as table1
            LEFT join
            (select draw_master_id,play_series_id,game_date,result from manual_result_digits where game_date= gameDate)t2
            on table1.draw_master_id=t2.draw_master_id AND table1.play_series_id=t2.play_series_id;
            END;
        ');
        DB::unprepared('DROP PROCEDURE IF EXISTS fetch_terminal_digit_total_sale;
            CREATE PROCEDURE `fetch_terminal_digit_total_sale`(IN `term_id` VARCHAR(100), IN `start_date` DATE, IN `end_date` DATE)
            BEGIN
            select
            DATE_FORMAT(ticket_taken_time, "%d/%m/%Y") as ticket_taken_time
              ,sum(game_value*mrp) as amount
              ,terminal_commission_by_sale_date(ticket_taken_time, term_id) AS commision
              ,get_total_prize_value_by_date(ticket_taken_time,term_id) * max(winning_bonous_percent)/100 as winning_bonous
              ,get_total_prize_value_by_date(ticket_taken_time,term_id) as prize_value
              ,terminal_net_payable_by_sale_date(ticket_taken_time,term_id) as net_payable
              from (select play_masters.terminal_id as terminal_id,
              play_series.commision as commision, play_series.winning_price as winning_price,
              play_series.winning_bonous_percent, play_series.mrp as mrp,play_details.game_value,
              date(play_masters.created_at) as ticket_taken_time
              from play_details
              inner join play_masters ON play_masters.id = play_details.play_master_id
              inner join play_series ON play_series.id = play_details.play_series_id
              where date(play_masters.created_at) between start_date and end_date and terminal_id=term_id  and play_masters.is_cancelled=0) as table1
              group by ticket_taken_time;

            END;
        ');
        DB::unprepared('DROP PROCEDURE IF EXISTS game_wise_total_input;
            CREATE PROCEDURE `game_wise_total_input`(IN `draw_id` INT)
            BEGIN
            select series_name ,max(zero) as `zero` ,max(one) as `one`,max(two) as `two`, max(three) as `three`,max(four) as `four`,max(five) as `five`,max(six) as `six`,max(seven) as `seven`,max(eight) as `eight`,max(nine) as `nine`
            from (select series_name,input_box,input_value,
             (CASE when (input_box = 0) Then input_value ELSE 0 END) as \'zero\',(CASE when (input_box = 1) Then input_value ELSE 0 END) as \'one\',
            (CASE when (input_box = 2) Then input_value ELSE 0 END) as \'two\',(CASE when (input_box = 3) Then input_value ELSE 0 END) as \'three\',
            (CASE when (input_box = 4) Then input_value ELSE 0 END) as \'four\',(CASE when (input_box = 5) Then input_value ELSE 0 END) as \'five\',
            (CASE when (input_box = 6) Then input_value ELSE 0 END) as \'six\',(CASE when (input_box = 7) Then input_value ELSE 0 END) as \'seven\',
            (CASE when (input_box = 8) Then input_value ELSE 0 END) as \'eight\',(CASE when (input_box = 9) Then input_value ELSE 0 END) as \'nine\'
            from (select play_details.play_series_id,series_name,input_box,sum(input_value) as input_value from play_details inner join
            (select * from play_masters where date(created_at)=curdate() and draw_master_id= draw_id)play_masters
            on play_details.play_master_id=play_masters.id
            inner join play_series on play_details.play_series_id=play_series.id
            group by play_details.play_series_id,play_series.series_name,play_details.input_box) as table1) as table2 group by series_name;
            END;
        ');
        DB::unprepared('DROP PROCEDURE IF EXISTS insert_jodi_result;
            CREATE PROCEDURE `insert_jodi_result`(IN `draw_id` INT)
            BEGIN
              Declare i INT;
              DECLARE cell_address INT;
              DECLARE r FLOAT;
              DECLARE c INT;
              DECLARE payoutValue FLOAT;
              DECLARE last_inserted_id FLOAT;
              DECLARE _rollback BOOL DEFAULT 0;
                DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET _rollback = 1;
                START TRANSACTION;
              /*insert into result master table*/
                insert into result_masters (
                draw_master_id
                ,game_id
                ,game_date
              ) VALUES (
                 draw_id
                 ,1
                ,curdate()
              );
              /*end of insert into result master table*/
              /*insert into result details table*/
              select LAST_INSERT_ID() into last_inserted_id;
              set @i=1;
              SELECT payout into payoutValue FROM `play_series` where id=@i;
              set @cell_address=get_2d_winning_cell(draw_id, @i ,date_format(curdate(), "%Y-%m-%d"));
              set @r=floor(@cell_address / 10);
              set @c=@cell_address % 10;
               insert into result_details (
                result_master_id
                ,result_row
                ,result_col
                ,payout
                ,play_series_id
              ) VALUES (
                 last_inserted_id
                ,@r
                ,@c
                ,payoutValue
                ,@i
              );
                IF _rollback THEN
                    ROLLBACK;
                ELSE
                    COMMIT;
                END IF;
            END;
        ');
        DB::unprepared('DROP PROCEDURE IF EXISTS secondLastTotal;
            CREATE PROCEDURE `secondLastTotal`(IN `draw_id` INT)
            BEGIN
             select \'aandar\' as box, max(zero)zero,max(one)as one,max(two) two,max(three) three,max(four)four,max(five)five,
            max(six)six,max(seven)seven,max(eight)eight,max(nine)nine from
            (select (CASE when (row_num = 0) Then val_one ELSE 0 END) as \'zero\', (CASE when (row_num = 1) Then val_one ELSE 0 END) as \'one\',
            (CASE when (row_num = 2) Then val_one ELSE 0 END) as \'two\', (CASE when (row_num = 3) Then val_one ELSE 0 END) as \'three\',
            (CASE when (row_num = 4) Then val_one ELSE 0 END) as \'four\', (CASE when (row_num = 5) Then val_one ELSE 0 END) as \'five\',
            (CASE when (row_num = 6) Then val_one ELSE 0 END) as \'six\', (CASE when (row_num = 7) Then val_one ELSE 0 END) as \'seven\',
            (CASE when (row_num = 8) Then val_one ELSE 0 END) as \'eight\', (CASE when (row_num = 9) Then val_one ELSE 0 END) as \'nine\'
            from (select row_num,sum(val_one) as val_one from play_details inner join
             (select * from play_masters where date(created_at)=curdate() and draw_master_id=draw_id)play_masters
             on play_details.play_master_id=play_masters.id group by row_num) t1 group by row_num) t1
             union
             select \'bahar\' as box,max(zero)zero,max(one)as one,max(two) two,max(three) three,max(four)four,max(five)five,
            max(six)six,max(seven)seven,max(eight)eight,max(nine)nine from
            (select (CASE when (col_num = 0) Then val_two ELSE 0 END) as \'zero\', (CASE when (col_num = 1) Then val_two ELSE 0 END) as \'one\',
            (CASE when (col_num = 2) Then val_two ELSE 0 END) as \'two\', (CASE when (col_num = 3) Then val_two ELSE 0 END) as \'three\',
            (CASE when (col_num = 4) Then val_two ELSE 0 END) as \'four\', (CASE when (col_num = 5) Then val_two ELSE 0 END) as \'five\',
            (CASE when (col_num = 6) Then val_two ELSE 0 END) as \'six\', (CASE when (col_num = 7) Then val_two ELSE 0 END) as \'seven\',
            (CASE when (col_num = 8) Then val_two ELSE 0 END) as \'eight\', (CASE when (col_num = 9) Then val_two ELSE 0 END) as \'nine\'
            from (select col_num,sum(val_two) as val_two from play_details inner join
             (select * from play_masters where date(created_at)=curdate() and draw_master_id=draw_id)play_masters
             on play_details.play_master_id=play_masters.id group by col_num) t1 group by col_num) t1;
            END;
        ');
        DB::unprepared('DROP FUNCTION IF EXISTS get_2d_winning_cell;
            CREATE FUNCTION `get_2d_winning_cell`(draw_id INT,series_id INT,draw_date DATE) RETURNS int
                READS SQL DATA
                DETERMINISTIC
            BEGIN
                          DECLARE cell_address INT;
                          DECLARE target_value INT;
                          DECLARE winning_row INT;
                          DECLARE winning_col INT;
                          DECLARE val INT;
                          select get_winning_value(draw_id, series_id, draw_date) into target_value;
                          select result into cell_address from manual_result_digits
                          where play_series_id=series_id and draw_master_id=draw_id and game_date=draw_date;
                          IF cell_address IS NULL THEN
                             /*Get the matching value*/
                            select
                            sum(play_details.game_value) as game_value into val
                            from play_details
                            inner join play_masters ON play_masters.id = play_details.play_master_id
                            inner join play_series ON play_series.id = play_details.play_series_id
                            where play_masters.draw_master_id=draw_id and play_series.id=series_id and date(play_masters.created_at)=draw_date
                            group by play_details.row_num, play_details.col_num
                            having game_value<=target_value order by game_value desc limit 1;
                          /*End of get the matching value*/
                          /*Fetch the final row and column both and set the cell*/
                            select row_num,col_num into winning_row,winning_col from (select play_details.row_num,play_details.col_num,
                            sum(play_details.game_value) as game_value
                            from play_details
                            inner join play_masters ON play_masters.id = play_details.play_master_id
                            inner join play_series ON play_series.id = play_details.play_series_id
                            where play_masters.draw_master_id=draw_id and play_series.id=series_id and date(play_masters.created_at)=draw_date
                            group by play_details.row_num, play_details.col_num
                            having game_value = val order by rand() limit 1) as table1;
                            SET cell_address = 10 * winning_row + winning_col;
                          END IF;
                          /* If do not get the closest lower value of the target value then select blank cell*/
                          IF cell_address IS NULL THEN
                            SET cell_address= get_jodi_null_cell(draw_id, series_id, draw_date);
                          END IF;
                          /* End of  selecting the blank cell*/
                          /* If no equal or closest lower value OR no blank cell then select the closest greater value*/
                          IF cell_address IS NULL THEN
                             /*Get the matching value*/
                            select sum(play_details.game_value) as game_value into val
                            from play_details
                            inner join play_masters ON play_masters.id = play_details.play_master_id
                            inner join play_series ON play_series.id = play_details.play_series_id
                            where play_masters.draw_master_id=draw_id and play_details.play_series_id=series_id
                            and date(play_masters.created_at)=draw_date
                            group by play_details.row_num, play_details.col_num
                            having game_value > target_value order by game_value asc limit 1;
                          /*End of get the matching value*/
                          /*Fetch the final row and column both and set the cell*/
                            select row_num,col_num into winning_row,winning_col from (select play_details.row_num,play_details.col_num,
                            sum(play_details.game_value) as game_value
                            from play_details
                            inner join play_masters ON play_masters.id = play_details.play_master_id
                            inner join play_series ON play_series.id = play_details.play_series_id
                            where play_masters.draw_master_id=draw_id and play_series.id=series_id and date(play_masters.created_at)=draw_date
                            group by play_details.row_num, play_details.col_num
                            having game_value = val order by rand() limit 1)as table1;
                            SET cell_address = 10 * winning_row + winning_col;
                          END IF;
                            RETURN cell_address;
                        END;
        ');
        DB::unprepared('DROP FUNCTION IF EXISTS get_jodi_null_cell;
            CREATE FUNCTION `get_jodi_null_cell`(`draw_id` INT, `series_id` INT, `draw_date` DATE) RETURNS int
                READS SQL DATA
                DETERMINISTIC
            BEGIN
                        DECLARE winning_row INT;
                      DECLARE winning_col INT;
                      DECLARE cell_address INT;
                      select row_num,col_num into winning_row,winning_col from(select row_num,col_num from matrix_combinations where not EXISTS
                      (select row_num,col_num from(select
                      play_details.row_num
                      , play_details.col_num
                      , sum(play_details.game_value) as game_value
                      from play_details
                      inner join play_masters ON play_masters.id = play_details.play_master_id
                      inner join play_series ON play_series.id = play_details.play_series_id
                      where play_masters.draw_master_id = draw_id AND play_series.id = series_id
                      AND date(play_masters.created_at) = draw_date
                       group by play_details.row_num, play_details.col_num order by row_num)as table1
                       where table1.col_num = matrix_combinations.col_num and table1.row_num = matrix_combinations.row_num)) as table2
            order by rand() limit 1;
            SET cell_address = 10 * winning_row + winning_col;
            RETURN cell_address;
            END;
        ');
        DB::unprepared('DROP FUNCTION IF EXISTS get_prize_value_of_barcode;
            CREATE FUNCTION `get_prize_value_of_barcode`(`barcode` VARCHAR(30)) RETURNS double
                READS SQL DATA
                DETERMINISTIC
            BEGIN

             DECLARE prize_value DOUBLE;
             DECLARE secLastTotal INT;
             DECLARE lastTotal INT;
              SET @sr_id=\'\';
              SET @draw_id=\'\';
              SET @draw_date=\'\';
              SET @target_row=\'\';
              SET @target_col=\'\';

              select max(play_details.play_series_id),max(play_masters.draw_master_id),date(max(play_masters.created_at))
              into @sr_id, @draw_id, @draw_date from play_details
              inner join (select * from play_masters where barcode_number=barcode) play_masters
              ON play_masters.id = play_details.play_master_id
              inner join play_series ON play_series.id = play_details.play_series_id;

             select select_result_row(@draw_date,@draw_id) into @target_row;
             select select_result_column(@draw_date,@draw_id) into @target_col;

              IF @sr_id=1 THEN

                select (play_details.game_value * play_series.winning_price) into prize_value from play_details
                inner join play_series ON play_series.id = play_details.play_series_id
                inner join play_masters on play_masters.id=play_details.play_master_id
                where play_masters.barcode_number= barcode and row_num=@target_row and col_num=@target_col;
              ELSE
                SELECT sum(val_one)*max(play_series.winning_price) into secLastTotal FROM play_details
                inner join play_masters on play_masters.id=play_details.play_master_id
                inner join play_series ON play_series.id = play_details.play_series_id
                where play_masters.barcode_number=barcode and play_details.row_num=@target_row;

                SELECT sum(val_two)*max(play_series.winning_price) into lastTotal FROM play_details
                inner join play_masters on play_masters.id=play_details.play_master_id
                inner join play_series ON play_series.id = play_details.play_series_id
                where play_masters.barcode_number=barcode and play_details.col_num=@target_col;
                IF secLastTotal IS NULL THEN
                  SET secLastTotal = 0;
                END IF;
                IF lastTotal IS NULL THEN
                  SET lastTotal = 0;
                END IF;
                SET prize_value=(secLastTotal + lastTotal);
              END IF;

               IF prize_value IS NOT NULL THEN
                RETURN prize_value;
              ELSE
                RETURN 0;
              END IF;

            END;
        ');
        DB::unprepared('DROP FUNCTION IF EXISTS get_prize_value_of_barcode2;
            CREATE FUNCTION `get_prize_value_of_barcode2`(`barcode` VARCHAR(30)) RETURNS double
                READS SQL DATA
                DETERMINISTIC
            BEGIN

             DECLARE prize_value DOUBLE;
             DECLARE secLastTotal INT;
             DECLARE lastTotal INT;
              SET @sr_id=\'\';
              SET @draw_id=\'\';
              SET @draw_date=\'\';
              SET @target_row=\'\';
              SET @target_col=\'\';

              select max(play_details.play_series_id),max(play_masters.draw_master_id),date(max(play_masters.created_at))
              into @sr_id, @draw_id, @draw_date from play_details
              inner join (select * from play_masters where barcode_number=barcode) play_masters
              ON play_masters.id = play_details.play_master_id
              inner join play_series ON play_series.id = play_details.play_series_id;

             select select_result_row(@draw_date,@draw_id) into @target_row;
             select select_result_column(@draw_date,@draw_id) into @target_col;

              IF @sr_id=1 THEN

                select (play_details.game_value * play_series.winning_price) into prize_value from play_details
                inner join play_series ON play_series.id = play_details.play_series_id
                inner join play_masters on play_masters.id=play_details.play_master_id
                where play_masters.barcode_number= barcode and row_num=@target_row and col_num=@target_col;

              END IF;

               IF prize_value IS NOT NULL THEN
                RETURN prize_value;
              ELSE
                RETURN 0;
              END IF;

            END;
        ');
        DB::unprepared('DROP FUNCTION IF EXISTS get_winning_value;
            CREATE FUNCTION `get_winning_value`(`draw_id` INT, `series_id` INT, `draw_date` DATE) RETURNS int
                READS SQL DATA
                DETERMINISTIC
            BEGIN
              DECLARE total_sale INT;
               select sum(game_value)*mrp into total_sale from play_details
             inner join play_masters ON play_details.play_master_id=play_masters.id
             inner join play_series ON play_details.play_series_id=play_series.id
            where play_masters.draw_master_id= draw_id and play_details.play_series_id= series_id
             and date(play_masters.created_at)= draw_date
             group by play_details.play_series_id,play_series.mrp;
             IF total_sale IS NOT NULL THEN
             select total_sale*commision/100,payout/100,winning_price into @commision,@p,@winning_price
              from play_series where id = series_id;
              set @winning_price_on = (total_sale - @commision)*@p;
              select truncate(@winning_price_on/@winning_price,0) into @winning_value;
              IF @winning_value IS NOT NULL THEN
              RETURN @winning_value;
              ELSE
              RETURN 0;
              END IF;
              ELSE
             return 0;
              END IF;
            END;
        ');
        DB::unprepared('DROP FUNCTION IF EXISTS select_result_column;
            CREATE FUNCTION `select_result_column`(`draw_date` DATE, `draw_id` INT) RETURNS int
                READS SQL DATA
                DETERMINISTIC
            BEGIN
              DECLARE col INT;

            select
              result_details.result_col into col
              from result_details
              inner join (select * from result_masters where game_date=draw_date
              and draw_master_id=draw_id) result_masters on result_details.result_master_id = result_masters.id
            order by result_masters.draw_master_id;

                RETURN col;
            END;
        ');
        DB::unprepared('DROP FUNCTION IF EXISTS select_result_row;
            CREATE FUNCTION `select_result_row`(`draw_date` DATE, `draw_id` INT) RETURNS int
                READS SQL DATA
                DETERMINISTIC
            BEGIN
              DECLARE r INT;

              select
              result_details.result_row into r
              from result_details
              inner join (select * from result_masters where game_date=draw_date and draw_master_id=draw_id) result_masters
              on result_details.result_master_id = result_masters.id
            order by result_masters.draw_master_id;
            RETURN r;
            END;
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS terminal_commission_by_sale_date;
            CREATE FUNCTION `terminal_commission_by_sale_date`(`sale_date` DATE, `terminal_id` VARCHAR(20)) RETURNS double
            DETERMINISTIC
            BEGIN
                declare total DOUBLE;
              declare com DOUBLE;
              /*select max(commision) into com from play_series;*/
              SET total=terminal_total_sale_by_date(sale_date,terminal_id);
              /*end of getting total sale*/
              select total * max(commision)/100 into com from play_series where id =1;  /*getting commission*/
              return com;
            END ;
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS terminal_total_sale_by_date;
            CREATE FUNCTION `terminal_total_sale_by_date`(`saleDate` DATE, `termId` VARCHAR(20)) RETURNS float
            DETERMINISTIC
            BEGIN
            declare x float;
            select sum(total_sale) into x from
            (select play_details.play_series_id,sum(play_details.game_value)* max(play_series.mrp) as total_sale
            from play_details inner join
            (select * from play_masters where terminal_id=termId and date(created_at)=saleDate)play_masters
            ON play_masters.id = play_details.play_master_id
            inner join play_series ON play_series.id = play_details.play_series_id
            group by play_details.play_series_id) as table1;
            return x;
            END ;
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS get_total_prize_value_by_date;
            CREATE FUNCTION `get_total_prize_value_by_date`(`play_date` DATE, `term_id` VARCHAR(20)) RETURNS double
            DETERMINISTIC
            BEGIN
                DECLARE total_prize_value DOUBLE;
              select
              sum(get_prize_value_of_barcode(barcode_number)) into total_prize_value
              from play_masters
              where date(created_at)=play_date and terminal_id=term_id and is_claimed=1;

              IF total_prize_value IS NOT NULL THEN
                RETURN total_prize_value;
              ELSE
                RETURN 0;
              END IF;
            END ;
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS terminal_net_payable_by_sale_date;
            CREATE FUNCTION `terminal_net_payable_by_sale_date`(`sale_date` DATE, `terminal_id` VARCHAR(20)) RETURNS double
            DETERMINISTIC
            BEGIN
                declare total DOUBLE;
              declare win_amt DOUBLE;
              declare net_payable DOUBLE;
              declare commission DOUBLE;

              select terminal_total_sale_by_date(sale_date,terminal_id) into total;
              /*end of getting total sale*/

              select get_total_prize_value_by_date(sale_date,terminal_id) into win_amt;    /*getting prize_value by date*/
                select terminal_commission_by_sale_date(sale_date,terminal_id) into commission;    /*getting commission by date*/

              select total-win_amt-commission into net_payable;          /*get net payable to stockist by terminal*/
              return net_payable;

            END ;
        ');
    }

    public function down()
    {
        Schema::dropIfExists('all_procedures_and_functions');
    }
}
