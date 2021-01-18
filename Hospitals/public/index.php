<head>

    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
</head>
<body>

<?php
include_once "header.php";
?>

<section class="container">
    <h2>Welcome</h2>
    <p>In this web application, data is presented about the air quality surrounding hospitals and GP practices in
    Plymouth based on the density of PM<sub>2.5</sub> in the air - you can inspect the overall picture on the map
    or check the average for each town in the wider Plymouth area <a href="data.php">here.</a> A postcode lookup is
    also available if you want to check the quality of your local practice.</p>

    <p>The original dataset used can be found <a href="https://plymouth.thedata.place/dataset/air-quality-data">here</a>, available under the <a href="http://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/">Open Government Licence</a> .</p>

    <p>Finally, if you wish to inspect the data in JSON-LD format, please click <a href="../practices/index.php">here</a>.</p>
</section>

<?php
include_once "footer.php";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>