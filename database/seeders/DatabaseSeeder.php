<?php

namespace Database\Seeders;

use Authentication\Models\User;
use Budget\Models\BudgetCategory;
use Budget\Models\BudgetItem;
use Budget\Models\BudgetMonth;
use Budget\Models\BudgetTransaction;
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

         BudgetMonth::factory()
             ->state(['user_id' => $user->id])
             ->has(
                 BudgetCategory::factory()
                     ->has(
                         BudgetItem::factory()->has(BudgetTransaction::factory()->state(['budget_month_id' => 1])->count(5), 'transactions')->count(3),
                         'items'
                     )
                     ->count(5),
                 'categories'
             )
             ->create();
    }
}
