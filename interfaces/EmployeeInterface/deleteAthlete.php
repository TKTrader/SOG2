<?php
require 'components/employeeHeader.php';
?>

<div class="container">
    <div class="jumbotron">
    <p><b><h2>Select Athlete to Delete</h2></b></p>
    <select class="form-control" name="event" required >
        <option value="" selected disabled hidden></option>
        <?php
        $mysqli->set_charset("utf8");
        $query = "SELECT concat(firstName,' ',lastName) fullName FROM users WHERE access='A'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $value = $row['fullName'];
            echo "<option value='$value'>$value</option>";
        }
        ?>
    </select>
    <div class="row form-group mt-3">
    <button type="submit" class="btn btn-primary" style="background-color: #ff0000;">Delete</button>
    </div>
</div>

<body>
<div class="container">
  <div class="jumbotron" style="background-color:#d6f5d6;">
  <p><b><h3>Navigate:</h3></b></p>
        <a class="btn btn-primary btn-lg btn-block" href="addAthlete.php" style="background-color: #009900;">Register New Athlete</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifyAthlete.php" style="background-color: #0099ff;">Modify Athlete</button>
    <!-- </div>
</div> -->
</body>