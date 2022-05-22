<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('budget_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('budget_month_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('budget_categories');
    }
}
