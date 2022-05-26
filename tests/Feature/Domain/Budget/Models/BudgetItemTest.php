<?php

namespace Tests\Feature\Domain\Budget\Models;

use Budget\Actions\ConvertIntegerToDollarsAction;
use Budget\Models\BudgetItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function it_includes_planned_amount_in_dollars()
    {
        $item = BudgetItem::factory()->create();
        $this->assertEquals(
            (new ConvertIntegerToDollarsAction($item->planned_amount))->execute(),
            BudgetItem::whereId($item->id)
                ->get()
                ->withPlannedAmountInDollars()
                ->first()
                ->planned_in_dollars
        );
    }
}
