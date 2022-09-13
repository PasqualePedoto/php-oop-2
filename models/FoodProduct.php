<?php

include_once __DIR__ . '/Product.php';

class FoodProduct extends Product
{
    // Properties

    protected $tipology = 'Foods';
    protected $deadline;
    protected $availability;

    // Constructor

    public function __construct($name,$description,$price,$deadline,$availability)
    {
        // Costruttore classe Base
        parent::__construct($name,$description,$price);

        // Costruttore classe derivata
        $this->setName($name);
        $this->setDeadline($deadline);
        $this->setAvailability($availability);
    }

    // Getter

    public function getDeadline()
    {
        return $this->deadline;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    // Setter

    public function setDeadline($deadline)
    {
        if(is_numeric($deadline) || strlen($deadline) <= 0) return false;
        $this->deadline = $deadline;
        return true;
    }

    public function setAvailability($availability)
    {
        if(strlen($availability) <= 0) return false;
        $this->availability = $availability;
        return true;
    }

}

?>