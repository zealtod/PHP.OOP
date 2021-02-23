<?php

abstract class AbstractGoods{
        
        protected $category;
        
        protected function __construct($category) {
            $this->category =   $category;
        }
    
        abstract protected function getCategory();
        abstract protected function getPrice();
        abstract protected function getTotalPrice();
        abstract protected function getProfit();
    }
    
    class PackagedGoods extends AbstractGoods {	
        
        protected $artNumber;
        protected $name;
        public $sellPrice;
        protected $purchasePrice;
        protected $discount;
                
        function __construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount) {
            parent::__construct($category);
            $this->artNumber =      $artNum;
            $this->name =           $name;
            $this->purchasePrice =  $purchasePrice;
            $this->sellPrice =      $sellPrice;
            $this->discount =       $discount;
        }
        function getCategory() {
            return $this->category;
        }
        function getPrice() {
            return $this->price;
        }
        function getTotalPrice(){
            return $totalPrice = ( $this->sellPrice - $this->sellPrice * $this->discount / 100 );
        }
        function getProfit() {
            return $profit = ( $this->getTotalPrice() - $this->purchasePrice );
        }
        function getInfo() {
            $info  = "кат. {$this->category}; ";
            $info .= "арт. {$this->artNumber}; ";
            $info .= "наим. {$this->name}; ";
            $info .= "закуп. цена {$this->purchasePrice} руб.; ";
            $info .= "цена {$this->sellPrice} руб.; ";
            $info .= "скидка {$this->discount} %; ";
            $info .= "доход с продажи: {$this->getProfit()} руб.";
            $info .= "</br>";
            return $info;
        }
    }
    
    class Software extends PackagedGoods {
        function __construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount) {
            parent::__construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount);
        }
        function setSellPrice(){
            return $this->sellPrice = ( parent::sellPrice / 2 );
        }
    }
    
    class Goods extends PackagedGoods {
        protected $quantity;
        
        function __construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount, $quantity) {
            parent::__construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount);
            $this->quantity = $quantity;
        }
        function getTotalPrice(){
            return $this->totalPrice = $this->quantity * ( $this->sellPrice - $this->sellPrice * $this->discount / 100 );
        }
        function getProfit() {
            return $profit = ( $this->getTotalPrice() - $this->purchasePrice * $this->quantity );
        }
    }
    
    $fitosrbt = new PackagedGoods("Штучный", 1001, "Фитосорбовит", 100, 200, 10);
    $dietSoft = new Software ("Цифровой", 2001, "ПО Диета", 50, $fitosrbt->sellPrice / 2, 5);
    $tea = new Goods("На вес", 3001, "Чай", 2, 10, 0, 5);
    echo $fitosrbt->getInfo();
    echo $dietSoft->getInfo();
    echo $tea->getInfo();        