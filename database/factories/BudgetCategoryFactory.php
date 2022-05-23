<?php

namespace Database\Factories;

use Budget\Models\BudgetCategory;
use Budget\Models\BudgetMonth;
use Illuminate\Database\Eloquent\Factories\Factory;

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
