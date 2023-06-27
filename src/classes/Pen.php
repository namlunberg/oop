<?php
namespace src\classes;
use src\interfaces\Price;

class Pen extends Product implements Price
{
    private bool $feather;
    private int $long;

    public function __construct(int $long, bool $feather=TRUE)
    {
        $this->long=$long;
        $this->feather=$feather;
    }

    public function calcPrice(): float
    {
        $this->price = $this->long*(($this->feather==TRUE) ? 20 : 10); 
        return $this->price;
    }

}