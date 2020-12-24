<?php
include_once "../src/get_json_context.php";

$context_string = get_json_context();
header("Content-Type: application/json");
echo $context_string;

