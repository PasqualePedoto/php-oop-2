<?php

include_once __DIR__ . '/User.php';
include_once __DIR__ . '/Cart.php';
include_once __DIR__ . '/Address.php';
include_once __DIR__ . '/RegisteredUser.php';

class Order
{
    // Properties

    protected $list;
    protected $total_price;
    protected $user;
    protected $address;
    protected $status = 'pending';

    // Constructor

    public function __construct($cart,$address,$user,$card)
    {
        if($cart instanceof Cart && $user instanceof User && $address instanceof Address){
            $this->setList($cart);
            $this->setUser($user);
            $this->setTotalPrice($cart,$user,$card);
            $this->setAddress($address);
        }
    }

    // Getter

    public function getList()
    {
        return $this->list;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getAddress()
    {
        return $this->address;
    }

    // Setter

    public function setList($cart)
    {
        if($cart instanceof Cart && count($cart->getList()) > 0){
            $this->list = $cart->getList();
            return true;
        }
        return false;
    }

    public function setTotalPrice($cart,$user,$card)
    {
        if($cart instanceof Cart && $cart->getTotalPrice() > 0){
            if($user instanceof RegisteredUser){
                $this->total_price = $cart->getTotalPrice() - ($cart->getTotalPrice()*20/100);
                $this->user->credit_card->setBalance($this->credit_card->getBalance() - $this->total_price);
            }else{
                $this->total_price = $cart->getTotalPrice();
                $card->setBalance($card->getBalance() - $this->total_price);
            }
            return true;
        }
        return false;
    }

    public function setUser($user)
    {
        if($user instanceof User){
            $this->user = $user;
            return true;
        }
        return false;
    }

    public function setAddress($address)
    {
        if($address instanceof Address){
            $this->address = $address;
            return true;
        }
        return false;
    }
}

?>