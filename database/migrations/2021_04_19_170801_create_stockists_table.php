<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockists', function (Blueprint $table) {
            $table->id();
            $table->string('stockist_unique_id',50)->unique();
            $table->string('uuid',250)->nullable(true);
            $table->string('stockist_name','100');
            $table->string('user_id','255')->unique();
            $table->string('user_password','255');
            $table->integer('serial_number');
            $table->double('current_balance')->default(0);

            $table->bigInteger('user_type_id')->unsigned();
            $table ->foreign('user_type_id')->references('id')->on('user_types');
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
        Schema::dropIfExists('stockists');
    }
}
