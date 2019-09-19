<?php
include "../config.php";
if(isset($_POST['filter']) && $_POST['limit']!="" && is_numeric($_POST['limit']))
{
  $limit = $_POST['limit'];
  $sql = "SELECT * FROM infoss ORDER BY `reg_date` ASC LIMIT ?";
  $stmt = $pdo->prepare($sql);
  $stmt -> execute(["$limit"]);
  $posts = $stmt->fetchAll();
}
else{
$sql = "SELECT * FROM infoss ORDER BY `reg_date` ASC ";
$stmt = $pdo->prepare($sql);
$stmt -> execute();
$posts = $stmt->fetchAll();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>


    <header class="header">
      <a href="index.php">Main Page</a>
    </header>
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
                <th>Doctor</th>
                <th>Client</th>
                <th>Date</th>

              </tr>


              <?php
               foreach($posts as $post) {
                 echo "<tr>";
                         echo "<td>" . $post->doctor ."</td>";
                         echo "<td>" . $post->client . "</td>";
                         echo "<td>" . $post->reg_date . "</td>";
                         echo "</tr>";
           }
               ?>

  </body>
</html>
