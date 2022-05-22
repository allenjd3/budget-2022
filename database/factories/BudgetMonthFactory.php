<?php

namespace Database\Factories;

use Authentication\Models\User;
use Budget\Models\BudgetMonth;
use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetMonthFactory extends Factory
{
    protected $model = BudgetMonth::class;

    public function definition(): array
    {
        return [
            'month' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'user_id' => User::factory(),
        ];
    }
}
