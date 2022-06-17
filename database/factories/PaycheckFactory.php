<?php

namespace Database\Factories;

use Budget\Models\BudgetMonth;
use Budget\Models\Paycheck;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaycheckFactory extends Factory
{
    protected $model = Paycheck::class;

    public function definition(): array
    {
        return [
            'budget_month_id' => BudgetMonth::factory(),
            'amount' => rand(2000, 6000),
            'payday' => now()->subWeek(),
        ];
    }
}
