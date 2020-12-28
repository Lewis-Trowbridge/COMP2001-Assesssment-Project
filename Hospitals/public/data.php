<head>
    <title>Data</title>
    <link href="../assets/css/data.css"  rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

</head>

<body>
    <?php
    include_once "header.php";
    ?>

    <div class="container">
        <div class="row">
            <div id="map" class="vh-100"></div>
        </div>
    </div>

    <?php
    include_once "footer.php";
    ?>

    <script src="../assets/js/data.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5O75uQCZ68icAZQGbn5tKoCbJ4MEVnRg&callback=initMap" async defer></script>

</body>