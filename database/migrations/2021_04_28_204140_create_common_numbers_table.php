<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCommonNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('house')->nullable(true);
            $table->integer('ending')->nullable(true);
            $table->integer('direct_one')->nullable(true);
            $table->integer('direct_two')->nullable(true);

            $table->bigInteger('draw_master_id')->unsigned();
            $table ->foreign('draw_master_id')->references('id')->on('draw_masters');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('common_numbers');
    }
}
