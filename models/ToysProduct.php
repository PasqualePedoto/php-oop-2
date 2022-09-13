<?php

include_once __DIR__ . '/Product.php';

class ToysProduct extends Product
{
    // Properties

    protected $tipology = 'Toys';
    protected $material;
    protected $dimension;

    // Constructor

    public function __construct($name,$description,$price,$material,$dimension)
    {
        // Costruttore classe Base
        parent::__construct($name,$description,$price);

        // Costruttore classe derivata
        $this->setMaterial($material);
        $this->setDimension($dimension);
    }

    // Getter

    public function getMaterial()
    {
        return $this->material;
    }

    public function getDimension()
    {
        return $this->dimension;
    }

    // Setter

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