<?php namespace Coreplex\Bridge\Contracts;

interface Javascript {

	/**
     * Shares data with the view
     * 
     * @param  mixed $key
     * @param  array $data
     * @return void
     */
    public function share($key, $data = false);

    /**
     * Renders the shared data from the array
     * 
     * @return void
     */
    public function renderSharedData();
    
}