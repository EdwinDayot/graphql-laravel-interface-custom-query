<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistic_b_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('some_other_statistic');
            $table->unsignedBigInteger('morph_model_b_id');
            $table->timestamps();

            $table->foreign('morph_model_b_id')
                ->references('id')
                ->on('morph_model_b_s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistic_b_s');
    }
}
