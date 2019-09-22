<?php
session_start();

 include "../config.php";
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
    <header id="main-header">
          <div class ="container">
          <h1>Main page</h1>
          </div>
        </header>
    <nav id="navbar">
      <div class ="container">
        <ul>
          <li><a href="scoreboard.php" >Scoreboard</a></li>
          <li><a href="../doctor.php"  >Doctor Page</a></li>
        </ul>
      </div>
    </nav>
    <!-- Insert it into a box-->
    <form action="../start.php" method="GET">
      <div class="container">
    </div>
    <br>
    <div class="container">
      <label>Doctor</label>

      <br>



      <select name="doctor" style="width:174px;height:25px;">
        <option style="display:none"></option>

<!-- Pakeisti to option width -->
      <?php

       foreach($posts as $post) {
                 echo "<option  value=" .$post->doctor_id. ">" . $post->doctor_name . "</option>";
                 $secondDate = $post->end_date;
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
            //rasyti hrefa .  $_SESSION["newsession"] . "</div>";
            unset($_SESSION["newsession"]);
            unset($_SESSION["registered"]);
        }
    if(isset($_SESSION["notRegistered"])){
      echo "<br> <div class = 'container'> " . $_SESSION["notRegistered"] . "</div>";
        unset($_SESSION["notRegistered"]);
    }

    ?>
    <footer></footer>

  </body>
</html>
