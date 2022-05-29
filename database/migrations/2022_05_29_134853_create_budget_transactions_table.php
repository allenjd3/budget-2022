<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('budget_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('amount');
            $table->foreignId('budget_month_id')->constrained();
            $table->unsignedBigInteger('budget_item_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('budget_transactions');
    }
}
