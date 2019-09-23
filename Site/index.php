<?php
session_start();

include "resources/config.php";
include "resources/createdoctortable.php";
include "resources/createtable.php";
include "resources/createtimetable.php";

$sql = "SELECT * FROM doctors ";
$stmt = $pdo->prepare($sql);
$stmt -> execute();
$doctors = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
  </head>
  <body>
    <header id="main-header">
      <div class ="container">
        <h1>Main page</h1>
      </div>
    </header>
    <nav id="navbar">
      <div class ="container">
        <ul>
          <li><a href="public/scoreboard.php" >Scoreboard</a></li>
          <li><a href="public/doctor.php"  >Doctor Page</a></li>
        </ul>
      </div>
    </nav>
    <form action="public/start.php" method="GET">
    <br>
    <div class="container">
      <label>Doctor</label>
      <br>
      <select name="doctor" style="width:174px;height:25px;">
        <option style="display:none"></option>
        <?php
        foreach($doctors as $doctor) {
          echo "<option  value=" .$doctor->doctor_id. ">" . $doctor->doctor_name . "</option>";
          $secondDate = $doctor->end_date;
          echo $secondDate;
        }
        ?>
      </select>
    </div>
  </div>
  <div class="container">
    <label>Client</label>
    <br>
    <input type="text" style="" name="client" value="" pattern="[a-zA-Z][a-zA-Z ]{2,}" required>
  </div>
  <div class="container">
    <input type="submit" class="button" name="insert" value="Submit">
  </div>
  </form>
  <?php
  if(isset($_SESSION["newsession"]) && isset($_SESSION["registered"])){
    echo "<div class = 'container'>" .  $_SESSION["registered"] ."</div>" ;
    echo "<div class = 'container'> Here's your  ";
    echo "<a href='" . $_SESSION["newsession"] . "'>Link</a>";
    unset($_SESSION["newsession"]);
    unset($_SESSION["registered"]);
    }
    if(isset($_SESSION["notRegistered"])){
      echo "<br> <div class = 'container'> " . $_SESSION["notRegistered"] . "</div>";
      unset($_SESSION["notRegistered"]);
    }
    ?>
  </body>
</html>
