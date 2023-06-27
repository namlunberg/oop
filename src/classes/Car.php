<?php
namespace src\classes;
use src\interfaces\Price;

class Car extends Product implements Price
{
    private float $capacity;
    private int $power;

    public function __construct(float $capacity, int $power)
    {
        $this->capacity=$capacity;
        $this->power=$power;
    }

    public function calcPrice(): float
    {
        $this->price = $this->capacity * $this->power;
        return $this->price;
    }
}