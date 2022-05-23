<?php

namespace Database\Factories;

use Budget\Models\BudgetCategory;
use Budget\Models\BudgetItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetItemFactory extends Factory
{
    protected $model = BudgetItem::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'planned_amount' => rand(0, 5000),
            'budget_category_id' => BudgetCategory::factory(),
        ];
    }
}
