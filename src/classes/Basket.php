<?php
namespace src\classes;

use Exception;

class Basket 
{
    private array $products=[];
    private array $productsCount=[];

    public function addProduct(Product $product)
    {
        $name = $product->getName();
        if (isset($this->productsCount[$name])) {
            $this->productsCount[$name]++;
        } else {
            $this->products[] = $product;
            $this->productsCount[$name] = 1;
        }
        
    }

    public function getProductsCount():array 
    {
        if (empty($this->productsCount)) {
            throw new Exception('Карзина пуста!');
        }
        
        return $this->productsCount;
    }

    public function getSingleProductCount(string $name):int
    {
        $products = $this->getProductsCount();
        $result = $products[$name];
        return $result;
    }

    public function getTotalProductsCount():int 
    {
        $result = $this->getProductsCount();
        $result = array_sum($result);
        return $result;
    }

    public function addProducts(array $products)
    {
        foreach ($products as $product) {
            if (!$product instanceof Product) {
                continue;
            }
            $this->addProduct($product);
        }
    }

    public function getProducts() {
        if (empty($this->products)) {
            throw new Exception('Карзина пуста!');
        }

        return $this->products;
    }

    public function priceSumm()
    {
        $summ = 0;
        $products = $this->getProducts();
        foreach ($products as $product) {
            $singleCount = $this->getSingleProductCount($product->getName());
            $summ += ($product->getPrice() * $singleCount);
        }
        return $summ;
    }

    public function getProduct(string $name):Product|NULL
    {
        $result = NULL;
        foreach ($this->products as $product)
        {
            if ($product->getName() === $name)
            {
                $result = $product;
                break;
            }
        }
        return $result;
    }

    public function deleteProduct(Product $product):void
    {   
        $name = $product->getName();
        
        foreach ($this->products as $key => $item) {
            if ($item === $product) {
                if ($this->productsCount[$name] > 1){
                    $this->productsCount[$name]--;
                } else {
                    unset($this->productsCount[$name]);
                    unset($this->products[$key]);
                    break;
                }
            }
        }
    }
}