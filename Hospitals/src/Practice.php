<?php

include_once "Address.php";
include_once "Geo.php";

class Practice
{
    public $name;
    public $description;
    public $address;
    public $geo;
    public $pm2_5;

    function __construct($practice_array){
        $this->name = $practice_array[0];
        $this->address = new Address($practice_array[1], $practice_array[2], $practice_array[3]);
        $this->description = $practice_array[4];
        $this->pm2_5 = floatval($practice_array[5]);
        $this->geo = new Geo($practice_array[7], $practice_array[8]);
    }
}