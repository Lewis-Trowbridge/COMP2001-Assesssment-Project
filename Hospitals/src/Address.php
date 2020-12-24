<?php


class Address
{
    public $street_name;
    public $town;
    public $postcode;

    function __construct($street_name, $postcode, $town){
        $this->street_name = $street_name;
        $this->postcode = $postcode;
        $this->town = $town;
    }
}