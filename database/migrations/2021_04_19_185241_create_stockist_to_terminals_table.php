<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockistToTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockist_to_terminals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stockist_id')->unsigned();
            $table ->foreign('stockist_id')->references('id')->on('stockists');

            $table->bigInteger('terminal_id')->unsigned();
            $table ->foreign('terminal_id')->references('id')->on('users');

            $table->double('current_balance')->default(0);

            $table->tinyInteger('inforce')->default(1);
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
        Schema::dropIfExists('stockist_to_terminals');
    }
}
