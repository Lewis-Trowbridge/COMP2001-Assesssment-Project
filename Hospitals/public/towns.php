<?php
include_once "../src/get_towns_average_array.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Towns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
</head>

<body>
<?php
include_once "header.php";
?>
<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Town name</th>
                <th scope="col">PM<small>2.5</small> density</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $town_array = get_towns_average_array();

            foreach ($town_array as $name => $density){
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$density</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>



<?php
include_once "footer.php";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>