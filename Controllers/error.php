<?php
  session_start();
  //use before redirecting here: $_SESSION['message'] = 'Something went wrong storing sessions vars...';
 ?>
 
<html>
  <body>
    <div class="form">
      <h1>Error</h1>
      <?php echo $_SESSION['message']; ?>
      <a href="../index.php">
        <button class="button button-block">Home</button>
      </a>
    </div>
  </body>
</html>
