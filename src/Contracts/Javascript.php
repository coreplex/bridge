<?php

namespace Coreplex\Bridge\Contracts;

interface Javascript
{
    /**
     * Shares data with the view.
     *
     * @param  array|string $key
     * @param  mixed|null   $data
     * @return $this
     */
    public function share($key, $data = null);

    /**
     * Renders the shared data from the array
     *
     * @return void
     */
    public function renderSharedData();
}