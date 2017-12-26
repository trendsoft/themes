<?php

/*
 * This file is part of the trendsoft/themes.
 * (c) jabber <2898117012@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function getAbsolute()
    {
        return dirname(__FILE__).'/themes';
    }

    public function configProvider()
    {
        return [
            [
                [
                    'active' => 'default',
                    'paths' => ['absolute' => $this->getAbsolute(), 'base' => 'themes', 'assets' => 'assets'],
                ],
            ],
        ];
    }
}
