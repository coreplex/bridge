<?php

namespace Coreplex\Bridge\Facades;

use Illuminate\Support\Facades\Facade;

class Javascript extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'coreplex.bridge.javascript';
    }
}