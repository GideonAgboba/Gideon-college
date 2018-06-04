<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFullTimeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_time_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('full_time_department_id')->unsigned()->index();
            $table->string('course_code')->nullable();
            $table->string('course_title')->nullable();
            $table->string('course_unit')->nullable();
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
        Schema::drop('full_time_courses');
    }
}
