<?php

include_once "get_hospital_array.php";
include_once "Practice.php";

function get_practice_object_array(){
    $practice_array = get_hospital_array(false);
    $practice_objects = array();
    foreach ($practice_array as $single_practice_array){
        $practice_objects[] = new Practice($single_practice_array);
    }
    return $practice_objects;
}