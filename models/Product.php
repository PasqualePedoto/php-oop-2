<?php

class Product
{
    // Properties

    protected $id;
    protected $name;
    protected $description;
    protected $price;

    // Costruttore

    public function __construct($name,$description,$price)
    {
        $this->setId();
        $this->setName($name);
        $this->setDescription($description);
        $this->setPrice($price);
    }

    // Getter 

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    // Setter

    private function setId()
    {
        $this->id = uniqid();
    }

    public function setName($name)
    {
        if(is_numeric($name) || !$name) return false;
        $this->name = $name;
        return true;
    }

    public function setPrice($price)
    {
        if(!is_numeric($price)) return false;
        $this->price = $price;
        return true;
    }

    public function setDescription($desc)
    {
        if(is_numeric($desc) || strlen($desc) <= 0) return false;
        $this->description = $desc;
        return true;
    }
}

?>