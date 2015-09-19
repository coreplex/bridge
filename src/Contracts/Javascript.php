<?php

namespace Coreplex\Bridge\Contracts;

interface Javascript
{
    /**
     * Shares data with the view.
     *
     * @param  mixed        $key
     * @param  array|string $data
     * @return $this
     */
    public function share($key, $data);

    /**
     * Renders the shared data from the array
     *
     * @return void
     */
    public function renderSharedData();
}