<?php

namespace g4m\Libs;

/**
 * This is our base courier class, please extend as you see fit and implement 
 * the correct interfaces in your child classes
 */
Class Courier {
    protected $name,
        $consignmentNumber,
        $postMethod;

    /*
     * Set courier name
     *
     * @param string courier's name
     * @return void
     */
    public function setCourierName(string $name):void
    {
        $this->name = $name;
    }

    /**
     * Get name of courier
     *
     * @return string Name of Courier
     */
    public function getCourierName():string
    {
        return $this->name;
    }

    /**
     * Set how the courier would like the information sent to them
     *
     * @param string $method 
     * @return void
     */
    protected function setPostMethod(string $method):void
    {
        $this->postMethod = $method;
    }

    /**
     * Get saved method on how the courier would like the information
     *
     * @return string post method
     */
    protected function getPostMethod():string
    {
        return $this->postMethod;
    }
}
