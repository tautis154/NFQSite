<?php
session_start();
include "../resources/config.php";
include "../calculations.php";

$uniqid = $_SESSION["clientSite"];
$sql = "SELECT * FROM `clients` WHERE uniqid = ?";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$uniqid]);
$client = $stmt->fetch();

$sql = "SELECT * FROM `doctors`";
$stmt = $pdo->prepare($sql);
$stmt -> execute();
$doctors = $stmt->fetchAll();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/containerStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5" >
  </head>
  <body>
    <header id="main-header">
      <div class ="container">
        <h1>Client Site</h1>
      </div>
    </header>
    <nav id="navbar">
      <div class ="container">
        <ul>
          <li><a href="index.php" >Home Page</a></li>
          <li><a href="scoreboard.php"  >Scoreboard</a></li>
        </ul>
      </div>
    </nav>
    <?php
    echo "<div class='container2'>Client Name: " . $client->client . "<br>";
    echo "Register Date: " . $client->reg_date . "<br>" ;
    foreach ($doctors as $doctor) {
      if($client->doctor_id == $doctor->doctor_id){
        echo "Doctor: " . $doctor->doctor_name . "<br>";
        $timeLeft = timeLeft($client->doctor_id,$client->id);
        echo "Time: Left: " . $timeLeft . "</div>";
      }
    }
    ?>
  </div>
  </body>
</html>
