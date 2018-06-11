<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolFeeReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_fee_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('invoice_id')->unique()->index()->unsigned();
            $table->integer('order_id')->unique()->index()->unsigned();
            $table->string('payment_type');
            $table->string('payment_hash')->unique();
            $table->string('description');
            $table->string('transaction_date');
            $table->string('payment_method');
            $table->string('status');
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
        Schema::drop('school_fee_receipts');
    }
}
