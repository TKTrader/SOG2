<?php $thisPage="Home"; ?>

<html>
  <?php require 'components/homeNav.php'; ?>
  <body>
    <div id="body-wrapper">
      <main role="main">
        <section id="homepage-header" class="jumbotron text-center">
          <div class="container text-white bg-dark">
            <h1 class="jumbotron-heading">Summer Olympic Games 2016</h1>
            <p class="lead">Welcome to the main website for the Summer Olympic Games of 2016!</p>
            <p class="lead">View some of our featured events!</p>
          </div>
        </section>

        <div class="album py-5 bg-light">
          <div class="container">
            <div class="text-center mb-4"><h2>Featured Events</h2></div>
            <div class="row">
              <?php 
              $mysqli -> set_charset("utf8");
              $query = "SELECT * FROM olympicevent";

                if ($result = $mysqli->query($query)) {
                    for ($i = 0; $i < 3; $i++) {
                        $row = $result -> fetch_assoc();

                        $eventName = $row["name"];
                        $date = $row["date"];
                        $time = $row["time"];
                        $location = $row["location"];
                        $type = $row["type"];
                        $category = $row["category"];
                        $ticketPrice = $row["ticketPrice"]; 
                        
                        if ($type == "comp") {
                          $type = "Competition";
                        } else if ($type == "award") {
                          $type = "Award Ceremony";
                        }

                        echo
                        '<div class="col-md-4">
                          <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                              <h4>Name: <span style="font-weight:normal;">'.$eventName.'</span></h4>
                              <h4>Category: <span style="font-weight:normal;">'.$category.'</span></h4>
                              <h4>Type: <span style="font-weight:normal;">'.$type.'</span></h4>
                              <p class="card-text">'.$location.' at '.$time.'</p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group"><button type="button" class="btn btn-sm btn-outline-secondary">Buy Ticket</button></div>
                                <span class="text-muted">$'.$ticketPrice.'</span>
                              </div>
                            </div>
                          </div>
                        </div>';
                    }
                } 
              ?>            
            </div>
          </div>
        </div>
      </main>
    </div>
    <?php require 'components/footer.php'; ?>
  </body>
</html>
