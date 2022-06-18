<?php

namespace Tests\Feature\Domain\Budget\Collections;

use Budget\Collections\BudgetTransactionCollection;
use Budget\Models\BudgetTransaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetTransactionCollectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function it_returns_an_instance_of_budget_transaction_collection()
    {
        $this->assertInstanceOf(BudgetTransactionCollection::class, BudgetTransaction::all());
    }

    /** @test * */
    public function it_can_include_the_amount_in_dollars()
    {
        BudgetTransaction::factory()->state(['amount' => 500])->create();

        $budget = BudgetTransaction::all()->withAmountInDollars()->first();
        $this->assertEquals('$5.00', $budget->amount_in_dollars);
    }
}
