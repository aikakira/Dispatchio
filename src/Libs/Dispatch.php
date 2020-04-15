<?php

namespace g4m\Libs;

use g4m\Libs\Courier;
use g4m\Libs\Notification;
use g4m\Classes\Consignment;
/**
 * This is our main Dispatch class!
 *
 * @author Gee-Him Siu
 */
Class Dispatch 
{
    private $status,
        $list,
        $date_added,
        $date_started,
        $data_ended;
    
    /**
     * Dispatch class constructor, you'll 
     * need to pass through a database model
     * with the relevant entry
     *
     * @param DispatchModel $entry
     * @return void
     */
    public function __construct()
    {
        $this->start();
    }

    /**
     * Start the batch process for today,
     *
     */
    public function start():self
    {
        $this->status = 'STARTED';
        return $this;
    }

    /**
     * Add new orders to the Dispatch list
     *
     * @param Consignment $order The order object
     * @return self
     */
    public function addConsignment(Consignment $order):self
    {
        if(!$this->checkStatus())
        {
            throw new \Exception('The batch has ended!');
        }

        // This is just so we can see something on screen
        echo "Order added - Consignmnet number: " 
            . $order->courier->getConsignmentNumber() . '<br/>';

        $this->list[$order->getCourierName][] = $order;
        return $this;
    }

    /**
     * Get full list of current orders
     *
     * @return $array all orders
     */

    /**
     * End of dispatch period
     *
     * @return self
     */
    public function end():self
    {
        $this->status = 'ENDED';
        $this->dispatchToCouriers();
        
        return $this;
    }

    /**
     * Dispatch each set of couriers orders to each of them with our
     * notitication class
     *
     * @return void
     */
    private function dispatchToCouriers():void
    {
        foreach($this->list as $courier) 
        {
            new Notification($courier);
        }
    }

    /**
     * Check status to make sure you can add new consignments
     *
     * return bool $status
     */
    private function checkStatus():bool
    {
        return ($this->status === 'STARTED') ? true : false;
    }
}
