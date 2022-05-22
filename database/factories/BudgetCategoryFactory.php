<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PlannedBudget\Models\BudgetCategory;
use Support\Models\BudgetMonth;

class BudgetCategoryFactory extends Factory
{
    protected $model = BudgetCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'budget_month_id' => BudgetMonth::factory()->create(),
        ];
    }
}
