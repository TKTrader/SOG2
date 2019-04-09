<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">Summer Olympic Games</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li <?php if ($thisPage=="Home") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link active" href="index.php">Home</span></a></li>
            <li <?php if ($thisPage=="Events") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="pages/eventsPage.php">Events</a></li>
            <li <?php if ($thisPage=="Tickets") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="pages/ticketsPage.php">Tickets</a></li>
            <li <?php if ($thisPage=="Schedule") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="pages/schedulePage.php">Schedule</a></li>
            <li <?php if ($thisPage=="Athlete") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="pages/athletePage.php">Athletes</a></li>
            <li <?php if ($thisPage=="Register") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="pages/registerPage.php">Register</a></li>
            <li <?php if ($thisPage=="Login") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="pages/loginPage.php">Login</a></li>
            <li><a class="nav-item nav-link" href="controllers/logout.php"> Logout</a></li>
        </ul>
    </div>
</nav>