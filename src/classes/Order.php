<?php
namespace src\classes;

class Order {
    private Basket $basket;

    public function __construct(Basket $basket)
    {
       $this->basket = $basket;
    }

    public function orderCount()
    {   
        $result = $this->basket->getTotalProductsCount();
        return $result;
    }

    public function orderSum(): float
    {
        $result = $this->basket->priceSumm();
        return $result;
    }
}