<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistic_a_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('some_statistic');
            $table->unsignedBigInteger('morph_model_a_id');
            $table->timestamps();

            $table->foreign('morph_model_a_id')
                ->references('id')
                ->on('morph_model_a_s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistic_a_s');
    }
}
