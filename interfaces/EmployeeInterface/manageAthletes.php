<?php
$thisPage="ManageAthletes";
require 'components/employeeNav.php';
?>

<body>
<div class="container">
  <div class="jumbotron" style="background-color:#d6f5d6;">
    <h1><strong>Manage Athletes</strong></h1>
        <h2>Select an action:</h2>
        <a class="btn btn-primary btn-lg btn-block" href="addAthlete.php" style="background-color: #009900;">Register New Athlete</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifyAthlete.php" style="background-color: #0099ff;">Modify Athlete</button>
        <a class="btn btn-primary btn-lg btn-block" href="deleteAthlete.php" style="background-color: #ff0000;">Delete Athlete</button>
</body>