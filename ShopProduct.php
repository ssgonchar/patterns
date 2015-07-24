<?php

/**
 * Created by PhpStorm.
 * User: Чудо
 * Date: 23.07.2015
 * Time: 23:12
 */
class ShopProduct
{
    public $numPages;
    public $playLength;
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    function __construct($title,
                         $firstName, $mainName, $price,
                         $numPages = 0, $playLength = 0) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
        $this->numPages = $numPages;
        $this->playLength = $playLength;
    }

    function getProducer() {
        return "{$this->producerFirstName} "
        . "{$this->producerMainName}";
    }

    function getSummaryLine() {
        $base = "$this->title ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";

        return $base;
    }
}

class CDProduct extends ShopProduct{
    function getPlayLength() {
        return $this->playLength;
    }

    function getSummaryLine(){
        $base = "$this->title ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": Время звучания - {$this->playLength} ";

        return $base;
    }
}

class BookProduct extends ShopProduct {
    function getNumberOfPages(){
        return $this->numPages;
    }

    function getSummaryLine(){
        $base = "$this->title ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": {$this->numPages} стр.";

        return $base;
    }
}

class ShopProductWriter
{
    public function write(ShopProduct $shopProduct) {
        $str = "{$shopProduct->title}: "
            . $shopProduct->getProducer()
            . " ({$shopProduct->price})\n";

        print $str;
    }
}

$product1 = new ShopProduct('Собачье сердце',
    'Михаил', 'Булгаков', 5.99);
$writer = new ShopProductWriter();
$writer->write($product1);

//print "Автор: {$product1->getProducer()}\n";