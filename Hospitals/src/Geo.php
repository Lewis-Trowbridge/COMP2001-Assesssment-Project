<?php


class Geo
{
    public $latitude;
    public $longitude;

    function __construct($latitude, $longitude){
        $this->latitude = floatval($latitude);
        $this->longitude = floatval($longitude);
    }
}