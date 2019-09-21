<?php include "../config.php";
include "../createdoctortable.php";
include "../createtable.php";
include "../createtimetable.php";
$sql = "SELECT * FROM poggers ";
$stmt = $pdo->prepare($sql);
$stmt -> execute();
$posts = $stmt->fetchAll();

//Dabar padaryt kad fetchintu visus daktarus ir vardus idet i select
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
  <body>
    <nav id="navbar">
      <div class ="container">
        <ul>
          <li><a href="scoreboard.php" >Scoreboard</a></li>
          <li><a href="clientsite.php"  >Client Page</a></li>
        </ul>
      </div>
    </nav>
    <!-- Insert it into a box-->
    <form action="../start.php" method="GET">
      <div class="container">
    </div>
    <div class="container">
      <label>Doctor</label>
      <br>
      <select name="doctor">
        <option style="display:none"></option>

<!-- Pakeisti to option width -->
      <?php

       foreach($posts as $post) {
                 echo "<option value=" .$post->doctor_id. ">" . $post->doctor_name . "</option>";
                 $secondDate = $post->end_date;
                 echo $secondDate;

    }
       ?>
     </select>
    </div>
    <div class="container">
      <label>Client</label>
      <br>
      <input type="text" style="" name="client" value="">
    </div>
    <div class="container">
    <input type="submit" name="insert" value="Submit">
  </div>
    </form>

  </body>
</html>
