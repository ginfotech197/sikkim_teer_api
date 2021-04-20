<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_details', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('game_id')->unsigned()->nullable(false);
            $table->foreign('game_id')->references('id')->on('games');

            $table->bigInteger('play_master_id')->unsigned();
            $table ->foreign('play_master_id')->references('id')->on('play_masters');

            $table->bigInteger('terminal_id')->unsigned()->nullable(false);
            $table ->foreign('terminal_id')->references('id')->on('users');

            $table->double('prize_value')->default(0);

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
        Schema::dropIfExists('claim_details');
    }
}
