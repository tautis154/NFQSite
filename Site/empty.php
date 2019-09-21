<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <label>Enter your number</label>
    <br>
    <input type="text" style="" name="client" value="">
    <?php
    include "config.php";
    $served = 0;
    $sql = "SELECT * FROM data WHERE served = ? ORDER BY `reg_date` ASC ";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([$served]);
    $posts = $stmt->fetchAll();

    $sql = "SELECT * FROM `poggers`";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    $doctors = $stmt->fetchAll();
    


  ?>

  </div>
  <div class="container">
  <input type="submit" name="insert" value="Submit">
</div>
  </body>
</html>
