<?php

namespace Database\Factories;

use Budget\Models\BudgetMonth;
use Budget\Models\BudgetTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetTransactionFactory extends Factory
{
    protected $model = BudgetTransaction::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'amount' => rand(1, 20000),
            'budget_month_id' => BudgetMonth::factory(),
            'date_purchased' => now(),
            'budget_item_id' => null,
        ];
    }
}
