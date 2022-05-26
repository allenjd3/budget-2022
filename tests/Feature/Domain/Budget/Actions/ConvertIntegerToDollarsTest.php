<?php

namespace Tests\Feature\Domain\Budget\Actions;

use Budget\Actions\ConvertIntegerToDollarsAction;
use Tests\TestCase;

class ConvertIntegerToDollarsTest extends TestCase
{
    /** @test * */
    public function it_converts_integer_to_dollars_for_display()
    {
        $integer = 4230;
        $this->assertEquals('$42.30', (new ConvertIntegerToDollarsAction($integer))->execute());
    }
}
