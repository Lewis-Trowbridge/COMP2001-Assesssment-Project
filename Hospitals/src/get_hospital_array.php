<?php
function get_hospital_array($keep_headers){
    $hospital_array = array();
    $filename = "../assets/csv/resources_cd162ad1-d7d5-42a9-b1ab-0edbcd697f1e_air-quality-by-pm2.5-score-blf.org.uk.csv";
    $csv_file = fopen($filename, "r");
    if (!$keep_headers){
        // Advance the stream by one line if we don't want headers
        fgets($csv_file);
    }
    while (feof($csv_file) == false){
        $csv_line_string = fgets($csv_file);
        $hospital_array[] = str_getcsv($csv_line_string);
    }
    fclose($csv_file);
    return $hospital_array;
}