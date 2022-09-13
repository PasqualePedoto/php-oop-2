<?php

include_once __DIR__ . '/User.php';
include_once __DIR__ . '/Product.php';

class RegisteredUser extends User
{
    // Properties 

    protected $username;
    protected $password;
    protected $email;
    private $credit_card;

    // Constructor

    public function __construct($first_name,$last_name,$username,$password,$email,$credit_card)
    {
        // Costruttore classe base
        parent::__construct($first_name,$last_name);

        // Costruttore classe derivata
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setCreditCard($credit_card);
    }

    // Getter

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCreditCard()
    {
        return $this->credit_card;
    }

    // Setter

    public function setUsername($username)
    {
        if(is_numeric($username) || strlen($username) <= 0) return false;
        $this->username = $username;
        return true;
    }

    public function setPassword($password)
    {
        if(is_numeric($password) || strlen($password) <= 0) return false;
        $this->password = $password;
        return true;
    }

    public function setEmail($email)
    {
        if(is_numeric($email) || strlen($email) <= 0 || strpos($email,'@') == false) return false;
        $this->email = $email;
        return true;
    }

    private function setCreditCard($card)
    {
        if($card instanceof Card){
            $this->credit_card = $card;
            return true;
        }else{
            return false;
        }
    }

    // Methods

    public function placeOrder($card = null,$address = null)
    {
        if($this->cart->getTotalPrice() <= $this->credit_card->getBalance()){
            $new_order = new Order($this->cart,$this->address,$this,$this->credit_card);
            $this->cart->setList();
            return $new_order;
        }
        return false;
    }
}

?>