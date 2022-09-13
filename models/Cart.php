<?php

include_once __DIR__ . '/User.php';
include_once __DIR__ . '/Product.php';

class Cart
{
    // Propertiessss

    public $list = [];
    public $count = 0;
    public $total_price = 0;

    // Constructor

    public function __construct(){}

    // Getter

    public function getList()
    {
        return $this->list;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    // Setter

    public function setList()
    {
        $this->list = [];
        $this->total_price = 0;
        $this->count = 0;
    }

    // Methods

    public function addProduct($product)
    {
        if($product instanceof Product){
            array_push($this->list,$product);
            $this->count = $this->count + 1;
            $this->total_price = $this->total_price + $product->getPrice();
            return true;
        }
        return false;
    }

    public function removeProduct($product)
    {
        if($product instanceof Product && $this->getCount() > 0){
            $id = $product->getId();
            foreach($this->list as $key => $value){
                if($value->getId() === $id){
                    unset($this->list[$key]);
                    $this->total_price = $this->total_price - $value->getPrice();
                    return true;
                } 
            }
        }
        return false;
    }
}

?>