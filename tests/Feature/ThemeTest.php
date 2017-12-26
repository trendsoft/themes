<?php

/*
 * This file is part of the trendsoft/themes.
 * (c) jabber <2898117012@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tests\Feature;

use Tests\TestCase;
use Themes\Theme;

class ThemeTest extends TestCase
{
    /**
     * @dataProvider configProvider
     */
    public function testSetTheme($config)
    {
        $theme = new Theme($config);
        $theme->setCurrent('default');
        $this->assertSame('default', $theme->getCurrent());
    }

    /**
     * @dataProvider configProvider
     */
    public function testActiveTheme($config)
    {
        $theme = new Theme($config);
        $theme->active('default');
        $this->assertSame('default', $theme->getCurrent());
    }
}
