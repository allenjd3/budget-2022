<?php

namespace Database\Seeders;

use Authentication\Models\User;
use Budget\Models\BudgetMonth;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $user = User::factory()->create([
             'name' => 'James Allen',
             'email' => 'jacques2186@yahoo.com',
         ]);

         $user->budgetMonths()->create(BudgetMonth::factory()->make()->toArray());
    }
}
