<?php
session_start();
include "../config.php";
include "../calculations.php";
$uniqid = $_SESSION["clientSite"];

$sql = "SELECT * FROM `data` WHERE uniqid = ?";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$uniqid]);
$post = $stmt->fetch();

$sql = "SELECT * FROM `poggers`";
$stmt = $pdo->prepare($sql);
$stmt -> execute();
$doctors = $stmt->fetchAll();




//Create a new table with doctors id and their names and when u have a doctor selected check their id with other table and add how much time a person has
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>
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
        echo "<div class='container2'>Client Name: " . $post->client . "<br>";
        echo "Register Date: " . $post->reg_date . "<br>" ;
        foreach ($doctors as $doctor) {
          if($post->doctor_id == $doctor->doctor_id){
              echo "Doctor: " . $doctor->doctor_name . "<br>";
              $timeLeft = timeLeft($post->doctor_id,$post->id);

              echo "Time: Left: " . $timeLeft . "</div>";
          }

        }

     ?>



  </div>
  </body>
</html>
