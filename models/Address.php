<?php

class Address
{
    // Properties

    protected $city;
    protected $zip_code;
    protected $street;
    protected $number;
    protected $country;

    // Constructor

    public function __construct($city,$zip_code,$street,$number,$country)
    {
        $this->setCity($city);
        $this->setZipCode($zip_code);
        $this->setStreet($street);
        $this->setNumber($number);
        $this->setCountry($country);
    }

    // Getter

    public function getCity()
    {
        return $this->city;
    }

    public function getZipCode()
    {
        return $this->zip_code;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getCountry()
    {
        return $this->country;
    }

    // Setter

    public function setCity($city)
    {
        if(strlen($city) <= 0) return false;
        else{
            $this->city = $city;
        }
    }

    public function setZipCode($zip_code)
    {
        if(!is_numeric($zip_code)) return false;
        else{
            $this->zip_code = $zip_code;
        }
    }

    public function setStreet($street)
    {
        if(strlen($street) <= 0) return false;
        else{
            $this->city = $street;
        }
    }

    public function setNumber($number)
    {
        if(!is_numeric($number)) return false;
        else{
            $this->city = $number;
        }
    }

    public function setCountry($country)
    {
        if(strlen($country) <= 0) return false;
        else{
            $this->cicountryty = $country;
        }
    }
}

?>