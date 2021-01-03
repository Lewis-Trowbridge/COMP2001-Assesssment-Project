<?php
include_once "get_practice_object_array.php";

function get_closest_practice($postcode_lat, $postcode_lng){
    $practice_objects = get_practice_object_array();
    $closest = $practice_objects[0];
    $closest_distance = 0;
    foreach ($practice_objects as $practice){
        $distance = sqrt((($postcode_lat - $practice->geo->latitude) ** 2) + (($postcode_lng - $practice->geo->longitude) ** 2));
        echo $distance;
        echo "<br>";
        if ($distance < $closest_distance or $closest_distance == 0){
            $closest_distance = $distance;
            $closest = $practice;
        }
    }
    return $closest;
}