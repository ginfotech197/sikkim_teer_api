<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaxTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('max_tables', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name',50)->unique()->nullable(false);
            $table->bigInteger('current_value')->default(0);
            $table->string('prefix',10)->nullable(true);
            $table->string('suffix',10)->nullable(true);
            $table->smallInteger('financial_year');

            $table->bigInteger('user_type_id')->unsigned()->nullable(false);
            $table ->foreign('user_type_id')->references('id')->on('user_types');
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
        Schema::dropIfExists('max_tables');
    }
}
