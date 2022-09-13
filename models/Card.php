<?php

class Card
{
    // Properties

    public $number_card;
    public $validity;
    public $cvc;
    public $balance = 0;

    // Constructor

    public function __construct($number_card,$validity,$cvc)
    {
        $this->setNumberCard($number_card);
        $this->setValidity($validity);
        $this->setCvc($cvc);
    }

    // Getter

    public function getNumberCard()
    {
        return $this->number_card;
    }

    public function getValidity()
    {
        return $this->validity;
    }

    public function getCvc()
    {
        return $this->cvc;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    // Setter

    public function setNumberCard($number_card)
    {
        if(strlen($number_card) != 16) return false;
        $this->number_card = $number_card;
        return true;
    }

    public function setValidity($validity)
    {
        if(strlen($validity) <= 0) return false;
        $this->validity = $validity;
        return true;
    }

    public function setCvc($cvc)
    {
        if(!is_numeric($cvc) || strlen($cvc) != 3) return false;
        $this->cvc = $cvc;
        return true;
    }

    public function setBalance($money)
    {
        if(is_numeric($money) && $money > 0 ){
            $this->balance = $money;
            return true;
        }
        return false;
    }

    // Methods

    public function addMoney($money)
    {
        if(is_numeric($money) && $money > 0){
            $this->balance += $money;
            return true;
        }
        return false;
    }

    public function removeMoney($money)
    {
        if(is_numeric($money) && $money > 0 && $this->balance >= $money){
            $this->balance -= $money;
            return true;
        }
        return false;
    }

    // Methods

    public function isExpired()
    {
        $today = strtotime(date("d-m-y"));
        return $this->validity < $today;
    }

}

?>