<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->decimal('salary');
            $table->decimal('bon_overtime');
            $table->decimal('bon_holiday');
            $table->decimal('bon_night_diff');
            $table->decimal('ded_sss');
            $table->decimal('ded_pagibig');
            $table->decimal('ded_philhealth');
            $table->decimal('ded_absences');
            $table->decimal('ded_lates');
            $table->decimal('ded_tax');
            $table->date('date_paid');
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
        Schema::dropIfExists('payrolls');
    }
}
