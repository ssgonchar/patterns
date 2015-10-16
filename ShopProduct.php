<?php

/**
 * Created by PhpStorm.
 * User: Чудо
 * Date: 23.07.2015
 * Time: 23:12
 */
class ShopProduct
{
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;
    private $discount;
    private $id;

    function __construct($title, $firstName,
                         $mainName, $price) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    function getProducerFirstName() {
        return $this->producerFirstName;
    }

    function getProducerMainName() {
        return $this->producerMainName;
    }

    function setDiscount($num) {
        $this->discount = $num;
    }

    function getDiscount() {
        return $this->discount;
    }

    function getTitle() {
        return $this->title;
    }

    function getPrice() {
        return ($this->price - $this->discount);
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

    function setId( $id ){
        $this->id = $id;
    }

    public static function getInstance($id, PDO $pdo){
        $stmt = $pdo->prepare("select * from products WHERE id = ?");
        $result = $stmt->execute(array($id));
        $row = $stmt->fetch();
        if(empty($row)) {return null;}
        if($row['type'] == "book"){
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['numpages']
            );
        } elseif($row['type'] == "cd") {
            $product = new CDProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['playlength']
            );
        } else {
            $product = new ShopProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price']
            );
        }
        $product->setId($row['id']);
        $product->setDiscount($row['discount']);
        return $product;
    }
}

class CDProduct extends ShopProduct
{
    private $playLength;

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
    private $numPages;

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

    function getPrice() {
        return $this->price;
    }
}

class ShopProductWriter
{
    private $products = array();

    public function addProduct(ShopProduct $shopProduct) {
        $this->products[] = $shopProduct;
    }

    /**
     *
     */
    public function write() {
        $str = "";

        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine();
        }

        print $str;
    }
}

$product1 = new BookProduct('Собачье сердце',
    'Михаил', 'Булгаков', 5.99, 600);

$product2 = new BookProduct('Паттерны проектирования',
    'Мэтт', 'Зандстра', 8.96, 528);

$writer = new ShopProductWriter();
$writer->addProduct($product1);
$writer->addProduct($product2);
$writer->write();
$dsn = "sqlite:patterns.db";
$pdo = new PDO($dsn,null,null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1,$pdo);
var_dump($obj);