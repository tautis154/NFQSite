<?php
include "../resources/config.php";

$notServed = 0;
$sql = "SELECT * FROM `clients` WHERE served = ? ORDER BY `reg_date` ASC LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$notServed]);
$clients = $stmt->fetchAll();

$sql = "SELECT * FROM `doctors`";
$stmt = $pdo->prepare($sql);
$stmt -> execute();
$doctors = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Doctor's Page</title>
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
          <li><a href="scoreboard.php"  >Scoreboard</a></li>
       </ul>
     </div>
   </nav>
   <table style="margin-top: 20px" class="table" id="table1">
     <thead>
       <tr>
         <th>Doctor</th>
         <th>Client</th>
         <th>Number</th>
         <th>Date</th>
         <th>Check-in</th>
      </tr>
    </thead>
    <tbody>
      <?php

      foreach($clients as $client){
        echo "<tr>";
        foreach ($doctors as $doctor) {
          if($client->doctor_id == $doctor->doctor_id){
            echo "<td>" . $doctor->doctor_name . "</td>";
          }
        }
        echo "<td>" . $client->client . "</td>";
        echo "<td>" . $client->id . "</td>";
        echo "<td>" . $client->reg_date . "</td>";

      ?>
      <td>
        <form action="calcduration.php" method="post">
          <input type="checkbox" name="records[]" value="<?php echo  $client->id  ;?>">
     </td>
     <?php  echo "</tr>";
      }
     ?>
      <div class="container">
       <input type="submit" name="confirmMultipleBtn" value="Confirm" class="button">
      </div>
    </form>
  </tbody>
  </table>
  </body>
</html>
