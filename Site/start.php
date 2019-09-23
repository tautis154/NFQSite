<?php
include "resources/config.php";

session_start();
if(isset($_GET['insert'])){
  $client = $_GET['client'];
  $doctor = $_GET['doctor'];
  $sql = "SELECT * FROM `doctors` WHERE doctor_id = ?";
  $stmt = $pdo->prepare($sql);
  $stmt -> execute([$doctor]);
  $posts = $stmt->fetchAll();

  if($doctor!=""){
    $uniqueid = uniqid('id',true);
    $_SESSION["newsession"]= "clientsite.php?token=".$uniqueid;
    $_SESSION["registered"] = "Registered succesfully";
    $_SESSION["clientSite"] = $uniqueid;
  } else{
    $_SESSION["notRegistered"] = "Registered unsuccesfully. Call someone";
  }
  if($client!="" && $doctor!=""){
    $pdoQuery = "INSERT INTO `clients`(`client`,`uniqid`,`doctor_id`) VALUES (:client,:uniqid,:doctor_id)";
    $pdoResult = $pdo->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":client"=>$client,":uniqid"=>$uniqueid,":doctor_id"=>$doctor));
    if($pdoExec && $client!="")
    {
      echo 'Data Inserted';
    }
  } else
  echo 'Data Not Inserted';
  }

header("location:public/index.php");

?>
