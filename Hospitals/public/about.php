<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
</head>

<body>

<?php
include_once "header.php";
?>

<div class="container">
    <div class="row">
        <h2>What is PM<sub>2.5</sub>?</h2>
        <p>PM<sub>2.5</sub> means "particulate matter" that takes up 2.5 microns or less - according to the UK government:</p>
        <figure>
            <blockquote class="blockquote">
                <p>Particulate matter (PM) is a term used to describe the mixture of solid particles and liquid droplets in the air.  It can be either human-made or naturally occurring. Some examples include dust, ash and sea-spray. Particulate matter (including soot) is emitted during the combustion of solid and liquid fuels, such as for power generation, domestic heating and in vehicle engines. Particulate matter varies in size (i.e. the diameter or width of the particle). PM2.5 means the mass per cubic metre of air of particles with a size (diameter) generally less than 2.5 micrometres (µm). PM2.5 is also known as fine particulate matter  (2.5 micrometres is one 400th of a millimetre).</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <p>Department for Environment, Food and Rural Affairs, <a href="https://laqm.defra.gov.uk/public-health/pm25.html">link</a>.</p>
            </figcaption>
        </figure>
        <p>Please see the link to DEFRA's page above for more information on the health impacts and sources of PM<sub>2.5</sub>.</p>
    </div>
    <div class="row">
        <h2>Where did the data come from?</h2>
        <p>The data was sourced from <a href="https://plymouth.thedata.place/dataset/air-quality-data">Data Plymouth</a>, obtained by <a href="https://plymouth.thedata.place/organization/green-minds">Green Minds</a> and the <a href="https://www.blf.org.uk/air-quality">British Lung Foundation</a> under the <a href="http://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/">Open Government Licence</a>.</p>
    </div>
    <div class="row">
        <h2>Attributions</h2>
        <ul>
            <li><a href="https://getbootstrap.com">Bootstrap</a></li>
            <li><a href="https://cloud.google.com/maps-platform">Google Maps Javascript API</a></li>
            <li><a href="https://postcodes.io/">postcodes.io</a></li>
            <li><a href="https://jquery.com/">jQuery</a></li>
        </ul>
    </div>
</div>

<?php
include_once "footer.php";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>