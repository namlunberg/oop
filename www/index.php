<?php
header('content-type: text/plain');

use src\classes\Car;
use src\classes\Tv;
use src\classes\Pen;
use src\classes\Product;
use src\classes\Basket;
use src\classes\Order;

require $_SERVER['DOCUMENT_ROOT'] . "/autoload.php";


$volvo = new Car(2, 190);
$volvo->calcPrice();
$volvo->setName("xc60");

$toyota = new Car(2.5, 181);
$toyota->calcPrice();
$toyota->setName("camry");

$POLARLINE = new TV(32);
$POLARLINE->calcPrice();
$POLARLINE->setName("32PL13TC");

$Xiaomi = new TV(43, 4000);
$Xiaomi->calcPrice();
$Xiaomi->setName("TV A2 43");

$pen1 = new Pen(12);
$pen1->calcPrice();
$pen1->setName("pen1");

$pen2 = new Pen(15, FALSE);
$pen2->calcPrice();
$pen2->setName("pen2");

$basket = new Basket();
$basket->addProducts([$Xiaomi, $toyota, $volvo, $pen2, $volvo, $Xiaomi, $Xiaomi]);

var_export($basket->getProductsCount());
echo PHP_EOL;
var_export($basket->getProducts());
echo PHP_EOL;
var_export($basket->getSingleProductCount($pen2->getName()));

echo PHP_EOL;

try {
    $order = new Order($basket);

    $count = $order->orderCount();
    echo "в корзине $count заказов";
    
    echo PHP_EOL;
    
    $summ = $order->orderSum();
    echo "сумма заказа составляет $summ денег";
} catch(\Exception $e) {
    echo "Message: {$e->getMessage()}" . PHP_EOL . " 
    Code: {$e->getCode()}" . PHP_EOL . "
    File: {$e->getFile()}" . PHP_EOL . "
    Line: {$e->getLine()}";
}
