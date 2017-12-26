<?php

namespace Tests\Feature;

use Tests\TestCase;
use Themes\Theme;

class ThemeTest extends TestCase
{
    /**
     * @dataProvider configProvider
     */
    public function testSetTheme( $config )
    {
        $theme = new Theme( $config );
        $theme->setCurrent( 'default' );
        $this->assertEquals( 'default', $theme->getCurrent() );
    }

    /**
     * @dataProvider configProvider
     */
    public function testActiveTheme( $config )
    {
        $theme = new Theme( $config );
        $theme->active( 'default' );
        $this->assertEquals( 'default', $theme->getCurrent() );
    }
}
