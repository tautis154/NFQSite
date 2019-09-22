<?php
include "config.php";
//IDET Limit i cia kad kokia rodytu 10 per page XDDD
//Try to check why above 10 shows errors
//Ir padaryt su user inputu kad galetu pasirinkti kiek rodyti per page
//Ideti i github ir pakeisti atgal kad butu LEVEL1 version
$notServed = 0;
$sql = "SELECT * FROM `data` WHERE served = ? ORDER BY `reg_date` ASC LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$notServed]);
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">

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
            <li><a href="public/index.php" >Home Page</a></li>
            <li><a href="public/scoreboard.php"  >Scoreboard</a></li>
          </ul>
        </div>
      </nav>
      <table style="margin-top: 20px" class="table" id="table1">
        <thead>

                <tr>
                  <th>Client</th>
                  <th>Number</th>
                  <th>Date</th>
                  <th>Check-in</th>
                </tr>
      </thead>
      <tbody>
        <?php

         foreach($posts as $post) {

           echo "<tr>";
                   echo "<td>" . $post->client . "</td>";
                   echo "<td>" . $post->id . "</td>";
                   echo "<td>" . $post->reg_date . "</td>";
                   ?>
                   <td>
                   <form action="calcduration.php" method="post">
                     <input type="checkbox" name="records[]" value="<?php echo  $post->id  ;?>">

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
