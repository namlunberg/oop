<?php
namespace src\classes;
use src\interfaces\Price;

class TV extends Product implements Price
{
    private float $diagonal;
    private int $resolution;

    public function __construct(float $diagonal, int $resolution=2000)
    {
        $this->diagonal=$diagonal;
        $this->resolution=$resolution;
    }

    public function calcPrice(): float
    {
        $this->price = ($this->diagonal * $this->resolution)/1000;
        return $this->price;
    }
}