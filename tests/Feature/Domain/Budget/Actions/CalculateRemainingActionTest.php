<?php

namespace Tests\Feature\Domain\Budget\Actions;

use Budget\Actions\CalculateRemainingAction;
use Tests\TestCase;

class CalculateRemainingActionTest extends TestCase
{
    /** @test * */
    public function it_can_calculate_remainder()
    {
        $firstAmount = 1000;
        $secondAmount = 500;

        $this->assertEquals(500, (new CalculateRemainingAction($firstAmount, $secondAmount))->execute());
    }

    /** @test * */
    public function it_returns_a_formatted_string_when_cast()
    {
        $firstAmount = 1000;
        $secondAmount = 500;

        $this->assertEquals('$5.00', (string) (new CalculateRemainingAction($firstAmount, $secondAmount)));
    }
}
