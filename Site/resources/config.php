<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "nfqsite";

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
