<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function getAbsolute()
    {
        return dirname( __FILE__ ) . '/themes';
    }

    public function configProvider()
    {
        return [
            [
                [
                    'active' => 'default',
                    'paths'  => [ 'absolute' => $this->getAbsolute(), 'base' => 'themes', 'assets' => 'assets' ]
                ]
            ]
        ];
    }
}
