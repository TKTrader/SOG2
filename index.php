<?php 
require 'components/homeHeader.php';
$thisPage="Home"; ?>

<html>
  <?php require 'components/homeNav.php'; ?>
  <body>
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container text-white bg-dark">
          <h1 class="jumbotron-heading">Summer Olympic Games 2016</h1>
          <p class="lead">Welcome to the main page!</p>
          <p class="lead">View some of the events for today!</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php require 'components/eventCard.php' ?>            
          </div>
        </div>
      </div>
    </main>
    <?php require 'components/footer.php'; ?>
  </body>
</html>
