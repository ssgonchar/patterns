<?php
/**
 * Created by PhpStorm.
 * User: Чудо
 * Date: 24.07.2015
 * Time: 8:32
 */
require 'ShopProduct.php';

class ShopProductTest extends PHPUnit_Framework_TestCase {
    public function testGetPrice(){
        $product1 = new ShopProduct('Мастер и маргарита','Михаил','Булгаков','10.20');
        $this->assertEquals(true, is_float($product1->getPrice()));
    }

    /**
     *
     */
    public function testWrite(){
        $product1 = new BookProduct('Мастер и маргарита','Михаил','Булгаков','10.20','600');
        $product2 = new CDProduct('Поворот','Андрей','Макаревич','25','90');
        $this->assertEquals(true, $product1 instanceof ShopProduct);
        $this->assertEquals(true, $product2 instanceof ShopProduct);
    }
}