<?php
namespace src\classes;

class Product
{
    protected ?float $price = null;
    protected string $name;

    public function setName(string $name): self
    {
        $this->name= $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }
}