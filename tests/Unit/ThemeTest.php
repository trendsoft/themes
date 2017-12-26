<?php

/*
 * This file is part of the trendsoft/themes.
 * (c) jabber <2898117012@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tests\Unit;

use Tests\TestCase;
use Themes\Theme;

class ThemeTest extends TestCase
{
    /**
     * @dataProvider configProvider
     */
    public function testGetAllThemes($config)
    {
        $theme = new Theme($config);
        $this->assertArrayHasKey('default', $theme->all());
    }

    /**
     * @dataProvider configProvider
     */
    public function testCurrent($config)
    {
        $theme = new Theme($config);
        $this->assertSame('default', $theme->getCurrent());
    }

    /**
     * @dataProvider configProvider
     */
    public function testCurrentTheme($config)
    {
        $theme = new Theme($config);
        $this->assertSame('default', $theme->getCurrentTheme()['slug']);
    }

    /**
     * @dataProvider configProvider
     */
    public function testIsCurrent($config)
    {
        $theme = new Theme($config);
        $this->assertTrue($theme->isCurrent('default'));
    }

    /**
     * @dataProvider configProvider
     */
    public function testAsset($config)
    {
        $theme = new Theme($config);
        $this->assertSame('themes/default/assets/bs', $theme->asset('bs'));
    }

    /**
     * @dataProvider configProvider
     */
    public function testAbsolutePath($config)
    {
        $theme = new Theme($config);
        $this->assertSame($this->getAbsolute().'/default', $theme->absolutePath());
    }

    /**
     * @dataProvider configProvider
     */
    public function testPath($config)
    {
        $theme = new Theme($config);
        $this->assertSame('themes/vue/assets/app.js', $theme->path('assets/app.js', 'vue'));
    }

    /**
     * @dataProvider configProvider
     */
    public function testSetConfig($config)
    {
        $theme = new Theme($config);
        $config['active'] = 'vue';
        $theme->setConfig($config);
        $this->assertSame('vue', $theme->getCurrent());
    }

    /**
     * @dataProvider configProvider
     */
    public function testLoadThemes($config)
    {
        $theme = new Theme($config);
        $this->assertSame(3, count($theme->all()));
    }
}
