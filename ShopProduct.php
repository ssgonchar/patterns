<?php

/**
 * Created by PhpStorm.
 * User: Чудо
 * Date: 23.07.2015
 * Time: 23:12
 */
class ShopProduct
{
    public $title = 'Стандартный товар';
    public $producerMainName = 'Фамилия автора';
    public $producerFirstName = 'Имя автора';
    public $price = 0;

    function __construct($title,
                         $firstName, $mainName, $price) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    function getProducer() {
        return "{$this->producerFirstName} "
        . "{$this->producerMainName}";
    }
}

$product1 = new ShopProduct('Собачье сердце',
                            'Михаил', 'Булгаков', 5.99);

print "Автор: {$product1->getProducer()}\n";