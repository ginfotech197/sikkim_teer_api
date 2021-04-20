<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualResultDigitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_result_digits', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('play_series_id')->unsigned();
            $table ->foreign('play_series_id')->references('id')->on('play_series');

            $table->bigInteger('draw_master_id')->unsigned();
            $table ->foreign('draw_master_id')->references('id')->on('draw_masters');
            $table->integer('result')->nullable(false);

            $table->date('game_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manual_result_digits');
    }
}
