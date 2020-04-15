<?php

namespace g4m\Classes\Couriers;

use g4m\Libs\Courier;
use g4m\Libs\Consignment;
use g4m\Interfaces\CourierInterface;

Class DHL extends Courier implements CourierInterface 
{
    protected $consignmentNumber,
        $orderInfo;
    public $options = [];

    /**
     * Initialise our DHL courier class and set the properties up
     *
     * @param string $name Name of courier
     */
    public function __construct()
    {
        $this->setCourierName('DHL');
        $this->setPostMethod('email');
    }

    /**
     * Generate consignment number with algorithm provided by courier company
     *
     * @return self
     */
    public function generateConsignmentNumber():self
    {
        $this->consignmentNumber = uniqid();
        return $this;
    }

    /**
     * getter for consignmnt number
     *
     * @return string our generated consignment number
     */
    public function getConsignmentNumber():string
    {
        return $this->consignmentNumber;
    }
}

