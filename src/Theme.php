<?php

/*
 * This file is part of the trendsoft/themes.
 * (c) jabber <2898117012@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Themes;

class Theme
{
    protected $config;
    protected $current;
    protected $themes = [];

    /**
     * Theme constructor.
     *
     * @param array $config
     */
    public function __construct( $config = [] )
    {
        $this->config = $config;
        $this->parseConfig( $config );
    }

    /**
     * Set Config.
     *
     * @param $config
     */
    public function setConfig( $config )
    {
        $this->config = $config;
        $this->parseConfig( $config );
    }

    /**
     * Initial Loading Themes.
     *
     * @param $path
     */
    public function loadThemes( $path )
    {
        $this->themes = [];
        $dirs         = scandir( $path );
        foreach ( $dirs as $file ) {
            if ( is_dir( $path . '/' . $file ) && file_exists( $path . '/' . $file . '/theme.json' ) ) {
                $theme                          = json_decode( file_get_contents( $path . '/' . $file . '/theme.json' ), true );
                $this->themes[ $theme['slug'] ] = $theme;
            }
        }
    }

    /**
     * Get all themes in theme catalog.
     *
     * @return array
     */
    public function all()
    {
        return $this->themes;
    }

    /**
     * Get Current Theme slug.
     *
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Get Current Theme.
     *
     * @return mixed
     */
    public function getCurrentTheme()
    {
        return $this->themes[ $this->current ];
    }

    /**
     * Set Current Theme.
     *
     * @param string $theme
     */
    public function setCurrent( $theme )
    {
        $this->current = $theme;
    }

    /**
     * Active Theme.
     *
     * @param string $theme
     */
    public function active( $theme = '' )
    {
        $this->setCurrent( $theme );
    }

    /**
     * Get Theme Relative Asset.
     *
     * @param string $asset
     *
     * @return string
     */
    public function asset( $asset )
    {
        return $this->path( "assets/$asset" );
    }

    /**
     * Theme Is Current.
     *
     * @param string $theme
     *
     * @return bool
     */
    public function isCurrent( $theme )
    {
        return $theme === $this->current;
    }

    /**
     * Get Theme Absolute Path.
     *
     * @param string $theme
     *
     * @return string
     */
    public function absolutePath( $theme = null )
    {
        if ( is_null( $theme ) ) {
            $theme = $this->getCurrent();
        }

        return $this->config['paths']['absolute'] . '/' . $theme;
    }

    /**
     * Get Theme File Path.
     *
     * @param string $file
     * @param string $theme
     *
     * @return string
     */
    public function path( $file, $theme = null )
    {
        if ( is_null( $theme ) ) {
            $theme = $this->getCurrent();
        }

        return $this->config['paths']['base'] . "/$theme/$file";
    }

    /**
     * Parse Config to Object.
     *
     * @param $config
     */
    protected function parseConfig( $config )
    {
        if ( key_exists( 'paths', $config ) && key_exists( 'absolute', $config['paths'] ) ) {
            $this->loadThemes( $config['paths']['absolute'] );
        }
        if ( key_exists( 'active', $config ) ) {
            $this->setCurrent( $config['active'] );
        }
    }
}
