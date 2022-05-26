<?php

namespace Tests\Feature\Domain\Budget\Actions;

use Budget\Actions\ConvertDollarsToIntegerAction;
use Tests\TestCase;

class ConvertDollarsToIntegerTest extends TestCase
{
    /** @test * */
    public function it_converts_dollars_to_integer_for_database()
    {
        $money = "32.50";
        $this->assertEquals(3250, (new ConvertDollarsToIntegerAction($money))->execute());
    }
}
