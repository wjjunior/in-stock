<?php


namespace App\Clients;


class StockStatus
{
    public $available;
    public $price;

    /**
     * StockStatus constructor.
     *
     * @param $available
     * @param $price
     */
    public function __construct($available, $price)
    {
        $this->available = $available;
        $this->price = $price;
    }


}
