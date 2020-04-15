<?php

use g4m\Libs\Dispatch;
use g4m\Classes\Couriers\DHL;
use g4m\Classes\Consignment;

/**
 * Load in our composer dependencies
 */
require __DIR__.'/../vendor/autoload.php';

/** 
 * We're going to keep this simple
 * and just load our dispatch class,
 * normally we would bind it to a 
 * service container within a larger
 * framework.
 */
$batch = new Dispatch();
$batch->start();

// Stub some Orders
for($i = 0; $i < 5; $i++)
{
    $order[$i] = new Consignment(
        ['id' => $i],
        new DHL()
    );

    $order[$i]->courier->generateConsignmentNumber();
    $batch->addConsignment($order[$i]);
}

$batch->end()->dispatchToCouriers();
