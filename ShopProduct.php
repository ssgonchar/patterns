<?php

/**
 * Created by PhpStorm.
 * User: Чудо
 * Date: 23.07.2015
 * Time: 23:12
 */
class ShopProduct
{
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    function __construct($title, $firstName,
                         $mainName, $price) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
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

class CDProduct extends ShopProduct
{
    public $playLength;

    function __construct($title, $firstName,
                         $mainName, $price, $playLength) {
        parent::__construct($title, $firstName,
            $mainName, $price);
        $this->playLength = $playLength;
    }

    function getPlayLength() {
        return $this->playLength;
    }

    function getSummaryLine() {
        $base = parent::getSummaryLine();
        $base .= ": Время звучания - {$this->playLength} ";

        return $base;
    }
}

class BookProduct extends ShopProduct
{
    public $numPages;

    function __construct($title, $firstName,
                         $mainName, $price, $numPages) {
        parent::__construct($title, $firstName,
                            $mainName, $price);
        $this->numPages = $numPages;
    }

    function getNumberOfPages() {
        return $this->numPages;
    }

    function getSummaryLine() {
        $base = parent::getSummaryLine();
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