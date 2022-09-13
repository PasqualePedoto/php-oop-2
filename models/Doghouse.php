<?php

include_once __DIR__ . '/Product.php';

class Doghouse extends Product
{
    // Properties

    protected $tipology = 'Kennels';
    protected $dimension;
    protected $color;
    protected $material;

    // Constructor

    public function __construct($name,$description,$price,$dimension,$color,$material)
    {
        // Costruttore classe Base
        parent::__construct($name,$description,$price);

        // Costruttore classe derivata
        $this->setDimension($dimension);
        $this->setColor($color);
        $this->setMaterial($material);
    }

    // Getter

    public function getColor()
    {
        return $this->color;
    }

    public function getMaterial()
    {
        return $this->material;
    }

    public function getDimension()
    {
        return $this->dimension;
    }

    // Setter

    public function setColor($color)
    {
        if(is_numeric($color) || strlen($color) <= 0) return false;
        $this->color = $color;
        return true;
    }

    public function setMaterial($material)
    {
        if(strlen($material) <= 0) return false;
        $this->material = $material;
        return true;
    }

    public function setDimension($dimension)
    {
        if(strlen($dimension) <= 0) return false;
        $this->dimension = $dimension;
        return true;
    }

}

?>