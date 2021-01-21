<?php
include_once "../src/get_closest_practice.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Postcode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
</head>

<body>

<?php
include_once "header.php";
?>

<div class="container">
    <?php

    function echo_in_row_div($content)
    {
        echo "<div class='row'>";
        echo $content;
        echo "</div>";
    }

    $postcode = $_GET["postcode"];
    if ($postcode == null){
        echo "<p>No postcode received - please try again</p>";
    }
    else {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://api.postcodes.io/postcodes/" . $postcode);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curl);
        curl_close($curl);
        $json_output = json_decode($output);
        if ($json_output->status == 200){
            $postcode_results = $json_output->result;
            echo "<div class='text-center'>";
            $closest_practice = get_closest_practice($postcode_results->latitude, $postcode_results->longitude);
            echo_in_row_div("<p>Your nearest practice:</p>");
            echo_in_row_div("<h2>$closest_practice->name</h2>");
            $practice_address = $closest_practice->address;
            echo_in_row_div("<p>$practice_address->postcode</p>");
            echo_in_row_div("<h3>$closest_practice->pm2_5 PM<sub>2.5</sub> μg/m<sup>3</sup></h3>");
            echo "</div>";
        }
        else {
            echo "<p>Sorry, but we cannot find your postcode.</p>";
        }
    }
    ?>
</div>

<?php
include_once "footer.php";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>