<?php require 'static/header.php'; ?>

<html>
  <?php require 'static/nav.php'; ?>
  <body>
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Sumer Olympic Games 2016</h1>
          <p class="lead text-muted">Welcome to the main page!</p>
          <p class="lead text-muted">View some of the events for today!</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php require 'eventCard.php' ?>            
          </div>
        </div>
      </div>
    </main>
    <?php require 'static/footer.php'; ?>
  </body>
</html>
