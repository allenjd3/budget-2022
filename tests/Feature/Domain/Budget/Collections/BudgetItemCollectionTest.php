<?php

namespace Tests\Feature\Domain\Budget\Collections;

use Budget\Collections\BudgetItemCollection;
use Budget\Models\BudgetItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetItemCollectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function budget_items_return_new_budget_item_collection_instance()
    {
        $this->assertInstanceOf(BudgetItemCollection::class, BudgetItem::all());
    }

    /** @test * */
    public function includes_planned_in_dollars()
    {
        BudgetItem::factory()->state(['planned_amount' => 500])->create();

        $budget = BudgetItem::all();

        $budget->withPlannedAmountInDollars();
        $this->assertEquals('$5.00', (string) $budget->first()->planned_in_dollars);
    }

    /** @test * */
    public function includes_with_transaction_totals()
    {
        BudgetItem::factory()->state(['planned_amount' => 500])->create();

        $budget = BudgetItem::all();
        $budget->first()->transactions()->create([
            'name' => 'my transaction',
            'amount' => 200,
            'date_purchased' => now()->subDay(),
            'budget_month_id' => $budget->first()->category->month->id,
            'budget_item_id' => $budget->first()->id,
        ]);

        $budget->withTransactionTotals();

        $this->assertEquals('$3.00', (string) $budget->first()->transactions_remaining);
    }
}
