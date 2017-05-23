<?php

namespace Xcms\Plugin\Facades;

use Illuminate\Support\Facades\Facade;
use Xcms\Plugin\Support\Plugin;

class PluginFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Plugin::class;
    }
}
