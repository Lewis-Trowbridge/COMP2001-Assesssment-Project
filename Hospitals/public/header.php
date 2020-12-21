<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mx-2" href="index.php">Air Quality Plymouth</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-content">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mx-1">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link" href="data.php">Data</a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link" href="towns.php">Towns</a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link" href="about.php">About</a>
            </li>
        </ul>
        <div class="justify-content-end"></div>
        <form class="d-flex mx-1 my-2 my-lg-10" action="postcode.php" method="get">
                <input class="form-control mr-sm-2" id="postcode" name="postcode" type="search" placeholder="Search postcode...">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
