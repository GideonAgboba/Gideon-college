<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFullTimeQulificationResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_time_qulification_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->nullable();
            $table->string('examination_number');
            $table->string('subject1');
            $table->string('grade1');
            $table->string('subject2');
            $table->string('grade2');
            $table->string('subject3');
            $table->string('grade3');
            $table->string('subject4');
            $table->string('grade4');
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
        Schema::drop('full_time_qulification_results');
    }
}
