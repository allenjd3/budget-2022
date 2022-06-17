<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaychecksTable extends Migration
{
    public function up()
    {
        Schema::create('paychecks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_month_id')->constrained();
            $table->integer('amount');
            $table->dateTime('payday');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paychecks');
    }
}
