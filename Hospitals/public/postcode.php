<head>
    <title>Postcode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
</head>

<body>

<?php
include_once "header.php";
?>

<div class="container">
    <?php
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
            echo "<p>$postcode_results->postcode</p>";
            echo "<p>$postcode_results->latitude</p>";
            echo "<p>$postcode_results->longitude</p>";
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