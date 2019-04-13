<?php require 'components/publicHeader.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #005ce6;">
    <!-- <a class="navbar-brand navbar-dark"><span class="h2"><p class="font-weight-bold">Summer Olympic Games</p></span></a> -->
    <a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li><a class="nav-item nav-link" href="../index.php">Home</a></li>
            <li <?php if ($thisPage=="PublicHome") echo "id=\"user-currentpage\""; ?>><a class="nav-item nav-link" href="index.php">Dashboard</a></li>
            <li <?php if ($thisPage=="PurchaseTickets") echo "id=\"user-currentpage\""; ?>><a class="nav-item nav-link" href="purchaseTickets.php">Purchase Tickets</a></li>
            <li <?php if ($thisPage=="ViewOrders") echo "id=\"user-currentpage\""; ?>><a class="nav-item nav-link" href="viewOrders.php">View Orders</a></li>
            <li <?php if ($thisPage=="ViewSchedule") echo "id=\"user-currentpage\""; ?>><a class="nav-item nav-link" href="viewSchedule.php">View Schedule</a></li>
            <li><a class="nav-item nav-link" href="../controllers/logout.php">Logout</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item nav-link"; style="color:white;"> <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?> </li>
        </ul>
    </div>
</nav>