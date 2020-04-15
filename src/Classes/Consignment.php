<?php

namespace g4m\Classes;

use g4m\Libs\Courier;

/**
 * Our consignment should be the order object,
 * It should contain all the details of the package i.e. address, contact etc
 */
Class Consignment 
{
    protected $orderInfo;
    public $courier;

    public function __construct($orderInfo, Courier $courier)
    {
        $this->orderInfo = $orderInfo;
        $this->courier = $courier;
    }
}
