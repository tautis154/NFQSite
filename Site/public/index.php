<?php include "../config.php";
include "../createtable.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
  <body>
      <header class="header">
        <a href="scoreboard.php">Scoreboard</a>
      </header>
    <!-- Insert it into a box-->
    <form action="../start.php" method="GET">
      <div class="container">
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
