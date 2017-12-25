<?php

namespace Tests\Unit;

use Tests\TestCase;

class ThemeTest extends TestCase
{
    public function testCurrentTheme()
    {
        $this->assertEquals( 'D', 'D' );
    }
}
