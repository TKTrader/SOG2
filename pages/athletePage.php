<?php $thisPage="Athlete"; ?>

<html>
  <body>
    <?php require '../components/nav.php'; ?>
    <div id="body-wrapper">
      <div class="athletePage_container">
        <hr>
        <?php
          //for now only name and country, could do sports later
          $query1 = "SELECT * FROM athletes INNER JOIN users ON athletes.id=users.id";
          echo "<table class=\"athletes\">";
          $query1_result = mysqli_query($mysqli, $query1);
          $counter = 1;
          echo"<tr>";
          while($row = mysqli_fetch_array($query1_result)) {
            echo "<td><h4>" . $row['firstName'] . " " . $row['lastName'] . "</h3><ul><li>" . $row['country'] . "</li><li>" .
            $row['DOB'] . "</li><li>" . $row['height'] . "</li><li>" . $row['wgt']  . "</ul></td>";
            if($counter % 3 == 0) {
            echo"</tr>";
              echo"<tr>";
            }
            $counter++;
          }
          echo"</tr>";
          echo "</table>";
        ?>
      </div>
    </div>
    <?php require '../components/footer.php'; ?>
  </body>
</html>