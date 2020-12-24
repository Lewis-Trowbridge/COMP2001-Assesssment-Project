<?php
function get_json_context() {
    $filepath = "../src/assets/json/context.json";
    $context_file = fopen($filepath, "r");
    $context_string = fread($context_file, filesize($filepath));
    fclose($context_file);
    return $context_string;
}
