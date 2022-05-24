<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetMonthsTable extends Migration
{
    public function up()
    {
        Schema::create('budget_months', function (Blueprint $table) {
            $table->id();
            $table->date('month');
            $table->integer('planned_income');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }
}
