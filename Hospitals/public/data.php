<?php
include_once "../src/get_hospital_array.php";
?>
<head>
    <title>Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

</head>

<body>
    <?php
    include_once "header.php";
    ?>

    <div class="container">
        <div class="row h-100">
            <div id="map"></div>
        </div>

        <div class="row table-responsive">
            <table id="data-table" class="table">
                <?php
                $practice_array = get_hospital_array();
                $header_array = $practice_array[0];
                echo "<thead>";
                echo "<tr>";
                echo "<th scope='col'>Number</th>";
                foreach ($header_array as $header_name){
                    echo "<th scope='col'>$header_name</th>";
                }
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";
                for ($offset = 1; $offset < count($practice_array); $offset++ ){
                    $practice = $practice_array[$offset];
                    echo "<tr>";
                    echo "<th scope='row'>$offset</th>";
                    foreach ($practice as $practice_item) {
                        echo "<td>$practice_item</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <?php
    include_once "footer.php";
    ?>

    <script src="../assets/js/data.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5O75uQCZ68icAZQGbn5tKoCbJ4MEVnRg&callback=initMap" async defer></script>

</body>