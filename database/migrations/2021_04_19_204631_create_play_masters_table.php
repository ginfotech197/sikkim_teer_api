<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('play_masters', function (Blueprint $table) {
            $table->id();
            $table->string('barcode_number',50);
            $table->tinyInteger('is_claimed')->default(0);
            $table->string('activity_done_by')->default('self');


            $table->bigInteger('terminal_id')->unsigned()->nullable(false);
            $table ->foreign('terminal_id')->references('id')->on('users');

            $table->string('slip_no',50);


            $table->bigInteger('draw_master_id')->unsigned()->nullable(false);
            $table ->foreign('draw_master_id')->references('id')->on('draw_masters');

            $table->tinyInteger('is_cancelled')->default(0);

            $table->tinyInteger('is_cancelable')->default(1);

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
        Schema::dropIfExists('play_masters');
    }
}
