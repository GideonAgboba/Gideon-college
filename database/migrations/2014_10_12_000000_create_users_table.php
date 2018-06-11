<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->default(2)->index();
            $table->integer('is_active')->default(0);
            $table->string('admission_payment_hash')->unique();
            $table->string('surname')->default('not available');
            $table->string('firstname')->default('not available');
            $table->string('othername')->default('not available');
            $table->string('matric')->default('not available');
            $table->string('programme_type')->default('not available');
            $table->string('session')->default('not available');
            $table->string('school')->default('not available');
            $table->string('department')->default('not available');
            $table->string('programme_mode')->default('not available');
            $table->string('level')->default('not available');
            $table->string('entry_year')->default('not available');
            $table->string('sex')->default('not available');
            $table->string('phone')->default('not available');
            $table->string('email')->default('not available')->unique();
            $table->string('password')->default('not available');
            $table->string('siemester')->default('not available');
            $table->string('date_of_birth')->default('not available');
            $table->string('place_of_birth')->default('not available');
            $table->string('state_of_origin')->default('not available');
            $table->string('local_government')->default('not available');
            $table->string('parent_name')->default('not available');
            $table->string('parent_address')->default('not available');
            $table->string('parent_phone')->default('not available');
            $table->string('payment_status')->default(0);
            $table->string('application_status')->default(0);
            $table->string('path')->default('student-1-512.png');
            $table->integer('addminsion_letter_id')->unsigned();
            $table->integer('docket_id')->unsigned();
            $table->integer('result_id')->unsigned();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
