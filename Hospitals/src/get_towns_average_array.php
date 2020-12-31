<?php
include_once "get_practice_object_array.php";

function get_towns_average_array(){
    $practice_array = get_practice_object_array();
    $town_total_array = array();

    foreach ($practice_array as $practice){
        $town_total_array[$practice->address->town][0] += $practice->pm2_5;
        $town_total_array[$practice->address->town][1]++;
    }

    $town_average_array = array();
    foreach ($town_total_array as $town_name => $total_array){
        $town_average_array[$town_name] = round($total_array[0] / $total_array[1], 2);
    }

    arsort($town_average_array);
    return $town_average_array;
};