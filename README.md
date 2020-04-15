# Dispatch System (Dispatchio)

## Introduction

We need to build an order dispatch system, for sending out customer orders with one of a number of
different couriers.

At the start of a normal working day, a new batch will be started, and it will be closed at the end of the
day, when no more parcels are going to be shipped. This is called the dispatch period.

Each parcel sent out with a courier is called a consignment. Each consignment will be given a unique
number - each courier will supply an algorithm for generating their own format of consignment numbers.

At the end of each dispatch period, a list of all the consignment numbers needs to be sent to each
individual courier. The method of data transport varies from courier to courier (e.g. Royal Mail use email,
ANC use anonymous FTP).


## Problems to overcome

- Dispatch class needs to account for:
    - Multiple warehouses
    - Different start and end times per warehouse
    - Different location of warehouses i.e. Europe / Asia
    - Restrictions on consignment that can be added dependant on location (Exclusion list?)
    - Dispatch period can be automated / manual
    - Whether a consignment will be rejected due to expired dispatch period

- Consignment class needs to account for:
    - Courier maybe not be assigned straight away
    - Different algorithms required for each courier to generate Consignment number
    
- Couriers class needs to account for:
    - Collating that batches data
    - Different ways that each courier receives the consignment data


## Flow

These are simple thoughts that here for personal reference, if it makes sense to you as wel then great!

Dispatch->start();

$orderConsignment = new Consignment(Order $order);
orderConsignment->generateNumber(Courier $courier);

Dispatch->add(orderConsignment);

Dispatch->end();

## Requirements

PHP 7.3+
Composer
*MySQL / Postgres

## Project architecture
The Dispatch class is the heart of it all, Consignments should be part of a order class that's brought in by a seperate Order Class. Each consignment will then be set to instanstiatethe corresponsding courier child class.


## Installation & Running project

- Clone repo & cd into directory
- Run ```composer install``` 
- Start simple PHP server with:

```
php -s localhost:8000 -t public/
```
