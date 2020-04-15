<?php

namespace g4m\Libs;

/**
 * Our notification class is used for deploying all data to the respective
 * couriers
 */
Class Notification {
    protected $list;

    /**
     * setup list of orders that need to be sent
     *
     * @param array $list our batch list
     * $param array $options set different options i.e. all consignments in 
     * collated list or single file tec
     */
    public function __construct(array $list, array $options = [])
    {
        $this->list = $list;

        // This is just for seeing everything on screen
        $this->processList();
    }

    /**
     * Send emails out to each courier
     */
    public function sendEmails() 
    {

    }

    /** 
     * upload files to courier
     */
    public function uploadSFTP()
    {

    }

    private function processList()
    {
        foreach($this->list as $order)
        {
            echo $order->courier->getConsignmentNumber() 
                . "Has been processed<br/>";
        }
    }
}
