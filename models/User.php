<?php

include_once __DIR__ . '/Card.php';
include_once __DIR__ . '/Cart.php';

class User
{
    // Properties 

    public $id;
    public $first_name;
    public $last_name;
    public $cart;

    // Constructor

    public function __construct($first_name,$last_name)
    {
        $this->setId();
        $this->setFirstName($first_name);
        $this->setLastName($last_name);
        $this->setCart();
    }

    // Getter

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function getId()
    {
        return $this->id;
    }

    // Setter

    public function setFirstName($str)
    {
        if(is_numeric($str) || strlen($str) <= 0) return false;
        $this->first_name = $str;
        return true;
    }

    public function setLastName($str)
    {
        if(is_numeric($str) || strlen($str) <= 0) return false;
        $this->last_name = $str;
        return true;
    }

    public function setCart()
    {
        $this->cart = new Cart();
    }

    private function setId()
    {
        $this->id = uniqid();
    }

    // Methods

    public function addToCart($product)
    {
        $this->cart->addProduct($product);
    }

    public function removeToCart($product)
    {
        $this->cart->removeProduct($product);
    }

    public function placeOrder($card,$address)
    {
        if($this->cart->getTotalPrice() <= $card->getBalance()){
            $new_order = new Order($this->cart,$address,$this);
            $card->setBalance($card->getBalance() - $this->cart->getTotalPrice());
            $this->cart->setList();
            return $new_order;
        }
        return false;
    }
}

?>