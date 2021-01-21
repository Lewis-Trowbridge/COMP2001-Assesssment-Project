<?php
include_once "../src/get_json_context.php";
include_once "../src/get_practice_object_array.php";

$context_string = get_json_context();
$practice_objects = get_practice_object_array();
header("Content-Type: application/json");
$context_array = json_decode($context_string);
foreach ($practice_objects as $practice_object){
    $context_array->practices[] = $practice_object;
}
echo json_encode($context_array);
