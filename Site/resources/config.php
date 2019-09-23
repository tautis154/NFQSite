<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "bfb3c3a66b2456";
$password = "38ede812";
$db = "heroku_fde3688f47887e3";

try{
  $dsn = "mysql:host=" . $host .";dbname=" . $db;
  $pdo = new PDO($dsn,$username,$password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
  } catch(PDOException $e){
    die("Oops. Something went wrong in the database.");
  }

?>
