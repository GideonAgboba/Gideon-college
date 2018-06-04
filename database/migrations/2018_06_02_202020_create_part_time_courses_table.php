<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartTimeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_time_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('part_time_department_id')->unsigned()->index();
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
        Schema::drop('part_time_courses');
    }
}
