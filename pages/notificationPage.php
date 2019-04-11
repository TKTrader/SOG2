<?php require '../components/header.php'; $thisPage="Notification"; ?>

<html>
  <body>
    <?php require '../components/nav.php'; ?>
    <div class="notificationPage_container">
      <hr>
      <?php
      $query1 = "SELECT updatedEvent.location AS oldLocation, updatedEvent.date AS oldDate, updatedEvent.time AS oldTime, updatedEvent.name AS oldName, updatedEvent.category AS oldCategory, olympicEvent.location, olympicEvent.date, olympicEvent.time, olympicEvent.name, olympicEvent.category FROM olympicEvent INNER JOIN updatedEvent ON olympicEvent.id=updatedEvent.olympicEventID";
      $query1_result = mysqli_query($mysqli, $query1);
      $counter = 1;
      echo"<tr>";
      while($row = mysqli_fetch_array($query1_result)) {
          echo "<td><h4>" . $row['oldLocation'] . " " . $row['oldDate'] . " " . $row['oldTime'] . " " . $row['oldName'] . " " . $row['oldCategory'] . " Has been changed to " . $row['location'] . " " . $row['date'] . " " . $row['time'] . " " . $row['name'] . " " . $row['category'] . "</h3></td>";
          if($counter % 3 == 0) {
              echo"</tr>";
              echo"<tr>";
          }
          $counter++;
      }
      echo"</tr>";
      echo "</table>"
      ?>
    </div>
    <?php require '../components/footer.php'; ?>
  </body>
</html>