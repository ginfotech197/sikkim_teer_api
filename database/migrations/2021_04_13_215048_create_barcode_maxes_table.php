<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarcodeMaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcode_maxes', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name',50)->unique()->nullable(false);
            $table->integer('current_value')->nullable(false);
            $table->string('prefix',10)->nullable(true);
            $table->string('suffix',10)->nullable(true);
            $table->smallInteger('financial_year');
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
        Schema::dropIfExists('barcode_maxes');
    }
}
