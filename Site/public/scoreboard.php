<?php
include "../resources/config.php";

$served = 0;
if(isset($_POST['filter']) && $_POST['limit']!="" && is_numeric($_POST['limit']))
{
  $limit = $_POST['limit'];
  $sql = "SELECT * FROM clients WHERE served = ? ORDER BY `reg_date` ASC LIMIT ?";
  $stmt = $pdo->prepare($sql);
  $stmt -> execute([$served,$limit]);
  $clients = $stmt->fetchAll();
}
else{
  $sql = "SELECT * FROM clients WHERE served = ? ORDER BY `reg_date` ASC ";
  $stmt = $pdo->prepare($sql);
  $stmt -> execute([$served]);
  $clients = $stmt->fetchAll();
}
include "calculations.php"

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Scoreboard</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <header id="main-header">
      <div class ="container">
        <h1>Doctor's Page</h1>
      </div>
    </header>
    <nav id="navbar">
      <div class ="container">
        <ul>
          <li><a href="../index.php" >Home Page</a></li>
          <li><a href="doctor.php" >Doctor Page</a></li>
        </ul>
      </div>
    </nav>
    <form class="" action="scoreboard.php" method="post">
      <div class="container">
        <label >Enter how many clients you want to see</label>
      <br>
      <input type="text" name="limit" value="">
      <input type="submit" name="filter" value="Filter">
    </div>
  </form>
  <table style="margin-top: 20px" class="table" id="table1">
    <tr>
      <th>Client</th>
      <th>Number</th>
      <th>Date</th>
      <th>Time left</th>
    </tr>
    <?php
    foreach($clients as $client) {
      echo "<tr>";
      echo "<td>" . $client->client . "</td>";
      echo "<td>" . $client->id . "</td>";
      echo "<td>" . $client->reg_date . "</td>";
      echo "<td>" . timeLeft($client->doctor_id,$client->id) . "</td>";
      echo "</tr>";
    }
  ?>
  </body>
</html>
